<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptySignupInput($name, $email, $pwd) !== false){
        header("location: ../user-signup.php?error=emptyfield");
        exit();
    }

    if(invalidName($name) !== false){
        header("location: ../user-signup.php?error=invalidusername");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../user-signup.php?error=invalidemail");
        exit();
    }

    if(nameAvailability($conn, $name, $email) !== false){
        header("location: ../user-signup.php?error=usernametaken");
        exit();
    }

    if(nameLength($name) !== false){
        header("location: ../user-signup.php?error=usernametooshort");
        exit();
    }

    createAccount($conn, $name, $email, $pwd);
    
}
else {
    header("location: ../user-signup.php");
    exit();
}