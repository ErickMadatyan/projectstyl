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
            <form action="login.php" method="post">
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
  <div class="content-wrap">
    <div class="column-left">

      <h1>
        Explore
      </h1>

    </div>  
  </div>   
    
    
    <footer class="footer">
    </footer>
  </body>
  <script src="script.js"></script>
</html>
