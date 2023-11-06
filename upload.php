<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://glitch.com/favicon.ico" />
    <title>Outfit Creator</title>
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
        <div class="bottom-link">  
        <a href="about.html">About Us</a>
        <a href="tos.html">Terms of Service</a>
        </div>
      </div>
    </div>
<!-------------->

  <style>
 .custom-button {
  display: block;
  text-align: center;
  cursor: pointer;
  width: 200px;
  margin: 0 auto;
  background-color: #3498db;
  color: #ffffff;
  padding: 10px;
  font-size: 14px;
  border: 2px solid #2980b9;
  border-radius: 10px;
}

.custom-button:hover {
  background-color: #2980b9;
}

.custom-button input[type="file"] {
  display: none;
}

.container {
  display: flex;
  width: 800px;
  margin: 0 auto;
}

.image-container { 
  display: flex;
  align-items: center;
  text-align: center;
  width: 600px; /* Adjust the width to your preference */
  height: 600px;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  border: 2px solid #cccccc;
  margin-left: 150px; /* Shift it 100 pixels to the right */
  float: left; /* Added float property */
}

.sidebar {
  width: 200px;
  height: 100%;
  background-color: #f0f0f0;
  float: right;
  padding-left: 100px;
  padding: 10px;
}

.tag {
  position: absolute;
  background-color: white;
  color: #000000;
  padding: 12px;
  border-radius: 10px;
  border: 2px solid gray;
  font-size: 14px;
  cursor: move;
  display: flex;
  justify-content: space-between;
}

.tag .tag-text {
  flex-grow: 1;
  min-width: 50px;

}

.tag .tag-text[contenteditable="true"] {
  background: transparent;
  border: none;
  color: #000000;

}

.sidebar-item {
  margin-bottom: 10px;
}

.add-item-button {
  display: block;
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

.upload-button {
  display: block;
  background-color: #3498db;
  color: white;
  border: none;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}   
  </style>
  
  </header>
<!------------ CONTENT ------------->  


 <!-------- insert background -------->

<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image_upload" class="custom-button">
        <input type="file" name="image_upload" id="image_upload" style="display: none;" accept="image/*">
        Select an image
    </label>
    <input type="submit" value="Upload Image" style="display: none;">
</form>

    <div class="container">
      <div class="image-container" id="imageContainer"></div>
      <div class="sidebar" id="sidebar">
        <h3>Sidebar</h3>
        <div id="sidebar-items">
          <!-- Items and links will be dynamically added here -->
        </div>
        <button class="add-item-button" id="addItemButton">Add Item</button>
        <button class="upload-button" id="uploadButton">Upload Data</button>
      </div>
    </div>


      <footer class="footer">    
      <div>
        <h4>Questions? Email us!</h4>
      </div>
        <div class="contact-info">
          <div>
            <a href="project.styl.inc@gmail.com"><i class="fa-solid fa-envelope"></i></a><a href="project.styl.inc@gmail.com">project.styl.inc@gmail.com</a><a href="project.styl.inc@gmail.com"><i class="fa-solid fa-envelope"></i></a>
          </div>
        </div>
    </footer>
</body>
      <script src="script.js"></script>

</html>
