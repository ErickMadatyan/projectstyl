<?php
  include 'header.php';
?>
<!-- style sheet is working properly here for some reason -->

  <style>
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
      flex: 0 0 48%;
      margin-bottom: 20px;
      text-decoration: none;
      display: flex;
      flex-direction: row;
      border: 1px solid #ddd;
      transition: transform 0.3s ease-in-out;
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
        echo "<p>Hello There " . $_SESSION["useruid"] . "</p>";
      }
    ?>

    <section class="gallery-links">
      <div class="wrapper">
        <h2>Gallery</h2>
        <div class="gallery-container">
          <?php
            include_once 'dbh.inc.php';
            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL STATEMENT FAILED!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">
                        <div class="gallery-image" style="background-image: url(imgs/'.$row["imgFullNameGallery"].');"></div>
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
    </section>
  </body>
      

<?php
  include 'footer.php';
?>
