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
          <li><a href="user-signup.php">SIGN UP</a></li>
        </ul>
      </div>
    </header>
    <main>
      <div class="form-container">
        <h3 class="welcome-msg">Forgot Password</h3>
        <form action="php-script/resetpwdcorrect-script.php" method="post">
          <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input
              type="password"
              class="input-field"
              name="newpwd"
              placeholder="New Password"
              id="new-pwd-input"
            />
            <span class="pwd-visibility" onclick="new_visibility()">
              <i id="new_visible" class="fa fa-eye" style = "display:none"></i>
              <i id="new_hidden" class="fa fa-eye-slash" style = "display:block"></i>
            </span>
          </div>
          <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input
              type="password"
              class="input-field"
              name="confirmpwd"
              placeholder="Confirm Password"
              id="confirm-pwd-input"
            />
            <span class="pwd-visibility" onclick="confirm_visibility()">
              <i id="confirm_visible" class="fa fa-eye" style = "display:none"></i>
              <i id="confirm_hidden" class="fa fa-eye-slash" style = "display:block"></i>
            </span>
          </div>
          <div class="register">
            <a href="user-signup.php">Register Now</a>
            <a href="user-login.php">Login Now</a>
          </div>
          <button class="login-btn" type="submit" name="submit">Reset Password</button>
        </form>
        <div class="error-msg">
          <?php 
            if(isset($_GET["error"])){
              if($_GET["error"] == "emptyfield"){
                echo "<p>Please fill in all the empty fields!</p>";
              }
              else if($_GET["error"] == "notmatch"){
                echo "<p>Password does not match!</p>";
              }
            }
          ?>
        </div>
      </div>
    </main>
    <script>
      function new_visibility() {
        var click = document.getElementById("new-pwd-input");
        var eyeOpen = document.getElementById("new_visible");
        var eyeClose = document.getElementById("new_hidden");

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

      function confirm_visibility() {
        var click = document.getElementById("confirm-pwd-input");
        var eyeOpen = document.getElementById("confirm_visible");
        var eyeClose = document.getElementById("confirm_hidden");

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