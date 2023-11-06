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

      <h1>
        Home page
      </h1>

    </div>  
  </div>


<?php
  include 'footer.php';
?>
</html>
