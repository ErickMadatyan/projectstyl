<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->  
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
