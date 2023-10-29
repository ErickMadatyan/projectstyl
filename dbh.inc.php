<?php
$serverName = "13.59.172.129";
$dBUsername = "root";
$dbPassword = "Dark30death";
$dBName = "projectstyldb";

$conn = mysqli_connect($serverName, $dBUsername, $dbPassword, $dBName);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
