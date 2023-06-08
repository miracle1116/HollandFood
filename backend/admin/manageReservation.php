<?php

include_once("../../config.php");

//Delete
if (isset($_POST['reserveID']) && is_numeric($_POST['reserveID'])) {
  $reserveID = $_POST['reserveID'];

  $query = "DELETE FROM reservation WHERE reserveID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $reserveID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}


//Move to reservetion tab
if (isset($_POST['reserveID']) && is_numeric($_POST['reserveID'])) {
  $reserveID = $_POST['reserveID'];

  $query = "SELECT * FROM reservation WHERE reserveID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $reserveID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    // Check if a row is returned
    if (mysqli_stmt_num_rows($stmt) > 0) {
      // Move the reservation from waitlist to reservation
      $updateQuery = "UPDATE reservation SET status = 'approved' WHERE reserveID = ?";
      $updateStmt = mysqli_prepare($conn, $updateQuery);
      mysqli_stmt_bind_param($updateStmt, 'i', $reserveID);
      $updateResult = mysqli_stmt_execute($updateStmt);

      if ($updateResult) {
        echo "success";
      } else {
        echo "error";
      }

      mysqli_stmt_close($updateStmt);
    } else {
      echo "error";
    }
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}




?>