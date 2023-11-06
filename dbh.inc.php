<?php
$serverName = "localhost";
$dBUsername = "root";
$dbPassword = "Dark30death";
$dBName = "projectstyldb";

$conn = mysqli_connect($serverName, $dBUsername, $dbPassword, $dBName);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
