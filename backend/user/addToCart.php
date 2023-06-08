<?php
session_start();

$menuID= $_POST['menuID'];
if(isset($_SESSION['cart'][$menuID])){
    $_SESSION['cart'][$menuID]++;
}else{
    $_SESSION['cart'][$menuID]= "1";
}
echo json_encode(['status' => 'success']);