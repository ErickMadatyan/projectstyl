<?php
  include 'header.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Display Page</title>
    <style>
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
    </style>
</head>
<body>
    <div class="image-display">
        <div class="container">
            <?php
                include_once 'dbh.inc.php';
                $sql = "SELECT * FROM gallery WHERE idGallery = '19'";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL STATEMENT FAILED!";
                } else {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="image-container">';
                    echo '<div class="blue-box">';
                    echo '<img src="imgs/'.$row["imgFullNameGallery"].'" alt="'.$row["imageTitle"].'">';
                    echo '<div class="item-descriptions">';
                    echo '<h3>'.$row["imageTitle"].'</h3>';

                    // Check and display each item description
                    $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
                    foreach ($items as $item) {
                      if (!empty($row[$item . "DESC"])) {
                        echo '<p><strong>' . ucfirst($item) . ':</strong> '.$row[$item . "DESC"].'</p>';
                      }
                    }

                    echo '</div>'; // item-descriptions
                    echo '</div>'; // blue-box
                    echo '</div>'; // image-container
                  }
                }
            ?>
        </div>
    </div>
</body>
</html>












<?php
  include 'footer.php';
?>
