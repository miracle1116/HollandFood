<?php
session_start();
include_once '../../config.php';

 // update the Database
 $sql = "DELETE FROM users WHERE userID=?;";
 $stmt = $conn->prepare($sql);
 $stmt->execute([$_SESSION['userID']]);

 include_once 'logout.php';