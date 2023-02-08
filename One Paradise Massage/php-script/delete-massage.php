<?php 
require_once 'dbh.php';
$m_type=$_GET["id"];
if(isset($_POST["YES"])){
    mysqli_query($conn,"DELETE FROM booking WHERE m_type='$m_type';");
    mysqli_query($conn,"DELETE FROM massage_type WHERE m_type='$m_type';");
    echo "<script>alert('$m_type was deleted! '); window.location.href='../dashboard.php?page=4'</script>";    
    }else if(isset($_POST["NO"])){
    echo "<script>alert('bye bye!! '); window.location.href='../dashboard.php?page=4'</script>";    
    }
?>
<h2>ARE YOU SURE YOU WANT TO DELETE<span style="color:red;"> <?=$m_type?>??</span></h2>
<h3>you will lost customer's booking detail who selected this <span style="color:red;"> <?=$m_type?>!! massage type</span></h3>
<br>
<form action="delete-massage.php?id=<?=$m_type?>" method="POST">
<button type="submit" name="YES" style="width:100px; height:50px; font-size:20px; ">YES</button>
&emsp;&emsp;&emsp;
<button type="submit" name="NO"style="width:100px; height:50px; font-size:20px;">NO</button>
</form>
