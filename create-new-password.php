<?php
  include 'etest.php';
?>
<!------------ CONTENT ------------->   
<section class="signup-form">

    <?php
      $selector = $_GET["selector"];
      $validator = $_GET["validator"];

      if (empty($selector) || empty($validator)) {
        echo "Cant validate request!";
      } else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
      ?>
      <form action="reset-password.inc.php" method="post">
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="validator" value="<?php echo $validator ?>">
        <input type="password" name="pwd" placeholder="Enter a New Password...">
        <input type="password" name="pwd-repeat" placeholder="Repeat New Password...">
        <button type="submit" name="reset-password-submit">Reset Password</button>
      </form>

  <?php
          
        }
      }
    ?>
</section>



    <footer class="footer">
    </footer>
  <script src="script.js"></script>
</html>
