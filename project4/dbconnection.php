<?php


$servername = "localhost:3307";
$username = "akshay";
$password = "sai123";
$db ="pro1";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
  //echo "sicc";
}

?>

