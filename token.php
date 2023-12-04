<?php
  include 'header.php';
?>

 <div class="content-wrap">
    <div class="column-left">

 <?php 
    if (isset($_GET["token"])) {
        require 'dbh.inc.php';
        $sql = "UPDATE users SET email_verified=true WHERE verification_code=?";
        $stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $_GET["token"]);
    mysqli_stmt_execute($stmt);
  }


      
        echo '<p class="signupsuccess">Verified!</p>';
      
    }
  ?>
    </div>  
  </div>


<?php
  include 'footer.php';
?>
