<?php
  include 'header.php';
?>
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
  <div style="width: 100%; height: 140px; background-color: red;"></div>
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
