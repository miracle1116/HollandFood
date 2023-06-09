<?php
session_start();

//Delete ITEM
include_once("../../config.php");
if (isset($_POST['menuID']) && is_numeric($_POST['menuID'])) {
  $menuID = $_POST['menuID'];

  $query = "DELETE FROM menu WHERE menuID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $menuID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}


//Delete CATEGORY
include_once("../../config.php");
if (isset($_POST['menuCategoryID']) && is_numeric($_POST['menuCategoryID'])) {
  $menuCategoryID = $_POST['menuCategoryID'];

  $query = "DELETE FROM menuCategory WHERE menuCategoryID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $menuCategoryID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}


?>
