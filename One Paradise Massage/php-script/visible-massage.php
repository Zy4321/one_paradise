
<?php
session_start();
require_once 'dbh.php';
$m_type=$_GET['id'];

if($_GET["visible"]==0){
mysqli_query($conn,"UPDATE massage_type SET s='1' WHERE m_type='$m_type';");
echo "<script>alert('$m_type hide now! '); window.location.href='../dashboard.php?page=4'</script>";
}if($_GET["visible"]==1){
mysqli_query($conn,"UPDATE massage_type SET s='0' WHERE m_type='$m_type';");
echo "<script>alert('$m_type show now! '); window.location.href='../dashboard.php?page=4'</script>";
}
?>