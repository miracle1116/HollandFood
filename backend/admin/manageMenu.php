<?php

//INSERT CATEGORY
include_once("../../config.php");
if(isset($_POST['addcategory'])) {	
  // Escape the values to prevent SQL injection
  $menuCategory = mysqli_real_escape_string($conn, $_POST['menuCategory']);
	
  //Check whether the image is selected or not and set the value for image name accordingly
  //print_r($_FILES['menuCategoryImage']);

  if(isset($_FILES['menuCategoryImage']['name'])){
    //Upload image, we need image name, source path and destination path
    $image_categoryname=$_FILES['menuCategoryImage']['name'];

    //Rename Image
    //get extension (jpg,png...)
    $ext = explode('.',$image_categoryname);
    $file_extension = end($ext);
    //year, month, day, hour, minute, and second
    $upload_datetime = date('YmdHis');
    $image_categoryname = "category-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['menuCategoryImage']['tmp_name'];
    $destination_path='../../images/'.$image_categoryname;

    //Finally upload the image
    $upload = move_uploaded_file($source_path,$destination_path);

    //Check if the image is uploaded
    if($upload==false){
      //STOP the process
      die();
    }
  }else{
    $image_categoryname="";
  }
  
    $query = "INSERT INTO menucategory (`menuCategory`, `menuCategoryImage`) VALUES ('$menuCategory','$image_categoryname')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      echo 'success';
    } else {
      echo 'error';
    }

    header("location: ../../Layout/admin/admin_menu.php");  
    exit();  

    mysqli_close($conn);

	
}


//INSERT MENU ITEM
include_once("../../config.php");
if(isset($_POST['additem'])) {	
  // Escape the values to prevent SQL injection
  $menuCategory = mysqli_real_escape_string($conn, $_POST['menuCategory']);
  $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
  $itemPrice = mysqli_real_escape_string($conn, $_POST['itemPrice']);
  $itemIngredient = mysqli_real_escape_string($conn, $_POST['itemIngredient']);
	
  if(isset($_FILES['itemImage']['name'])){
    //Upload image, we need image name, source path and destination path
    $image_itemname=$_FILES['itemImage']['name'];

    //Rename Image
    //get extension (jpg,png...)
    $ext = explode('.',$image_itemname);
    $file_extension = end($ext);
    //year, month, day, hour, minute, and second
    $upload_datetime = date('YmdHis');
    $image_itemname = "item-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['itemImage']['tmp_name'];
    $destination_path='../../images/'.$image_itemname;

    //Finally upload the image
    $upload = move_uploaded_file($source_path,$destination_path);

    //Check if the image is uploaded
    if($upload==false){
        //STOP the process
        die();
      
    }
  }else{
    $image_itemname="";
  }

    $query = "INSERT INTO menu (`menuCategory`, `menuName`,`menuPrice`,`menuIngredient`,`menuImage`) VALUES ('$menuCategory','$itemName','$itemPrice','$itemIngredient','$image_itemname')";
    $result = mysqli_query($conn,$query);

    header("location: ../../Layout/admin/admin_menu.php");  
    exit();  
    mysqli_close($conn);
	
}




//UPDATE MENU CATEGORY
include_once("../../config.php");
if(isset($_POST['editcategory'])) {

  $menuCategoryID = mysqli_real_escape_string($conn, $_POST['menuCategoryID']);
  $menuCategory = mysqli_real_escape_string($conn, $_POST['categoryName']);

  if(isset($_FILES['menuCategoryImage']['name'])){
    $image_categoryname=$_FILES['menuCategoryImage']['name'];

    $ext = explode('.',$image_categoryname);
    $file_extension = end($ext);
    $upload_datetime = date('YmdHis');
    $image_categoryname = "category-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['menuCategoryImage']['tmp_name'];
    $destination_path='../../images/'.$image_categoryname;

    $upload = move_uploaded_file($source_path,$destination_path);

    if(!$upload){
      die();
    }
  }else{
    $image_categoryname="";
  }

  $stmt = $conn->prepare("UPDATE menucategory SET menuCategory=?, menuCategoryImage=? WHERE menuCategoryID=?");
  $stmt->bind_param("ssi", $menuCategory, $image_categoryname,$menuCategoryID);
  if ($stmt->execute()) {
    echo '<script> alert("Data Updated");</script>';
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  } else {
    echo '<script> alert("Data Not Updated");</script>';
    echo "Error updating menu category: " . $stmt->error;
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
  

  if(isset($_FILES['itemImage']['name'])){
    $image_itemname=$_FILES['itemImage']['name'];

    $ext = explode('.',$image_itemname);
    $file_extension = end($ext);
    $upload_datetime = date('YmdHis');
    $image_itemname = "item-" . $upload_datetime . '.' . $file_extension;

    $source_path=$_FILES['itemImage']['tmp_name'];
    $destination_path='../../images/'.$image_itemname;

    $upload = move_uploaded_file($source_path,$destination_path);

    if($upload==false){
        die();
    }
  }else{
    $image_itemname="";
  }

  $stmt = $conn->prepare("UPDATE menu SET menuCategory=?, menuName=?, menuPrice=?, menuIngredient=?, menuImage=? WHERE menuID=?");
  $stmt->bind_param("ssdssi", $menuCategory, $itemName, $itemPrice, $itemIngredient, $image_itemname, $menuID);
  if ($stmt->execute()) {
    echo '<script> alert("Data Updated");</script>';
    header("location: ../../Layout/admin/admin_menu.php");  
    exit();
  } else {
    echo '<script> alert("Data Not Updated");</script>';
    echo "Error updating menu category: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} 


?>