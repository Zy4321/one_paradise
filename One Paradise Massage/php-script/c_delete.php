<?php
session_start();
require 'dbh.php';
$id=$_GET["id"];
$result=mysqli_query($conn,"SELECT * FROM customer where cusID='$id';");
$cus=mysqli_fetch_assoc($result);
$cusname = $cus['cusName'];
if(isset($_POST["YES"])){
    mysqli_query($conn,"DELETE FROM booking WHERE cusID='$id';");
    mysqli_query($conn,"DELETE FROM customer WHERE cusID='$id';");
    echo "<script>alert(' $cusname is deleted! '); window.location.href='../dashboard.php?page=3'</script>";    
    }else if(isset($_POST["NO"])){
    echo "<script>alert('BYE BYE!! '); window.location.href='../dashboard.php?page=3'</script>" ;   
    }

?>
<h2>ARE YOU SURE YOU WANT TO DELETE customer <span style="color:red;"> <?=$cusname?> ??</span></h2>
<h3>you will lost <span style="color:red;"> <?=$cusname?>!! </span> booking detail!!</h3>
<br>
<form action="c_delete.php?id=<?=$id?>" method="POST">
<button type="submit" name="YES" style="width:100px; height:50px; font-size:20px; cursor:pointer;">YES</button>
&emsp;&emsp;&emsp;
<button type="submit" name="NO"style="width:100px; height:50px; font-size:20px; cursor:pointer;">NO</button>
</form>
