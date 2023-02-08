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
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navigation.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>
<body class="services">
    <header>
        <?php
        session_start();
        if (isset($_SESSION["cusname"])) {
            echo "
            <div class='Logo'><a href='navigation.php' class='logo-text'>ONE PARADISE</a></div>
            <nav> <ul class='nav_links'>
              <li><a href='booking.php'>Reservation</a></li>
              <li><a href='profile.php'>Profile</a></li>
              <li><a href='history.php'>History</a></li>
              <li><a href='m_services.php'>Services</a></li>
              <li><a href='review.php' id='review'>Review</a></li>
              <li><a href='mail.php'>Feedback</a></li>
              <li><a href='about-us.php'>About</a></li>
              <li><a href='contact-login.php'>Contact</a></li>
          </ul>
      </nav>
      <a class='cta' href='php-script/logout-script.php'><button>Log Out</button></a>";
        } else { ?>
                <div class="navwrapper">
                    <div class="logo">
                        <a href="index.php" class="logo-text">ONE PARADISE</a>
                    </div>
                    <input type="checkbox" id="checkbox_toggle" />
                    <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                    <ul class="navbar">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href='contact.php'>CONTACT</a></li>
                        <li><a href='review.php' id='review'>REVIEW</a></li>
                        <li><a href='role-login.php'>LOGIN</a></li>
                        <li><a href='user-signup.php'>SIGN UP</a></li>
                    </ul>
                </div>
            <?php } ?>
            </header>
            <div class="services-head">
                <h1>Services</h1>
                <div class="services-line"></div>
            </div>
            <div class="services-row">
                <?php

                require_once 'php-script/dbh.php';

                $sql = "SELECT feedback.comment,customer.cusName,customer.cusEmail FROM feedback INNER JOIN customer ON feedback.cusID = customer.cusID;";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="services-column" >
                        <div class="services-card" style="background-color:gray; opacity:0.75;">
                            <div class="services-container" style="background-color:gray; opacity:1;">
                                <h2><?= $row["cusName"] ?></h2>
                                <div class="services-card-line"></div>
                                <p class="paragraph" style="color:white ; font-size:20px; "><?= $row["comment"] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
</body>

</html>