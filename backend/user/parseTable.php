<?php

session_start();
include_once("../../config.php");

if($_POST['table']!==""){
    $_SESSION['selectedTable']= $_POST['table'];
    header("location: ../../Layout/user/user_menu.php");
    exit();
}else{
    header("location: ../../Layout/user/user_menu.php?error=noTableSelected");
    exit();
}