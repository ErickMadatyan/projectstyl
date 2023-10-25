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
    <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
    <button type="submit" name="submit">
      Sign Up
    </button>
  </form>
</section>



    <footer class="footer">
    </footer>
  <script src="script.js"></script>
</html>
