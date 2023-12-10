<?php

if (isset($_POST['submit'])) {

  $newFileName = $_POST['Title'];
    if (empty($newFileName)) {
      $newFileName = "gallery";
    } else {
      $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['Title'];
    $hatD = $_POST['Hat'];
    $shirtD = $_POST['Shirt'];
    $sweaterD = $_POST['Sweater'];
    $jacketD = $_POST['Jacket'];
    $pantsD = $_POST['Pants'];
    $shortsD = $_POST['Shorts'];
    $glovesD = $_POST['Gloves'];
    $shoesD = $_POST['Shoes'];
    $socksD = $_POST['Socks'];
    $accessoryD = $_POST['Accessory'];
    $file = $_FILES['image_upload'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)){
      if ($fileError === 0){
        if ($fileSize < 20000) {
          $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
          $fileDestination = "../../../var/log/myapp/" . $imageFullName;

              include_once "dbh.inc.php";

              if (empty($imageTitle)) {
                header("Location: upload.php?upload=empty");
                exit();
              } else {
                $sql = "SELECT * FROM gallery;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL statement failed";
                } else {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  $rowCount = mysqli_num_rows($result);
                  $setImageOrder = $rowCount + 1;

                  $sql = "INSERT INTO gallery (imageTitle, imgFullNameGallery, orderGallery, hatDESC, shirtDESC, sweaterDESC, jacketDESC, pantsDESC, shortsDESC, glovesDESC, shoesDESC, socksDESC, accessoryDESC) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL statement failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "sssssssssssss", $imageTitle, $imageFullName, $setImageOrder, $hatD, $shirtD, $sweaterD, $jacketD, $pantsD, $shortsD, $glovesD, $shoesD, $socksD, $accessoryD);
                    mysqli_stmt_execute($stmt);

                    move_uploaded_file($fileTempName, $fileDestination);

                    header("Location: ../upload.php?upload=success");
                }
               
                }
              }

          
        } else {
      echo "File size too big!";
      exit();
        }
      } else{
      echo "You had an error!";
      exit();
      }
    } else {
      echo "You need to upload a proper file type!";
      exit();
    }

}
