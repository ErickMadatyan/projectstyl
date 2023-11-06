<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->   
  <body>

        <!-- Login Form (hidden by default) -->
    <div class="login-modal" id="loginModal">
        <div class="login-content">
            <span class="close" id="closeButton">&times;</span>
            <h2>Login</h2>
            <form>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

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
