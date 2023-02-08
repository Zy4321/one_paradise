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
                <li><a href="user-login.php">LOG IN</a></li>
                <li id="signup"><a href="user-signup.php">SIGN UP</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="form-container">
            <h3 class="signup">Sign Up</h3>
            <form action="php-script/signup-script.php" method="post">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="name" placeholder="Username" />
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope-o"></i>
                    <input type="text" class="input-field" name="email" placeholder="Email" />
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" class="input-field" name="pwd" placeholder="Password" id="pwd-input" />
                    <span class="pwd-visibility" onclick="visibility()">
                        <i id="visible" class="fa fa-eye"></i>
                        <i id="hidden" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <button class="signup-btn" type="submit" name="submit">SIGN UP</button>
                <p class="redirect">
                    Already have an account?
                    <span><a href="user-login.php">Log in here</a></span>
                </p>
            </form>
            <div class="error-msg">
                <?php 
            if(isset($_GET["error"])){
              if($_GET["error"] == "emptyfield"){
                echo "<p>Please fill in all the empty fields!</p>";
              }
              else if($_GET["error"] == "invalidusername"){
                echo "<p>Please fill in a valid name!</p>";
              }
              else if($_GET["error"] == "invalidemail"){
                echo "<p>Please fill in a valid email!</p>";
              }
              else if($_GET["error"] == "usernametaken"){
                echo "<p>Username taken. Please choose a new username!</p>";
              }
              else if($_GET["error"] == "usernametooshort"){
                echo "<p>Username cannot be shorter than 2 letters!</p>";
              }
              else if($_GET["error"] == "stmtfailed"){
                echo "<p>Ops, Something went wrong!</p>";
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