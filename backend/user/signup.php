<?php
    $host = "localhost";
    $database = "holland-food";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($host, $user, $pass, $database);

    $sql = "SELECT * FROM users";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    include_once('functions.php');

    if(isset($_POST['submit'])){
        $name =$_POST["name"];
        $email =$_POST["email"];
        $password=$_POST["password"];
        $passwordConfirm =$_POST["passwordConfirm"];

        if(emptyInputSignUp($name,$email, $password, $passwordConfirm)!==false){
            header("location: ../../Layout/user/user_sign_InOut.php?error=emptyinput");
            exit();
        }
        if(invalidEmail($email)!==false){
            header("location: ../../Layout/user/user_sign_InOut.php?error=invalidEmail");
            exit();
        }
        if(pwdMatch($password,$passwordConfirm)!==false){
            header("location: ../../Layout/user/user_sign_InOut.php?error=passworddonotmatch");
            exit();
        }
        if(userExists($conn, $email)!==false){
            header("location: ../../Layout/user/user_sign_InOut.php?error=emailused");
            exit();
        }

        createUser($conn, $name, $email, $password);



    }else{
        header("location: ../../Layout/user/user_sign_InOut.php");
    }

?>
