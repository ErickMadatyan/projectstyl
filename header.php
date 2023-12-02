<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://glitch.com/favicon.ico" />
    <title>Project STYL</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/86af3d0397.js" crossorigin="anonymous"></script> <!-- fontawesome -->
  </head>
  
<!------------ Top Navigation ------------->   
  <header>
  <div class="topnav">
    <div class="left">
      <a href="#"><img src="https://cdn.glitch.global/4ac967db-08b7-4f2f-9f47-431c462bd179/logo2.png?v=1697079907040" alt="Logo" width="200px">             </a>
    </div>
    <div class="center">
      <input type="text" id="searchInput" placeholder="Search...">
          
    </div>
    <div>     
      <button id="searchButton">Search</button>     
    </div>
      <div class="right">
        <?php
          if(isset($_SESSION["useruid"])) {
            echo '<a href="profile.php" id="loginButton">Profile Page</a>';
            echo '<a href="logout.inc.php" id="loginButton">Log Out</a>';
          }
          else {
            echo '<a href="signup.php" id="loginButton">Sign Up</a>';
            echo '<a href="login.php" id="loginButton">Login</a>';
          }
        ?>
      </div>
  </div>
    
<!------------ Side Navigation -------------> 
    <div class="sidenavcontent">
      <div class="sidenav">
          <a href="index.php" class="nav-link">
            <div class="nav-box">
                <span>Home</span>
            </div></a>
          <a href="explore.php" class="nav-link">
            <div class="nav-box">
                <span>Explore</span>
            </div></a>
                  <a href="upload.php" class="nav-link">
            <div class="nav-box">
                <span>Create Outfit</span>
            </div></a>
                  <a href="profile.php" class="nav-link">
            <div class="nav-box">
                <span>Your Profile</span>
            </div></a>
        
        <div class="bottom-link">  
          <a href="about.php">About Us</a>
          <a href="tos.php">Terms of Service</a>
          
          <div class ="center">
             <p>Copyright PROJECT STYL</p>
          </div>
        </div>        
      </div>
    </div>
     
  </header>
  
  
