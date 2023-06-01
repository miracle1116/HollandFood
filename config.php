<?php 
$DBHost= 'localhost';
$DBName = 'lab9';
$DBUserName= 'root';
$DBPassword = '';

try {
    $conn = new PDO("mysql:host=$DBHost;dbname=lab9", $DBUserName, $DBPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>