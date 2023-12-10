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
}

.gallery-container a div {
  width: 100%;
  height: 200px; /* Adjust the height according to your preference */
}

.gallery-container a h3,
.gallery-container a p {
  text-align: center;
  margin: 10px 0;
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
 <div style="background-image: url(/imgs/asd.65753d9e082bb2.58862459.jpg);"></div>
            <h3>'.$row["imgFullNameGallery"].'</h3>
            <p>'.$row["hatDESC"].'</p>
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
