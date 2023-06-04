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
        header("location: user_sign_InOut.php?error=stmt");
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
        header("location: user_sign_InOut.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $dash='-';
    $profilePic = '/images/profilePic.png';
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $dash, $email, $hashedPwd, $dash, $dash, $dash, $profilePic);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: user_sign_InOut.php?error=none");
    exit();
}