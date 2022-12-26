<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false) {
        header("location:  ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($name) !== false) {
        header("location:  ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location:  ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location:  ../signup.php?error=pwdsdontmatch");
        exit();
    }

    if (userExists($conn ,$email ) !== false) {
        header("location:  ../signup.php?error=userexists");
        exit();
    }

    createUser($conn , $name , $email , $pwd);

}
else{
    header("location:  ../signup.php");
    exit();
}