<?php
session_start();

//INSERT CATEGORY
include_once("../../config.php");
if(isset($_POST['addcategory'])) {	
  $menuCategory = mysqli_real_escape_string($conn, $_POST['menuCategory']);
  //print_r($_FILES['menuCategoryImage']);

  // Check if the category already exists
  $checkQuery = "SELECT menuCategory FROM menucategory WHERE menuCategory = ?";
  $checkStmt = mysqli_prepare($conn, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "s", $menuCategory);
  mysqli_stmt_execute($checkStmt);
  mysqli_stmt_store_result($checkStmt);

  if (mysqli_stmt_num_rows($checkStmt) > 0) {
    header("Location: ../../Layout/admin/admin_menu.php?error=duplicatecategory");
    exit();
  }

  if(isset($_FILES['menuCategoryImage']['name'])){
    //Upload image, we need image name, source path and destination path
    $image_categoryname=$_FILES['menuCategoryImage']['name'];

    // Check if the uploaded file is an image
    $allowed_exs = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($image_categoryname, PATHINFO_EXTENSION));

    if(!in_array($file_extension, $allowed_exs)){
      header("Location: ../../Layout/admin/admin_menu.php?error=filetypeerror");
      exit();
    }

    //year, month, day, hour, minute, and second
    $upload_datetime = date('YmdHis');
    $image_categoryname = "category-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['menuCategoryImage']['tmp_name'];
    $destination_path='../../images/'.$image_categoryname;

    //Finally upload the image
    $upload = move_uploaded_file($source_path,$destination_path);
    

  }else{
    $image_categoryname="";
  }

    $query = "INSERT INTO menucategory (`menuCategory`, `menuCategoryImage`) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $menuCategory, $image_categoryname);
    $result = mysqli_stmt_execute($stmt);

    header("location: ../../Layout/admin/admin_menu.php");  
    exit();  

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
	
}


//INSERT MENU ITEM
include_once("../../config.php");
if(isset($_POST['additem'])) {	
  $menuCategory = mysqli_real_escape_string($conn, $_POST['menuCategory']);
  $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
  $itemPrice = mysqli_real_escape_string($conn, $_POST['itemPrice']);
  $itemIngredient = mysqli_real_escape_string($conn, $_POST['itemIngredient']);
	
  // Check if the item name already exists
  $checkQuery = "SELECT menuName FROM menu WHERE menuName = ?";
  $checkStmt = mysqli_prepare($conn, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "s", $itemName);
  mysqli_stmt_execute($checkStmt);
  mysqli_stmt_store_result($checkStmt);

  if (mysqli_stmt_num_rows($checkStmt) > 0) {
    header("Location: ../../Layout/admin/admin_menu.php?error=duplicate");
    exit();
  }


  // Price validation
  if (!is_numeric($itemPrice)) {
    header("Location: ../../Layout/admin/admin_menu.php?error=invalidprice");
    exit();
  }
  
  if(isset($_FILES['itemImage']['name'])){
    //Upload image, we need image name, source path and destination path
    $image_itemname=$_FILES['itemImage']['name'];

    // Check if the uploaded file is an image
    $allowed_exs = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($image_itemname, PATHINFO_EXTENSION));

    if(!in_array($file_extension, $allowed_exs)){
      header("Location: ../../Layout/admin/admin_menu.php?error=filetypeerror");
      exit();
    }

    $upload_datetime = date('YmdHis');
    $image_itemname = "item-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['itemImage']['tmp_name'];
    $destination_path='../../images/'.$image_itemname;

    //Finally upload the image
    $upload = move_uploaded_file($source_path,$destination_path);

  }else{
    $image_itemname="";
  }

    $query = "INSERT INTO menu (`menuCategory`, `menuName`, `menuPrice`, `menuIngredient`, `menuImage`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssdss", $menuCategory, $itemName, $itemPrice, $itemIngredient, $image_itemname);
    $result = mysqli_stmt_execute($stmt);

    header("location: ../../Layout/admin/admin_menu.php");  
    exit();  

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
	
}




