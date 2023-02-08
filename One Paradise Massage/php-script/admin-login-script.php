<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(checkInput($name, $pwd) !== false){
        header("location: ../admin-login.php?error=emptyfield");
        exit();
    }

    checkInfo($conn, $name, $name);

    login($conn, $name, $pwd);
}
else {
    header("location: ../admin-login.php");
    exit();
}