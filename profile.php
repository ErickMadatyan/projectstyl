<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->
  <body>  
  <div class="content-wrap">
    <div class="column-left">
<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'project.styl.inc@gmail.com';
$mail->Password = 'Dark30death';
$mail->SetForm('no-reply@projectstyl.com');
$mail->Subject = 'Hello World';
$mail->Body = 'A test Email!';
$mail->AddAddress('madatyanerick@gmail.com');
$mail->Send();
?>
    </div>  
  </div>  
<?php
  include 'footer.php';
?>
