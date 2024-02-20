<?php
  // Include header with navigation bar
  include 'header.php';

  // Establish database connection
  include_once 'dbh.inc.php';

  // Handle voting functionality
  if(isset($_GET["galleryid"]) && isset($_GET["vote"])) {
    $galleryid = $_GET["galleryid"];
    $vote = $_GET["vote"]; // Assuming vote can be either 1 (upvote) or -1 (downvote)

    // Update the votes in the database
    $sql = "UPDATE gallery SET votes = votes + ? WHERE idGallery = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL STATEMENT FAILED!";
    } else {
      mysqli_stmt_bind_param($stmt, "ii", $vote, $galleryid);
      mysqli_stmt_execute($stmt);
    }
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

        .image-display .item-descriptions:hover {
            opacity: 1; /* Show on hover */
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

        .image-display .vote-buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .image-display .vote-btn {
            cursor: pointer;
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .image-display .vote-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="image-display">
        <div class="container">
            <!-- Display the image and its details -->
            <div class="image-container">
                <img src="imgs/<?php echo $row["imgFullNameGallery"]; ?>" alt="<?php echo $row["imageTitle"]; ?>">
                <div class="item-descriptions">
                    <h3><?php echo $row["imageTitle"]; ?></h3>
                    <!-- Display other details here -->
                </div> <!-- item-descriptions -->
            </div> <!-- image-container -->

            <!-- Voting buttons -->
            <div class="vote-buttons">
                <a class="vote-btn" href="items.php?galleryid=<?php echo $galleryid; ?>&vote=1">Upvote</a>
                <a class="vote-btn" href="items.php?galleryid=<?php echo $galleryid; ?>&vote=-1">Downvote</a>
            </div>
        </div> <!-- container -->
    </div> <!-- image-display -->
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
  include 'footer.php';
?>
