<?php
session_start();
require "php-script/dbh.php";
$sql="SELECT * FROM customer WHERE cusid=?;";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../contact.php?error=sendfail");
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $_SESSION["cusid"] );
mysqli_stmt_execute($stmt);
$dataResult = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($dataResult);

mysqli_stmt_close($stmt);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navigation.css" />
    <link rel="stylesheet" href="contact-login.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>

<body class="background">
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
                <li><a href='about-us.php'>About</a></li>
                <li><a href='contact-login.php' id='contact-nav'>Contact</a></li>
            </ul>
        </nav>
        <a class='cta' href='php-script/logout-script.php'><button>Log Out</button></a>";
          }
          else{
            header("location: index.php");
          }
        ?>
    </header>
    <main>
        <div class="form-container">
            <h3 class="welcome-msg">Contact Us</h3>
            <form action="php-script/contact-login-script.php" method="POST">
            <input type="hidden" class="input-field" name="username" value='<?=$row["cusname"]?>' />
            <input type="hidden" class="input-field" name="email" value="myphp914@outlook.com" />
            <div class="input-container">
            <i class="fa-solid fa-book-open"></i>
            <input type="text" class="input-field" name="subject" placeholder="Subject"/>
            </div>
            <div class="input-container comment">
            <i class="fa-solid fa-comment"></i>
            <textarea type="text" class="input-field comment-field" name="msg" placeholder="Message"></textarea>
            </div>
            <button class="send-btn" type="submit" name="submit">Send</button>
            </form>
        </div>
    </main>
    <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyfield"){
                    echo '<script>alert("Please fill in the blanks!")</script>';
                }
                else if($_GET["error"] == "sendfail"){
                    echo '<script>alert("Something went wrong!")</script>';
                }
            }

            if(isset($_GET["success"])){
                echo '<script>alert("Your message has been sent!")</script>';
            }
        ?>
</body>

</html>