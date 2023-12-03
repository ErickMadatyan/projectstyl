<?php

if(isset($_POST["reset-request-submit"])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "18.221.93.30/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  require 'dbh.inc.php';

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }
  
  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There was an error!";
    exit();
  } else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;
  $subject = 'Reset your password for Project Styl';
  $message = '<p>There was a request to change your password! If you did not make this request then please ignore this email. Otherwise, please click this link to change your password:</br>';
  $message .= '<a href="' . $url . '">' . $url . '</a></p>';

  $headers = "From: ProjectStyl <project.styl.inc@gmail.com>\r\n";
  $headers .= "Reply-To: project.styl.inc@gmail.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  header("Location: reset-password.php?reset=success");
  
} else {
  header("Location: index.php");
}
