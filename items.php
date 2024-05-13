<?php
  // Include header with navigation bar
  include 'etest.php';

  // Establish database connection
  include_once 'dbh.inc.php';

  // Handle upvote or downvote action
if(isset($_POST["vote"]) && isset($_POST["galleryid"])) {
  // Check if user is signed in
  session_start();
  if(!isset($_SESSION['userid'])) {
    // User is not signed in, you can redirect them to a login page or display a message
    echo '<div class="center-upload">Please Sign In to Vote.</div>';
    exit(); // Stop further execution
  }

  $vote = $_POST["vote"];
  $galleryid = $_POST["galleryid"];

  // Update the votes count in the gallery table
  $sql = "";
  if ($vote == "upvote") {
    $sql = "UPDATE gallery SET votes = votes + 1 WHERE idGallery = ?";
  } elseif ($vote == "downvote") {
    $sql = "UPDATE gallery SET votes = votes - 1 WHERE idGallery = ?";
  }
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL STATEMENT FAILED!";
  } else {
    mysqli_stmt_bind_param($stmt, "i", $galleryid);
    mysqli_stmt_execute($stmt);
  }
  // Set a cookie to prevent multiple votes
  setcookie("voted_" . $galleryid, true, time() + (86400 * 30), "/"); // 86400 = 1 day

  // Redirect to index page after vote
  echo '<script>window.location.href = "index.php";</script>';
  exit(); // Stop further execution of PHP script
}
  // Fetch gallery entry based on galleryid if provided
  if(isset($_GET["galleryid"])) {
    $galleryid = $_GET["galleryid"];

    // Fetch gallery entry based on galleryid
    $sql = "SELECT * FROM gallery WHERE idGallery = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL STATEMENT FAILED!";
    } else {
      mysqli_stmt_bind_param($stmt, "i", $galleryid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Display the fetched gallery entry
      while($row = mysqli_fetch_assoc($result)) {
        // Display the gallery entry using HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Display Page</title>
    <style>
        /* Your CSS styles for image display here */
        .image-display .container {
            background-color: #e0e0f0;
            padding: 40px; /* Increased padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-display .image-container {
            position: relative;
            margin-bottom: 40px; /* Increased margin */
            width: 500px; /* Increased width */
            height: 400px; /* Increased height */
            overflow: hidden;
            border-radius: 10px; /* Increased border-radius */
        }

        .image-display .blue-box {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #3498db;
            border-radius: 10px;
            overflow: hidden;
        }

        .image-display .blue-box:hover .item-descriptions { /* Hover effect only for text */
            opacity: 1;
        }

        .image-display img {
            width: auto; /* Resize image to fit inside the box */
            height: 100%;
            display: center;
        }

        .image-display .item-descriptions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #3498db;
            border-top: none; /* Remove top border to blend with image */
            border-radius: 0 0 10px 10px;
            opacity: 0; /* Hidden by default */
            transition: opacity 0.3s ease;
        }

        .image-display .item-descriptions h3 {
            margin-top: 0; /* Remove default margin */
        }

        .image-display .item-descriptions p {
            margin-bottom: 10px;
            padding-left: 10px;
            border-left: 3px solid #3498db;
        }

        .image-display .item-descriptions p strong {
            font-weight: bold;
        }

        /* Style for the vote buttons */
        .image-display form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        .image-display form button:hover {
            background-color: #2980b9;
        }

        .image-display form button[disabled] {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="image-display">
        <div class="container">
            <div class="image-container">
                <div class="blue-box">
                    <img src="imgs/<?php echo $row["imgFullNameGallery"]; ?>" alt="<?php echo $row["imageTitle"]; ?>">
                    <div class="item-descriptions">
                        <h3><?php echo $row["imageTitle"]; ?></h3>
                        <?php
                          // Check and display each item description
                          $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
                          foreach ($items as $item) {
                            if (!empty($row[$item . "DESC"])) {
                              echo '<p><strong>' . ucfirst($item) . ':</strong> ' . $row[$item . "DESC"] . '</p>';
                            }
                          }
                        ?>
                    </div> <!-- item-descriptions -->
                </div> <!-- blue-box -->
            </div> <!-- image-container -->
            <form id="voteForm" method="POST" action="">
              <input type="hidden" name="galleryid" value="<?php echo $row["idGallery"]; ?>">
              <?php 
                // Check if the user has voted before
                $voted = false;
                if(isset($_COOKIE["voted_" . $row["idGallery"]])) {
                    $voted = true;
                }
                if(!$voted) {
                    echo '<button type="button" onclick="vote(\'upvote\')" id="upvoteBtn">Upvote</button>';
                    echo '<button type="button" onclick="vote(\'downvote\')" id="downvoteBtn">Downvote</button>';
                } else {
                    echo '<p>You have already voted</p>';
                    // Disable the buttons if user has already voted


                    echo '<script>document.getElementById("upvoteBtn").disabled = true;</script>';
                    echo '<script>document.getElementById("downvoteBtn").disabled = true;</script>';
                }
              ?>
            </form>
            <p>Votes: <?php echo $row["votes"]; ?></p>
        </div> <!-- container -->
    </div> <!-- image-display -->
    
    <script>
        function vote(type) {
            var form = document.getElementById("voteForm");
            var voteInput = document.createElement("input");
            voteInput.setAttribute("type", "hidden");
            voteInput.setAttribute("name", "vote");
            voteInput.setAttribute("value", type);
            form.appendChild(voteInput);
            form.submit();
            form.reset(); // Reset the form after submission
            document.getElementById("upvoteBtn").disabled = true; // Disable upvote button
            document.getElementById("downvoteBtn").disabled = true; // Disable downvote button
        }
    </script>
</body>
</html>
<?php
      }
    }
  } else {
    // If galleryid is not provided in the URL
    echo "Gallery ID not provided!";
  }

  // Include footer
  include 'footerv2.php';
?>
