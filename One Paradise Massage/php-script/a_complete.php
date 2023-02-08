<?php
session_start();
if(!isset($_SESSION["adname"])){
    header("location:../index.php");
}
$id=$_GET["id"];
require 'dbh.php';
$sql="UPDATE booking SET progress=1 where b_id =? ;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"i", $id);
mysqli_stmt_execute($stmt);
header("location:../dashboard.php?page=2");
mysqli_stmt_close($stmt);
?>