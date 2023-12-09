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
  background-color: red;
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
          <a href="#">
            <div> </div>
            <h3>This is a title</h3>
            <p>This is a paragraph</p>
          </a>
          <a href="#">
            <div> </div>
            <h3>This is a title</h3>
            <p>This is a paragraph</p>
          </a>
          <a href="#">
            <div> </div>
            <h3>This is a title</h3>
            <p>This is a paragraph</p>
          </a>
          <a href="#">
            <div> </div>
            <h3>This is a title</h3>
            <p>This is a paragraph</p>
          </a>
          
          
        </div>

      </div>
    </section>
      
    </div>  
  </div>
<?php
  include 'footer.php';
?>
