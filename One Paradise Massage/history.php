<?php
session_start();
require_once 'php-script/dbh.php';
require_once 'php-script/functions.php';
if(isset($_SESSION["cusname"])){
$cusID=$_SESSION["cusid"];
$cusName=$_SESSION["cusname"];
$sql = "SELECT booking.b_id, massage_type.m_type, booking.b_date, massage_type.m_price, session.start_time, session.end_time, booking.progress 
        FROM booking INNER JOIN massage_type ON massage_type.m_type = booking.m_type INNER JOIN session ON session.slot_id = booking.slot_id INNER JOIN customer ON customer.cusID=booking.cusID 
        WHERE booking.cusID='$cusID' 
        ORDER BY booking.b_date ASC, session.start_time ASC;";
$result=mysqli_query($conn, $sql);
}
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
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navigation.css" />
    <link rel="stylesheet" href="history.css">
    <link rel="icon" href="Logo\Logo1.png" />
    
  </head>
  <body class="history-bg">
<header>
        <div class="Logo"><a href="navigation.php" class="logo-text">ONE PARADISE</a></div>
        <?php 
          if(isset($_SESSION["cusname"])){
            echo "<nav>
            <ul class='nav_links'>
                <li><a href='booking.php'>Reservation</a></li>
                <li><a href='profile.php'>Profile</a></li>
                <li><a href='history.php' id='history'>History</a></li>
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
            header("location: navigation.php");
          }
        ?>
    </header>

    </div>
    <div class="wrapper">
      <div class="left">
      </div>
      <div class="right">
        <div class="info">
          <h3>History</h3>
          <div class="info_data">
            <div class="data">
              <h4>Booking ID</h4>
              <div class="left-title-line"></div>
              <?php
            while ($row = mysqli_fetch_assoc($result)){
              echo "<p>" . $row['b_id'] . "</p>";
              echo "<div class='left-line'></div>";}?>
            </div>
            <div class="data">
              <h4>Massage Type</h4>
              <div class="title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){ 
                echo "<p>" . $row['m_type'] . "</p>";
                echo "<div class='line'></div>";}?>
            </div>
            <div class="data">
              <h4>Booking Date</h4>
              <div class="title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
                echo "<p>" . $row['b_date'] . "</p>";
                echo "<div class='line'></div>";}?>
            </div>
            <div class="data">
              <h4>Start Time</h4>
              <div class="title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
                echo "<p>" . $row['start_time'] . "</p>";
                echo "<div class='line'></div>";}?>
            </div>
            <div class="data">
              <h4>End Time</h4>
              <div class="title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
                echo "<p>" . $row['end_time'] . "</p>";
                echo "<div class='line'></div>";}?>
            </div>
            <div class="data">
              <h4>Price</h4>
              <div class="title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
                echo "<p>RM " . $row['m_price'] . "</p>";
                echo "<div class='line'></div>";}?>
            </div>
            <div class="data">
              <h4>Status</h4>
              <div class="right-title-line"></div>
              <?php $result=mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
                echo "<p>" . ($row['progress'] ? 'Completed':'Ongoing') . "</p>";
                echo "<div class='right-line'></div>";}?>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>