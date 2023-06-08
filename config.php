<?php 
$host = "localhost";
$database = "admin_table";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>