//UPDATE MENU CATEGORY
include_once("../../config.php");
if(isset($_POST['editcategory'])) {

  $menuCategoryID = mysqli_real_escape_string($conn, $_POST['menuCategoryID']);
  $menuCategory = mysqli_real_escape_string($conn, $_POST['categoryName']);

  // Check if the category already exists
  $checkQuery = "SELECT menuCategory FROM menucategory WHERE menuCategory = ?";
  $checkStmt = mysqli_prepare($conn, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "s", $menuCategory);
  mysqli_stmt_execute($checkStmt);
  mysqli_stmt_store_result($checkStmt);

  if (mysqli_stmt_num_rows($checkStmt) > 0) {
    header("Location: ../../Layout/admin/admin_menu.php?error=duplicatecategory");
    exit();
  }

  if(isset($_FILES['menuCategoryImage']['name'])){
    $image_categoryname=$_FILES['menuCategoryImage']['name'];

    $allowed_exs = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($image_categoryname, PATHINFO_EXTENSION));

    if(in_array($file_extension, $allowed_exs)){
      $upload_datetime = date('YmdHis');
      $image_categoryname = "category-" . $upload_datetime . '.' . $file_extension;

      $source_path=$_FILES['menuCategoryImage']['tmp_name'];
      $destination_path='../../images/'.$image_categoryname;

      $upload = move_uploaded_file($source_path,$destination_path);
    }

  }else{
    $image_categoryname="";
  }

  //Empty Name
  if(empty(trim($menuCategory))){
    header("Location: ../../Layout/admin/admin_menu.php?error=emptyinput");
    exit();
  //Edit Name only
  }else if(empty(trim($image_categoryname))){
    $stmt = $conn->prepare("UPDATE menucategory SET menuCategory=? WHERE menuCategoryID=?");
    $stmt->bind_param("si", $menuCategory,$menuCategoryID);
    $stmt->execute();
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  //Invalid file type
  }else if(!in_array($file_extension, $allowed_exs)){
    header("Location: ../../Layout/admin/admin_menu.php?error=filetypeerror");
    exit();
  }else{
    $stmt = $conn->prepare("UPDATE menucategory SET menuCategory=?, menuCategoryImage=? WHERE menuCategoryID=?");
    $stmt->bind_param("ssi", $menuCategory, $image_categoryname,$menuCategoryID);
    $stmt->execute();
    // echo '<script> alert("Category Updated");</script>';
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  }


  $stmt->close();
  $conn->close();
} 




//UPDATE MENU ITEM
include_once("../../config.php");
if(isset($_POST['edititem'])) {

  $menuID = mysqli_real_escape_string($conn, $_POST['menuID']);
  $menuCategory = mysqli_real_escape_string($conn, $_POST['menuCategory']);
  $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
  $itemPrice = mysqli_real_escape_string($conn, $_POST['itemPrice']);
  $itemIngredient = mysqli_real_escape_string($conn, $_POST['itemIngredient']);
  
  // Check if the item name already exists
  $checkQuery = "SELECT menuName FROM menu WHERE menuName = ?";
  $checkStmt = mysqli_prepare($conn, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "s", $itemName);
  mysqli_stmt_execute($checkStmt);
  mysqli_stmt_store_result($checkStmt);

  if (mysqli_stmt_num_rows($checkStmt) > 0) {
    header("Location: ../../Layout/admin/admin_menu.php?error=duplicate");
    exit();
  }

  // Price validation
  if (!is_numeric($itemPrice)) {
    header("Location: ../../Layout/admin/admin_menu.php?error=invalidprice");
    exit();
  }

  if(isset($_FILES['itemImage']['name'])){
    $image_itemname=$_FILES['itemImage']['name'];

    $allowed_exs = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($image_itemname, PATHINFO_EXTENSION));

    if(in_array($file_extension, $allowed_exs)){
      $upload_datetime = date('YmdHis');
      $image_itemname = "item-" . $upload_datetime . '.' . $file_extension;
  
      $source_path=$_FILES['itemImage']['tmp_name'];
      $destination_path='../../images/'.$image_itemname;
  
      $upload = move_uploaded_file($source_path,$destination_path);
    }

  }else{
    $image_itemname="";
  }

  //Empty Field except Image 
  if(($menuCategory==="-")||empty(trim($itemName))||empty(trim($itemPrice))||empty(trim($itemIngredient))){
    header("Location: ../../Layout/admin/admin_menu.php?error=emptyinput");
    exit();
  //Edit All except Image 
  }else if(empty(trim($image_itemname))){
    $stmt = $conn->prepare("UPDATE menu SET menuCategory=?, menuName=?, menuPrice=?, menuIngredient=? WHERE menuID=?");
    $stmt->bind_param("ssdsi", $menuCategory, $itemName, $itemPrice, $itemIngredient, $menuID);
    $stmt->execute();
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  //Invalid file type
  }else if(!in_array($file_extension, $allowed_exs)){
    echo '<script> console.log(222); </script>';
    header("Location: ../../Layout/admin/admin_menu.php?error=filetypeerror");
    exit();
  }else{
    $stmt = $conn->prepare("UPDATE menu SET menuCategory=?, menuName=?, menuPrice=?, menuIngredient=?, menuImage=? WHERE menuID=?");
    $stmt->bind_param("ssdssi", $menuCategory, $itemName, $itemPrice, $itemIngredient, $image_itemname, $menuID);
    $stmt->execute();
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  }


  $stmt->close();
  $conn->close();
} 


?>