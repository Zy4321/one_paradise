<?php
session_start();
if(!isset($_SESSION["adname"])){
    header("location:../index.php");
}
    $b_date =isset($_POST["date"])?$_POST["date"]:"";
    $slot_id = isset($_POST["time"])?$_POST["time"]:"";
    $m_type =isset($_POST["services"])?$_POST["services"]:"";
    $id=$_GET["id"];
    require 'dbh.php';
    require 'functions.php';
    if(emptyInput($b_date, $slot_id, $m_type)!==false){
        echo '<script>alert("Please fill in all the empty fill!"); window.location.href="../a_edit.php"</script>';
        exit();
    }else{
        update_booking($conn,$b_date,$slot_id,$m_type,$id);
        echo '<script>alert("Update successful!"); window.location.href="../dashboard.php?page=2"</script>';}