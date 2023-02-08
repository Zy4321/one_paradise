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
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Logo\Logo1.png" />
</head>

<body class="role-bg">
    <header>
        <div class="navwrapper">
            <div class="logo">
                <a href="index.php" class="logo-text">ONE PARADISE</a>
            </div>
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <ul class="navbar">
                <li><a href="index.php">HOME</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href='review.php'>REVIEW</a></li>
                <li id="r-login"><a href="user-login.php">LOG IN</a></li>
                <li><a href="user-signup.php">SIGN UP</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="content">
            <p class="content-p">CHOOSE A ROLE TO MANAGE YOUR APPOINTMENT</p>
            <div class="btn-wrapper">
                <button class="admin-btn" type="button" onclick="window.location.href='admin-login.php'">
                    ADMIN
                </button>
                <button class="user-btn" type="button" onclick="window.location.href='user-login.php'">
                    USER
                </button>
            </div>
        </div>
    </main>
</body>

</html>