<?php
  include 'header.php';
?>
<!-- style sheet is working properly here for some reason -->
<style>
   .gallery-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .gallery-container a {
    width: 30%;
    margin-bottom: 20px;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd; /* Add a border for better separation */
    transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
  }

  .gallery-container a:hover {
    transform: scale(1.05); /* Enlarge the image on hover for a subtle effect */
  }

  .gallery-container a div {
    width: 100%;
    height: 300px;
    background-size: cover;
    background-position: center;
  }

  .gallery-container a .item-descriptions {
    width: 100%;
    text-align: center;
    padding: 10px;
  }

  .gallery-container a h3 {
    margin: 10px 0;
    font-size: 1.2em;
  }

  .gallery-container a p {
    margin: 5px 0;
  }

</style>
<!------------ CONTENT ------------->   
  <body>

  <div class="content-wrap">
    <div class="column-left">

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
                    <div style="background-image: url(imgs/'.$row["imgFullNameGallery"].');"></div>
                    <div class="item-descriptions">
                        <h3>'.$row["imageTitle"].'</h3>
                        <p>'.$row["hatDESC"].'</p>
                        <p>'.$row["shirtDESC"].'</p>
                        <p>'.$row["sweaterDESC"].'</p>
                        <p>'.$row["jacketDESC"].'</p>
                        <p>'.$row["pantsDESC"].'</p>
                        <p>'.$row["shortsDESC"].'</p>
                        <p>'.$row["glovesDESC"].'</p>
                        <p>'.$row["shoesDESC"].'</p>
                        <p>'.$row["socksDESC"].'</p>
                        <p>'.$row["accessoryDESC"].'</p>
                    </div>
                  </a>';
      }
    }

            ?>
        </div>

      </div>
    </section>
      
    </div>  
  </div>
<?php
  include 'footer.php';
?>
