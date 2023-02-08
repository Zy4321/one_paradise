<?php
session_start();
?>
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
    <link rel="stylesheet" href="navigation.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Logo\Logo1.png" />
    
  </head>
  <body class="login-bg">
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
      <div class="form-container">
        <h3 class="welcome-msg">Change Password</h3>
        <form name="changePwd" method="POST" action="php-script/changepw-script.php">
          <div class="input-container">
            <input
              type="password"
              class="input-field"
              name="currentPassword"
              placeholder="Current Password"
              id="currentPassword"
            />
            <span class="pwd-visibility" onclick="current_visibility()">
              <i id="current_visible" class="fa fa-eye" style = "display:none"></i>
              <i id="current_hidden" class="fa fa-eye-slash" style = "display:block"></i>
            </span>
          </div>
          <div class="input-container">
            <input
              type="password"
              class="input-field"
              name="newPassword"
              placeholder="New Password"
              id="newPassword"
            />
            <span class="pwd-visibility" onclick="new_visibility()">
              <i id="new_visible" class="fa fa-eye" style = "display:none"></i>
              <i id="new_hidden" class="fa fa-eye-slash" style = "display:block"></i>
            </span>
          </div>
		  <div class="input-container">
            <input
              type="password"
              class="input-field"
              name="confirmPassword"
              placeholder="Confirm Password"
              id="confirmPassword"
            />
            <span class="pwd-visibility" onclick="confirm_visibility()">
              <i id="confirm_visible" class="fa fa-eye" style = "display:none"></i>
              <i id="confirm_hidden" class="fa fa-eye-slash" style = "display:block"></i>
            </span>
          </div>
          <button class="login-btn" type="submit" name="submit">SUBMIT</button>
        </form>
        <div class="error-msg">
      <?php
      if(isset($_GET['error'])){
        if($_GET["error"] == "emptyfield"){
          echo "<p>Please fill in all the empty fields!</p>";
        }
        else if($_GET["error"] == "wrongpassword"){
          echo "<p>Incorrect old password</p>";
        }
        else if($_GET["error"] == "matchpassword"){
          echo "<p>New password and confirm password does not match</p>";
        }
      }
      ?>
        </div>
      </div>
      <script>
      function current_visibility() {
        var click = document.getElementById("currentPassword");
        var eyeOpen = document.getElementById("current_visible");
        var eyeClose = document.getElementById("current_hidden");
  
        if (click.type === "password") {
          click.type = "text";
          eyeOpen.style.display ="block";
          eyeClose.style.display ="none";
        } else {
          click.type = "password";
          eyeOpen.style.display = "none";
          eyeClose.style.display = "block";
        }
      }

      function new_visibility() {
        var click = document.getElementById("newPassword");
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
        var click = document.getElementById("confirmPassword");
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