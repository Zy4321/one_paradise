<?php
session_start();
if(!isset($_SESSION["adname"])){
    header("location:../index.php");
}
require 'dbh.php';
$id=$_GET["id"];
$sql="DELETE FROM BOOKING WHERE b_id=? ";
$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i",$id);
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Delete successful!'); window.location.href='../dashboard.php?page=2'</script>"; 
    }

    mysqli_stmt_close($stmt);
?>