<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyLoginInput($name, $pwd) !== false){
        header("location: ../user-login.php?error=emptyfield");
        exit();
    }

    loginAccount($conn, $name, $pwd);
}
else {
    header("location: ../user-login.php");
    exit();
}