<?php 
  session_start();

  require_once "php-script/dbh.php";
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
    <link rel="stylesheet" href="navigation.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>

<body class="booking-bg">
    <header class="b-header">
        <div class="Logo"><a href="navigation.php" class="logo-text">ONE PARADISE</a></div>
        <?php 
          if(isset($_SESSION["cusname"])){
            echo "<nav>
            <ul class='nav_links'>
                <li><a href='booking.php' id='reserve'>Reservation</a></li>
                <li><a href='profile.php'>Profile</a></li>
                <li><a href='history.php'>History</a></li>
                <li><a href='m_services.php'>Services</a></li>
                <li><a href='review.php' >Review</a></li>
                <li><a href='mail.php'>Feedback</a></li>
                <li><a href='about-us.php'>About</a></li>
                <li><a href='contact-login.php'>Contact</a></li>
            </ul>
        </nav>
        <a class='cta' href='php-script/logout-script.php'><button>Log Out</button></a>";
          }
          else{
            header("location: index.php");
          }
        ?>
    </header>
    <div class="form-container booking">
        <h3 class="welcome-msg"><span>Reservation</span></h3>
        <div class="booking-form">
            <form action="php-script/submit-booking-script.php" method="POST">
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
                        $sql="SELECT * FROM massage_type ;";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_assoc($result)) { 
                            if($row["s"]==0){?>       
                        <option value="<?=$row["m_type"]?>"><?=$row["m_type"]?></option>
                    <?php
                        }}}
                ?>
                    </select>
                </div>
                <button class="submit-form" type="submit" name="submit">Book</button>
            </form>
            <div class="error-msg">
                <?php 
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyfield"){
                            echo '<script>alert("Please fill in all the empty fill!")</script>';
                        }if($_GET["error"] == "booked"){
                            echo '<script>alert("You already booked the current session")</script>';
                        }   
                     }
                    else if(isset($_GET["success"])){
                        echo '<script>alert("booking successful")</script>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>