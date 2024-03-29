<?php
session_start();

//Update Status
include_once("../../config.php");
if (isset($_POST['reserveID']) && is_numeric($_POST['reserveID'])) {
  $reserveID = $_POST['reserveID'];

  $query = "UPDATE reservation SET status = 'Approved' WHERE reserveID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $reserveID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo 'success';
  } else {
    echo 'error';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>
