<?php
session_start();
if(!isset($_SESSION["cusid"])){
    header("location:../index.php");
}
if(isset($_POST["submit"])){
    $b_date =isset($_POST["date"])?$_POST["date"]:"";
    $slot_id = isset($_POST["time"])?$_POST["time"]:"";
    $m_type =isset($_POST["services"])?$_POST["services"]:"";
    $cusid=$_SESSION["cusid"];
    $status=false;

    require 'dbh.php';
    require 'functions.php';

    if(emptyInput($b_date, $slot_id, $m_type) !== false){
        echo '<script>alert("Please fill in all the empty fill!"); window.location.href="../booking.php"</script>';
        exit();
    }
    if(check_booking($conn, $cusid,$b_date, $slot_id)==null){
        book($conn, $b_date, $slot_id, $m_type, $cusid);
    }else{
        echo '<script>alert("You already booked this session!"); window.location.href="../booking.php"</script>';
    }
}