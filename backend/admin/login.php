<?php
include_once("../../config.php");
// ADMIN LOGIN
if(isset($_POST["adminsubmit"])){
    $email =$_POST['email'];
    $password =$_POST['password'];

    if(emptyInputLogin($email,$password)!==false){
        header("location: ../../Layout/admin/admin_login.php?error=emptylogininput");
        exit();
    }

    // $sql = "SELECT * FROM admin WHERE adminEmail='$email' AND adminpassword='$password'";
    // $result = mysqli_query($conn,$sql);

    // $count = mysqli_num_rows($result);
    // if($count==1){
    //     $_SESSION['login']="<p class='success'>Login Successful.</p>";
    //     header("location: ../../Layout/admin/admin_viewTable.html");
        
    // }else{
    //     $_SESSION['login']="<p class='error'>Logindcdcdv.</p>";
    //     header("location: ../../Layout/admin/admin_login.php");
    // }


    loginUser($conn, trim($email), trim($password));
    echo"dfsd";
}
else{
    header("location: ../../Layout/admin/admin_login.php");
    exit();
}



function emptyInputLogin($email,$password){
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function loginUser($conn, $email, $password){
   $userExists = userExists($conn, $email);

   if($userExists ===false){
    header("location: ../../Layout/admin/admin_login.php?error=userNotExists");
    exit();
   }
   $hashedPwd = $userExists["adminPassword"];
//    $checkPassword = password_verify($password,$hashedPwd);

   if($password===$hashedPwd){
    session_start();
    $_SESSION["adminEmail"]= $userExists["adminEmail"];
    $_SESSION["adminPassword"]= $userExists["adminPassword"];
    header("location: ../../Layout/admin/admin_viewTable.php");
    exit();
   }else{
    header("location: ../../Layout/admin/admin_login.php?error=wrongpassword");
    exit();
   }
}

function userExists($conn, $email){
    $sql = "SELECT * FROM admin WHERE adminEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../Layout/admin/admin_login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email );
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result =false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
?>