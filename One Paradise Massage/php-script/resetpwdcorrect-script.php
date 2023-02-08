<?php
session_start();
include("dbh.php");
include("functions.php");
if(isset($_POST["submit"])){
  $cusNewPwd=$_POST["newpwd"];
  $cusConfirmPwd=$_POST["confirmpwd"];
  $cusName = $_SESSION['resetCusName'];
  $cusEmail = $_SESSION['resetCusEmail'];
  if(empty($cusNewPwd || $cusConfirmPwd)){
    header("location: ../resetpwd-correct.php?error=emptyfield");
    exit();
  }
  else if($cusNewPwd !== $cusConfirmPwd){
    header("location: ../resetpwd-correct.php?error=notmatch");
    exit();
  }
else{
    $newhashedPwd = password_hash($cusNewPwd, PASSWORD_DEFAULT);
    $newsql="UPDATE customer SET cusPwd='$newhashedPwd' WHERE cusEmail='$cusEmail' AND cusName='$cusName';";
    mysqli_query($conn,$newsql);
    header("location: ../resetpwd-successful.php");
  }
}
?>