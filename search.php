<?php
include 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

 <style>
      .greeting {
    text-align: center;
    font-size: 1.5em; /* Adjust the font size as needed */
    color: #007BFF; /* Adjust the color as needed */
    padding-left: 200px;
  }
      .gallery-heading {
    text-align: center;
    margin-bottom: 20px; /* You can adjust this margin as needed */
    font-siz
  }
      .gallery-heading h2 {
    font-size: 2.5em; /* Adjust the font size as needed */
    font-family: 'Your_Nice_Font', sans-serif; /* Replace 'Your_Nice_Font' with the desired font */
    color: #007BFF; /* Adjust the color as needed */
  }
    body {
      font-family: 'Open Sans', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .gallery-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .gallery-container a {
        border-radius: 25px;
  border: 2px solid #73AD21;
      flex: 0 0 32%;
      margin-bottom: 20px;
      text-decoration: none;
      display: flex;
      flex-direction: row;
      border: 1px solid #ddd;
      transition: transform 0.3s ease-in-out;
      overflow: hidden;
    }

    .gallery-container a:hover {
      transform: scale(1.05);
    }

    .gallery-container a .gallery-image {
      width: 60%;
      height: 500px;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
      background-color: #99ccff;
    }

    .gallery-container a .item-descriptions {
      width: 40%;
      padding: 20px;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;

      overflow: auto;
      color: #333;
      background-color: #99ccff;
    }

    .gallery-container a h3 {
      font-size: 1.8em;
      margin-top: 0;
      margin-bottom: 10px;
      color: #007BFF;
    }

    .gallery-container a p {
      margin: 5px 0;
      font-size: 1em;
      line-height: 1.4;
    }
  </style>
</head>

<div class="content-wrap">
    <div class="column-left">
    <section class="gallery-links">
      <div class="wrapper">
        <div class="gallery-heading">
          <h2>Search Results</h2>
        </div>
        <div class="gallery-container">
          <?php
          include_once 'dbh.inc.php';
          if(isset($_GET["query"])) {
            $search_query = mysqli_real_escape_string($conn, $_GET["query"]);
            $sql = "SELECT * FROM gallery WHERE imageTitle LIKE '%$search_query%' OR hatDESC LIKE '%$search_query%' OR shirtDESC LIKE '%$search_query%' OR ..."; // Add conditions for other description fields
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo '<a href="items.php?galleryid='.$row["idGallery"].'">';
                echo '<div class="gallery-image" style="background-image: url(imgs/'.$row["imgFullNameGallery"].');"></div>
                      <div class="item-descriptions">
                      <h3>'.$row["imageTitle"].'</h3>';

                // Check and display each item description
                $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
                foreach ($items as $item) {
                  if (!empty($row[$item . "DESC"])) {
                    echo '<p><strong>' . ucfirst($item) . ':</strong> '.$row[$item . "DESC"].'</p>';
                  }
                }

                echo '</div>
                      </a>';
              }
            } else {
              echo "No results found.";
            }
          } else {
            echo "No search query provided.";
          }
          ?>
        </div>
      </div>
    </div>
    </div>
    </section>
</div>

<?php
include 'footer.php';
?>
