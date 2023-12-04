<?php
include 'header.php';
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!------------ CONTENT ------------->   
<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full Name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="uid" placeholder="Username...">
        <input type="password" name="pwd" id="password" placeholder="Password..." oninput="checkPasswordStrength()">
        <span id="password-strength"></span>
        <input type="password" name="pwdRepeat" placeholder="Repeat Password...">
        <div class="g-recaptcha" data-sitekey="6LeEkiQpAAAAADXkInBDRN-5HhcoGAB5Nl2Z1mkk"></div>  
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        $errorMessage = "";

        if ($_GET["error"] == "emptyinput") {
            $errorMessage = "Fill in all fields!";
        } else if ($_GET["error"] == "invaliduid") {
            $errorMessage = "Choose a proper username!";
        } else if ($_GET["error"] == "invalidemail") {
            $errorMessage = "Choose a proper email!";
        } else if ($_GET["error"] == "passwordsdontmatch") {
            $errorMessage = "Passwords don't match!";
        } else if ($_GET["error"] == "stmtfailed") {
            $errorMessage = "Something went wrong, please try again!";
        } else if ($_GET["error"] == "usernametaken") {
            $errorMessage = "Username already taken!";
        } else if ($_GET["error"] == "recaptchafailed") {
            $errorMessage = "reCAPTCHA verification failed! Please try again.";
        }

        echo '<p style="color: red;">' . $errorMessage . '</p>';
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
