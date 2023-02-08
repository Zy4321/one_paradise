<?php
session_start();
require_once 'php-script/dbh.php';
$id=$_GET["id"]??"";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>One Paradise Massage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>
<?php
   if(!isset($_SESSION["adname"])){
    header("location: index.php");
   }
 ?>

<body class="booking-bg">
<a class="back-btn" href="dashboard.php?page=2">Cancel</a>
    <div class="form-container booking">
        <h3 class="welcome-msg"><span>Edit Reservation for BookingID:<?=$id?></span></h3>
        <div class="booking-form">
            <form action="php-script/update-booking-script.php?id=<?=$id?>" method="POST">
                <div class="container-left">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                    <input type="date" class="textField selectDate" name="date" min="<?=date("Y-m-d")?>">
                </div>
                <div class="container-right">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <select class="textField time" name="time">
                    <option disabled selected value>Select a time</option>
                    <?php
                    $sql="SELECT * FROM session ;";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_assoc($result)){?>       
                        <option value="<?=$row["slot_id"]?>"><?=$row["start_time"]?>-<?=$row["end_time"]?></option>
                    <?php
                    }
                }
                    ?>
                    </select>
                    <i class="fa fa-bed" aria-hidden="true"></i>
                    <select class="textField service" name="services">
                        <option disabled selected value>Select a massage type</option>
                        <?php
                        $sql="SELECT * FROM massage_type;";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_assoc($result)) {
                         if($row["s"]==0){ ?>       
                        <option value="<?=$row["m_type"]?>"><?=$row["m_type"]?></option>
                    <?php
                    }}
                }?>
                    </select>
                </div>
                <button class="submit-form" type="submit" name="submit">UPDATE</button>
            </form>
            <div class="error-msg">
            </div>
        </div>
    </div>
</body>

</html>