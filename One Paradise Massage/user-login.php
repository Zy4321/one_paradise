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

<body class="login-bg">
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
                <li id="login"><a href="user-login.php">LOG IN</a></li>
                <li><a href="user-signup.php">SIGN UP</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="form-container">
            <h3 class="welcome-msg">Welcome to <span>One Paradise</span></h3>
            <form action="php-script/login-script.php" method="post">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="name" placeholder="Username/Email" />
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" class="input-field" name="pwd" placeholder="Password" id="pwd-input" />
                    <span class="pwd-visibility" onclick="visibility()">
                        <i id="visible" class="fa fa-eye"></i>
                        <i id="hidden" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="register">
                    <a href="user-signup.php">Register Now</a>
                    <a href="reset-pwd.php">Forgot Password?</a>
                </div>
                <button class="login-btn" type="submit" name="submit">LOGIN</button>
            </form>
            <div class="error-msg">
                <?php 
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyfield"){
                            echo "<p>Please fill in all the empty fields!</p>";
                        }
                        else if($_GET["error"] == "loginerror"){
                            echo "<p>Incorrect login details!</p>";
                        }
                        else if($_GET["error"] == "wrongpassword"){
                            echo "<p>Incorrect login details!</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </main>

    <script>
    function visibility() {
        var click = document.getElementById("pwd-input");
        var eyeOpen = document.getElementById("visible");
        var eyeClose = document.getElementById("hidden");

        if (click.type === "password") {
            click.type = "text";
            eyeOpen.style.display = "block";
            eyeClose.style.display = "none";
        } else {
            click.type = "password";
            eyeOpen.style.display = "none";
            eyeClose.style.display = "block";
        }
    }
    </script>
</body>

</html>