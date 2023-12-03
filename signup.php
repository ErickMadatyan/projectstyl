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
    <input type="password" name="pwd" id="password" placeholder="Password..." oninput="checkPasswordStrength()">
    <span id="password-strength"></span>
    <input type="password" name="pwdRepeat" placeholder="Repeat Password...">
    <button type="submit" name="submit">Sign Up</button>
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
    <?php
    if (isset($_GET["newpwd"])) {
      if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p> Your Password has been reset!</p>';
      }
    }
      ?>
    <a href="reset-password.php">Forgot Your Password?</a>
</section>

<script>
  function checkPasswordStrength() {
    var password = document.getElementById("password").value;
    var strengthIndicator = document.getElementById("password-strength");

    // Reset strength indicator and color
    strengthIndicator.innerHTML = "";
    strengthIndicator.style.color = "";

    // Minimum length requirement
    if (password.length < 8) {
      strengthIndicator.innerHTML = "Weak";
      strengthIndicator.style.color = "red";
      return;
    }

    // Check for uppercase letters, lowercase letters, and numbers
    var hasUppercase = /[A-Z]/.test(password);
    var hasLowercase = /[a-z]/.test(password);
    var hasNumber = /\d/.test(password);

    // Determine strength level
    if (hasUppercase && hasLowercase && hasNumber) {
      strengthIndicator.innerHTML = "Strong";
      strengthIndicator.style.color = "green";
    } else if (hasUppercase || hasLowercase || hasNumber) {
      strengthIndicator.innerHTML = "Medium";
      strengthIndicator.style.color = "orange";
    } else {
      strengthIndicator.innerHTML = "Weak";
      strengthIndicator.style.color = "red";
    }
  }
</script>

<style>
  #password-strength {
    display: block;
    margin-top: 5px;
    font-size: 14px;
  }
</style>

<?php
  include 'footer.php';
?>
