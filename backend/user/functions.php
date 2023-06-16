<?php

function emptyInputSignUp($name,$email, $password, $passwordConfirm){
    $result= true;
    if(empty($name)|| empty($email)||empty($password)||empty($passwordConfirm)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result= true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function pwdMatch($password,$passwordConfirm){
    $result= true;
    if($password!=$passwordConfirm){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function userExists($conn, $email){
    $sql = "SELECT * FROM users WHERE userEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../Layout/user/user_sign_InOut.php?error=stmtfailed");
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

function createUser($conn, $name, $email, $password){
    $sql = "INSERT INTO users (userFirstName, userLastName, userEmail, userPassword, userContactNo, userBirthDate, userGender, userProfilePic) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../Layout/user/user_sign_InOut.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $dash='-';
    $date = 'yyyy-mm-dd';
    $profilePic = '../../images/profile-icon.png';
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $dash, $email, $hashedPwd, $dash, $date, $dash, $profilePic);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../Layout/user/user_sign_InOut.php?error=none");
    exit();
}

function emptyInputLogin($email,$password){
    $result= true;
    if(empty($email)||empty($password)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email, $password){
   $userExists = userExists($conn, $email);

   if($userExists ===false){
    header("location: ../../Layout/user/user_sign_InOut.php?error=userNotExists");
    exit();
   }
   $hashedPwd = $userExists['userPassword'];
   $checkPassword = password_verify($password,$hashedPwd);

   if($checkPassword===false){
    header("location: ../../Layout/user/user_sign_InOut.php?error=wrongpassword");
    exit();
   }
   else if($checkPassword===true){
    session_start();
    $_SESSION["userID"]= $userExists["userID"];
    $_SESSION["userFirstName"]= $userExists["userFirstName"];
    $_SESSION["userLastName"]= $userExists["userLastName"];
    $_SESSION["userEmail"]= $userExists["userEmail"];
    $_SESSION["userPassword"]= $userExists["userPassword"];
    $_SESSION["userContactNo"]= $userExists["userContactNo"];
    $_SESSION["userBirthDate"]= $userExists["userBirthDate"];
    $_SESSION["userGender"]= $userExists["userGender"];
    $_SESSION["userProfilePic"]= $userExists["userProfilePic"];
    $_SESSION["allTableAvailability"]= ['1','1'];
    header("location: ../../index.php");
    exit();
   }
}

