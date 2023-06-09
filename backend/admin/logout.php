<?php
session_start();

if(isset($_SESSION["adminEmail"])){
    session_unset();
    session_destroy();

    header("location: ../../Layout/admin/admin_login.php");
    exit();
}else{
    header("location: ../../Layout/admin/admin_login.php");
    exit();
}

?>