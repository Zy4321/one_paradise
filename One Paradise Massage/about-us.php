<?php 
  session_start();
?>

<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body class="about">
    <header>
        <div class="Logo"><a href="navigation.php" class="logo-text">ONE PARADISE</a></div>
        <?php 
          if(isset($_SESSION["cusname"])){
            echo "<nav>
            <ul class='nav_links'>
                <li><a href='booking.php'>Reservation</a></li>
                <li><a href='profile.php'>Profile</a></li>
                <li><a href='history.php'>History</a></li>
                <li><a href='m_services.php'>Services</a></li>
                <li><a href='review.php' >Review</a></li>
                <li><a href='mail.php'>Feedback</a></li>
                <li><a href='about-us.php' id='about'>About</a></li>
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
        <div class="about-container1">
            <img src="https://letsrelaxspa.com/wp-content/uploads/2022/01/aromas-used-for-massages-2-scaled.jpg"
                alt="image">
            <div class="about-text1">
                <h1>ABOUT US</h1>
                <div class="about-line"></div>
                <p>
                    One Paradise Massage is a place for you to have a rest and relax. We provide massage services with
                    the best quality that you can found in Malaysia. We also have massage therapist from different
                    countries such as Japan, Thailand and Sweden.
                </p>
                <p>
                    Feel free to drop any further inquiries to know us more by further contacting us.
                </p>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-twitter"></a>
                <p></p>
                <button class="about-contactbtn" onclick="window.location.href='contact-login.php'">CONTACT US</button>
            </div>
        </div>
</body>

</html>