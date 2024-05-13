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

  
<!------------ Top Navigation ------------->   
  <header>
  <div class="topnav">

<div class="center">
  <form action="search.php" method="GET"> <!-- Change action to point to your search handling PHP file -->
    <input type="text" name="query" id="searchInput" placeholder="Search..."> <!-- Change input name to 'query' -->
  </div>
    <div>
   
<button type="submit" id="searchButton">Search</button>
  </form>   
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.topnav {
  padding-left: 35%;
}
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
  position: fixed;
  z-index: 2;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#"><img src="https://cdn.glitch.global/4ac967db-08b7-4f2f-9f47-431c462bd179/logo2.png?v=1697079907040" alt="Logo" width="200px">             </a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>  

</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
