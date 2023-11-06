<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://glitch.com/favicon.ico" />
    <title>Outfit Creator</title>
    <link rel="stylesheet" href="/style.css" />
    <script src="https://kit.fontawesome.com/86af3d0397.js" crossorigin="anonymous"></script> <!-- fontawesome -->
  </head>
  
<!------------ Top Navigation ------------->   
<header>
  <div class="topnav">
    <div class="left">
      <a href="#"><img src="https://cdn.glitch.global/4ac967db-08b7-4f2f-9f47-431c462bd179/logo2.png?v=1697079907040" alt="Logo" width="200px">             </a>
    </div>
    <div class="center">
          <h1>
        Outfit Creator
      </h1>
          </div>
                <div class="right">
        <a href="#" id="loginButton"></a>
      </div>

  </div>
<style>
  
  </style>
<!------------ Side Navigation -------------> 
    <div class="sidenavcontent">
      <div class="sidenav">
          <a href="index.html" class="nav-link">
            <div class="nav-box">
                <span>Home</span>
            </div></a>
          <a href="explore.html" class="nav-link">
            <div class="nav-box">
                <span>Explore</span>
            </div></a>
                  <a href="upload.html" class="nav-link">
            <div class="nav-box">
                <span>Create Outfit</span>
            </div></a>
                  <a href="profile.html" class="nav-link">
            <div class="nav-box">
                <span>Your Profile</span>
            </div></a>
        
        <div class="bottom-link">  
          <a href="about.html">About Us</a>
          <a href="tos.html">Terms of Service</a>
          
          <div class ="center">
             <p>Copyright PROJECT STYL</p>
          </div>
        </div>        
      </div>
    </div>
     
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
