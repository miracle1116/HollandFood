<?php

session_start();

if(isset($_POST['pax'])){
    $_SESSION['noOfPax']=$_POST['pax'];
}