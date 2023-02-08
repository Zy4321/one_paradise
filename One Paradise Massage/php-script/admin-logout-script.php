<?php
session_start();
unset($_SESSION["adname"]);

header("location: ../index.php");
exit();