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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #e0e0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-container {
            position: relative;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            display: block;
            border-radius: 5px;
        }

        .blue-box {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #3498db;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .blue-box {
            opacity: 1;
        }

        .item-descriptions {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 5px;
        }

        .item-descriptions p {
            margin-bottom: 10px;
            padding-left: 10px;
            border-left: 3px solid #3498db;
        }

        .item-descriptions p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
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
                echo '<img src="imgs/'.$row["imgFullNameGallery"].'" alt="'.$row["imageTitle"].'">';
                echo '<div class="blue-box">';
                echo '<div class="item-descriptions">';
                echo '<h3>'.$row["imageTitle"].'</h3>';

                // Check and display each item description
                $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
                foreach ($items as $item) {
                  if (!empty($row[$item . "DESC"])) {
                    echo '<p><strong>' . ucfirst($item) . ':</strong> '.$row[$item . "DESC"].'</p>';
                  }
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
        ?>
    </div>
</body>
</html>




















<?php
  include 'footer.php';
?>
