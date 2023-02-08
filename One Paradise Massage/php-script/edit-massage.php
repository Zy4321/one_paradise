<?php
session_start();
require_once 'dbh.php';

$massage_n = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM massage_type where m_type='$massage_n';");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION["adname"])) {
    header("location: index.php");
}
?>
<h3 class="title">
   Edit: <?=$row['m_type']?>
</h3>

<div class="services">
    <form class="upload" action="update-massage.php" method="POST" enctype="multipart/form-data">
        <div class="text-field">
            <input type="hidden" name="m_type" value="<?=$row['m_type']?>"
            <p>Price(RM):</p>
            <input type="text" name="m_price" value="<?=$row['m_price']?>"
        </div>
        <div class="text-field">
            <p>Description:</p>
            <textarea type="text" name="m_desc" style='width:400px; height:200px; resize:none; overflow:auto; '><?=$row['m_desc']?></textarea>
        </div>
        <div class="text-field">
            <p>IMAGE:</p>
            <input type="file" name="fileUpload" id="fileUpload" value="<?=$row['m_type']?>"><br>
        </div>

        <div class="btn-container">
            <input class="upload-btn1" type="submit" name="submit">
            <input class="upload-btn2" type="reset">
            <input class="upload-btn2" type="submit" name="back" value="back">
        </div>
    </form>