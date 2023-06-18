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

    loginAdmin($conn, trim($email), trim($password));
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

function loginAdmin($conn, $email, $password){
   $adminExists = adminExists($conn, $email);

   if($adminExists ===false){
    header("location: ../../Layout/admin/admin_login.php?error=wrongadminemail");
    exit();
   }
   $adminPassword = $adminExists["adminPassword"];

   if($password===$adminPassword){
    session_start();
    $_SESSION["adminEmail"]= $adminExists["adminEmail"];
    $_SESSION["adminPassword"]= $adminExists["adminPassword"];
    header("location: ../../Layout/admin/admin_viewTable.php");
    exit();
   }else{
    header("location: ../../Layout/admin/admin_login.php?error=wrongpassword");
    exit();
   }
}

function adminExists($conn, $email){
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