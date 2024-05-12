<?php
if ($_SERVER['REQUEST_URI'] === '/health') {
    http_response_code(200);
    echo "Server is healthy";
    exit();
}
  include 'header.php';

?>
<!-- style sheet is working properly here for some reason -->

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

<body>



  <body>

  <?php
    if(isset($_SESSION["useruid"])) {
      echo "<p class='greeting'>Hello There " . $_SESSION["useruid"] . "</p>";
    }
  ?>
<div class="content-wrap">
    <div class="column-left">
    <section class="gallery-links">
      <div class="wrapper">
  <div class="gallery-heading">
    <h2>Gallery</h2>
  </div>
        <div class="gallery-container">
          <?php
            include_once 'dbh.inc.php';
            $sql = "SELECT * FROM gallery ORDER BY votes DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL STATEMENT FAILED!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while($row = mysqli_fetch_assoc($result)) {
                echo '<a href="items.php?galleryid='.$row["idGallery"].'">'; // Include galleryid as query parameter
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
            }
          ?>
        </div>
      </div>
    </div>
    </div>
    </section>
  </body>
      

<?php
  include 'footer.php';
?>
