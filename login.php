<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->   
<section class="signup-form">
<h2>
  Log In
  </h2>
  <form action="login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username/Email...">
    <input type="password" name="pwd" placeholder="Password...">
    <button type="submit" name="submit">
      Log In
    </button>
  </form>
    <?php
  if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput") {
      echo "<p> Fill in all fields! </p>";
    }
    else if ($_GET["error"] == "wronglogin") {
      echo "<p> Incorrect Login! </p>";
    }
    else if ($_GET["error"] == "verifyemail"){
      echo "<p> Verify Email! </p>";
    }
  }
?>
</section>



<?php
  include 'footer.php';
?>
