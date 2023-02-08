<?php 
    if(!isset($_SESSION["adname"])){
        header("location:../index.php");
    }
    require 'dbh.php';

    $result = mysqli_query($conn, "SELECT cusID, cusName, cusEmail FROM customer;");?>
    
<table>
    <tr>
    <th>Customer ID</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Delete</th>
    </tr>
    <?php 
    while($row = mysqli_fetch_array($result))
    {?>
<tr>
    <td><?=$row['cusID']?></td>
    <td><?=$row['cusName']?></td>
    <td><?=$row['cusEmail']?></td>
    <td><button class='delete-btn2'><a href="php-script/c_delete.php?id=<?=$row['cusID']?>" name='delete'>Delete</a></button></td>
    </tr>
    <?php } ?>
   </table>
   <?php
    mysqli_close($conn);
?>
