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
    <link rel="stylesheet" href="contact.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>

<body class="contact-bg">
    <header>
        <div class="navwrapper">
            <div class="logo">
                <a href="index.php" class="logo-text">ONE PARADISE</a>
            </div>
            <ul class="navbar">
                <li><a href="index.php">HOME</a></li>
                <li id="contact"><a href='contact.php'>CONTACT</a></li>
                <li><a href='review.php'>REVIEW</a></li>
                <li><a href='role-login.php'>LOGIN</a></li>
                <li><a href="user-signup.php">SIGN UP</a></li>
            </ul>
        </div>
    </header>
    <main>
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
        <div class="form-container">
            <h3 class="welcome-msg">Contact Us</h3>
            <form action="php-script/contact-script.php" method="POST">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="username" placeholder="Name"/>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" class="input-field" name="email" placeholder="Email"/>
                </div>
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
</body>

</html>