<?php
  include 'etest.php';
?>
<!------------ CONTENT ------------->   
<section class="signup-form">
<h2>
  Reset your password
  </h2>
  <p>An E-mail will be sent with instructions to reset your password</p>
  <form action="reset-request.inc.php" method="post">
    <input type="text" name="email" placeholder="Enter your E-mail Address...">
    <button type="submit" name="reset-request-submit">Submit Password Reset</button>
  </form>

  <?php 
    if (isset($_GET["reset"])) {
      if ($_GET["reset"] == "success") {
        echo '<p class="signupsuccess">Check Your E-mail!</p>';
      }
    }
  ?>
      
</section>



    <footer class="footer">
    </footer>
  <script src="script.js"></script>
</html>
