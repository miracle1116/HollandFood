<?php
if(isset($_POST["submit"])){
    $email =$_POST['email'];
    $password =$_POST['password'];

    $host = "localhost";
    $database = "holland-food";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($host, $user, $pass, $database);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    include_once('functions.php');

    if(emptyInputLogin($email,$password)!==false){
        header("location: ../../Layout/user/user_sign_InOut.php?error=emptylogininput");
        exit();
    }

    loginUser($conn, $email, $password);
}
else{
    header("location: ../../Layout/user/user_sign_InOut.php");
    exit();
}