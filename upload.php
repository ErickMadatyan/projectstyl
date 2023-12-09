<?php
  include 'header.php';
require_once 'dbh.inc.php';
?>
<!------------ CONTENT ------------->  


 <!-------- insert background -------->

<body>


<?php
//check if user is logged in
if (isset($_SESSION['userid'])) {
    $userId = $_SESSION['userid'];
?>



<form action="upload.inc.php" method="post" enctype="multipart/form-data">
    <label for="image_upload" class="custom-button">
        <input type="file" name="image_upload" id="image_upload" style="display: none;" accept="image/*">
        Select an image
    </label>
    <input type="submit" value="Upload Image" style="display: none;">
</form>

<?php } else {
	echo "Please log in to upload images.";
	}
?>

    <div class="container">

      <div class="sidebar" id="sidebar">
        <h3>Sidebar</h3>
        <div id="sidebar-items">
          
        </div>
        <button class="add-item-button" id="addItemButton">Add Item</button>
        <button class="upload-button" id="uploadButton">Upload Data</button>
      </div>
    </div>
</body>

<?php
  include 'footer.php';
?>
