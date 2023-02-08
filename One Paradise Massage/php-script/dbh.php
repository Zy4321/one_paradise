<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dBName = "op_db";

$conn = mysqli_connect($serverName, $username, $password, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
