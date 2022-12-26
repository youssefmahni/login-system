<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat){
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        return true;
    }
    else
        return false;
}

function invalidUsername($name){
    if ( !preg_match("/^[a-zA-Z0-9]*$/",$name)) {
        return true;
    }
    else
        return false;
}

function invalidEmail($email){
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        return true;
    }
    else
        return false;
}

function pwdMatch($pwd, $pwdRepeat){
    if ( $pwd !== $pwdRepeat ) {
        return true;
    }
    else
        return false;
}

function userExists($conn ,$email){
    $sql = "SELECT * FROM users WHERE  usersEmail = ? ;" ;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt , $sql)) {
        header("location:  ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s" ,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn , $name , $email , $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?,?,?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt , $sql)) {
        header("location:  ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:  ../login.php");
    exit();
} 


// **********************************************

function emptyInputLogin($email, $pwd){
    if (empty($email) || empty($pwd)) {
        return true;
    }
    else
        return false;
}

function loginUser($conn, $email, $pwd){
    $emailExists = userExists($conn ,$email);
    if ($emailExists === false) {
        header("location:  ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location:  ../login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $emailExists["usersId"];
        $_SESSION["username"] = $emailExists["usersName"];
        header("location:  ../main/dashboard.php");
        exit();
    }
}
