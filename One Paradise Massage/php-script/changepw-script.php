<?php
session_start();
include("dbh.php");
include("functions.php");
if(isset($_POST["submit"])){
  $cusID=$_SESSION["cusid"];
  $sql="SELECT * from customer where cusID='$cusID';";
  $currentPass=$_POST["currentPassword"];
  $newPassword=$_POST["newPassword"];
  $confirmPassword=$_POST["confirmPassword"];
  $result = mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result) ;
  $rowcuspwd=$row["cusPwd"];
  if(empty($currentPass) || empty($newPassword) || empty($confirmPassword)){
    header("location: ../change_password.php?error=emptyfield");
    exit();
  }
  else if(!password_verify($currentPass,$rowcuspwd)){
    header("location: ../change_password.php?error=wrongpassword");
    exit();
}
  else if($newPassword !== $confirmPassword){
    header("location: ../change_password.php?error=matchpassword");
    exit();
  }
  else{
    $newhashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);
    $newsql="UPDATE customer SET cusPwd='$newhashedPwd' WHERE cusID='$cusID';";
    mysqli_query($conn,$newsql);
    header("location: ../changepw-successful.php");
  }
}
?>