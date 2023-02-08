<?php
session_start();
unset($_SESSION["cusname"]);

header("location: ../index.php");
exit();