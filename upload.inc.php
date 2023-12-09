<?php

if (isset($_POST['submit'])) {

  $newFileName = $_POST['userUid']
    if empty($_POST['userUid']) {
      $newFileName = "gallery";
    } else {
      $newFileName = $newFileName;
}

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
    

}
