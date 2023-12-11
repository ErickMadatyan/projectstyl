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
   flex: 0 0 48%; /* Adjust the flex-basis as needed */
   margin-bottom: 20px;
   text-decoration: none;
   display: flex;
   flex-direction: row; /* Display image and text side by side */
   border: 1px solid #ddd;
   transition: transform 0.3s ease-in-out;
}

  .gallery-container a:hover {
    transform: scale(1.05);
  }

  .gallery-container a div {
    width: 60%;
    height: 500px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
      background-color: #99ccff
    
  }

   .gallery-container a .item-descriptions {
    width: 40%;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: scroll;
    font-family: 'Open Sans', sans-serif; /* Use Open Sans font for item descriptions */
    color: #333; /* Set text color to a readable color */
    background-color: #99ccff
   
  }

    .gallery-container a h3 {
    font-size: 1.8em; /* Increase font size for headings */
    margin-top: 0;
    margin-bottom: 10px;
    color: #007BFF; /* Set a color for headings */
  }

 .gallery-container a p {
    margin: 5px 0;
    font-size: 1em; /* Adjust font size for paragraphs */
    line-height: 1.4; /* Improve line spacing for readability */
  }
</style>
<!------------ CONTENT ------------->   
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
      

<?php
  include 'footer.php';
?>
