<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "1234";
$db         = "futurevault"; 

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $db);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>