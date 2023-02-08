<?php 
    if(!isset($_SESSION["adname"])){
        header("location:../index.php");
    }
    require 'dbh.php';

    $result = mysqli_query($conn, "SELECT * FROM massage_type;");?>
    <table>
    <tr>
    <th>Massage Type</th>
    <th>Pricing</th>
    <th>Visible</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php 
    while($row = mysqli_fetch_array($result))
    {?>
    <tr>
    <td><?=$row['m_type']?></td>
    <td><?="RM " . $row['m_price']?></td>
    <?php 
    if($row['s']==0){?>
    <td><a style='color:green;'  class="s-hide-btn" href="php-script/visible-massage.php?id=<?=$row['m_type']?>&visible=<?=$row['s']?>" name="hide">Show</a></td>
    <?php }else{ ?>
    <td><a style='color:red;' class="s-hide-btn" href="php-script/visible-massage.php?id=<?=$row['m_type']?>&visible=<?=$row['s']?>" name="hide">Hide</a></td>
    <?php } ?>
    <td><a class="s-edit-btn" href="php-script/edit-massage.php?id=<?=$row['m_type']?>" name="edit" style='color: green;'>Edit</a></td>
   <td><a class="s-delete-btn" href="php-script/delete-massage.php?id=<?=$row['m_type']?>" name="delete" style='color: red;'>Delete</a> </td>
   </tr>
   <?php } ?>
   </table>
   <?php
    mysqli_close($conn);

?>