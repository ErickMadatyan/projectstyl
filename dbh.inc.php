<?php
$serverName = "db2102024.cr6vvrkufa98.us-east-2.rds.amazonaws.com";
$dBUsername = "admin";
$dbPassword = "Dark30death";
$dBName = "db2102024";
$port = 3306; // Default port for MySQL

// Create connection
$conn = new mysqli($serverName, $dBUsername, $dbPassword, $dBName, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
