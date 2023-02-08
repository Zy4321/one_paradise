<?php
session_start();
include("dbh.php");
include("functions.php");
if(isset($_POST["submit"])){
  $cusEmail=$_POST["email"];
  $cusName=$_POST["name"];
  $_SESSION['resetCusName'] = $cusName;
  $_SESSION['resetCusEmail'] = $cusEmail;
  $nameExist=nameAvailability($conn, $cusName, $cusEmail);
  if(empty($cusEmail) || empty($cusName)){
    header("location: ../reset-pwd.php?error=emptyfield");
    exit();
  }else
  if($nameExist === false){
    header("location: ../reset-pwd.php?error=wronginfo");
    exit();
} else if($nameExist['cusName'] != $cusName || $nameExist['cusEmail'] != $cusEmail){
    header("location: ../reset-pwd.php?error=wronginfo");
    exit();
}
else{
    header("location: ../resetpwd-correct.php");
  }
}
?>