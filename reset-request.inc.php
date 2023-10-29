<?php

if(isset($_POST["reset-request-submit"])) {

  $selector = random_bytes(8);
}
else {
  header("Location: index.php");
}
