<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->   
<section class="signup-form">
<h2>
  Sign Up
  </h2>
  <form action="signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Full Name...">
    <input type="text" name="email" placeholder="Email...">
    <input type="text" name="uid" placeholder="Username...">
    <input type="password" name="pwd" placeholder="Password...">
    <input type="password" name="pwdRepeat" placeholder="Repeat Password...">
    <button type="submit" name="submit">
      Sign Up
    </button>
  </form>
  <?php
  if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyinput") {
      echo "<p> Fill in all fields! </p>";
    }
    else if ($_GET["error"] == "invaliduid") {
      echo "<p> Choose a proper usename! </p>";
    }
    else if ($_GET["error"] == "invalidemail") {
      echo "<p> Choose a proper email! </p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
      echo "<p> passwords dont match! </p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
      echo "<p> Something went wrong try again! </p>";
    }
    else if ($_GET["error"] == "usernametaken") {
      echo "<p> username already taken! </p>";
    }
    else if ($_GET["error"] == "none") {
      echo "<p> you have signed up! </p>";
    }
  }
?>
    <a href="reset-password.php">Forgot Your Password?</a>
</section>



<?php
  include 'footer.php';
?>
