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




<?php } else {
	echo "Please log in to upload images.";
	}
?>

<?php
//check if user is logged in
if (isset($_SESSION['userid'])) {
    $userId = $_SESSION['userid'];
//echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHELO " . $_SESSION["useruid"];
?>
    <div class="container">
      <div class="image-container" id="imageContainer"></div>
      <div class="sidebar" id="sidebar">
        <h3>Outfit Info!</h3>
        <div id="sidebar-items">
          <form action="upload.inc.php" method="post" enctype="multipart/form-data">
		  
<label for="image_upload" class="custom-button">
<input type="file" name="image_upload" id="image_upload" style="display: none;" accept="image/*">
Select an image
</label>
		  <input type="text" name="Title" placeholder="Outfit Title...">
		  <input type="text" name="Hat" placeholder="Hat Description...">
		  <input type="text" name="Shirt" placeholder="Shirt Description...">
		  <input type="text" name="Sweater" placeholder="Sweater Description...">
		  <input type="text" name="Jacket" placeholder="Jacket Description...">
		  <input type="text" name="Pants" placeholder="Pants Description...">
		  <input type="text" name="Shorts" placeholder="Shorts Description...">
		  <input type="text" name="Gloves" placeholder="Gloves Description...">
		  <input type="text" name="Shoes" placeholder="Shoes Description...">
		  <input type="text" name="Socks" placeholder="Socks Description...">
		  <input type="text" name="Accessory" placeholder="Accessory Description...">
		  <button type="submit" name="submit">UPLOAD</button>
	  </form>
		  
        </div>
      </div>
    </div>
<?php } else {
	echo '<div class="center-upload">Please log in to upload images.</div>';
	}
?>

</body>

<?php
  include 'footer.php';
?>
