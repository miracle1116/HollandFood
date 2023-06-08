<?php
session_start();

$menuID= $_POST['menuID'];
if(isset($_SESSION['cart'][$menuID])){
    $_SESSION['cart'][$menuID]--;
}

echo json_encode(['status' => 'success']);