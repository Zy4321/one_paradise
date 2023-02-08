<?php 
session_start();
include 'php-script/dbh.php';



if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$comment = $_POST['comment']; // Get Comment from form
	$cusid = $_SESSION['cusid'];
	$sql = "INSERT INTO feedback (comment, cusID)
			VALUES ('$comment','$cusid')";

	$yay = mysqli_query($conn, $sql);
	if ($yay) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="icon" href="Logo\Logo1.png" />
	<link rel="stylesheet" type="text/css" href="mail.css"/>
	<link rel="stylesheet" href="style.css" />

</head>
<body>
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
				<li><a href='mail.php' id='feedback'>Feedback</a></li>
                <li><a href='about-us.php'>About</a></li>
                <li><a href='contact-login.php'>Contact</a></li>
            </ul>
        </nav>
        <a class='cta' href='php-script/logout-script.php'><button>Log Out</button></a>";
          }
          else{
            header("location: navigation.php");
          }
		  	$cusid = $_SESSION["cusid"];
			$sql = mysqli_query($conn,"SELECT * FROM customer WHERE cusID = '$cusid'");
			$cus = mysqli_fetch_assoc($sql);

        ?>
    </header>
	<div class="container">
	<div class="wrapper">
		<form action="mail.php" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" value="<?=$cus["cusName"]?>" disabled>
				</div>
				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" value="<?=$cus['cusEmail']?>" disabled>
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Feedback</label>
				<textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Post Comment</button>
			</div>
		</form>
		<div class="prev-comments">
			<?php 
			
			$sql = "SELECT feedback.comment,customer.cusName,customer.cusEmail FROM feedback INNER JOIN customer ON feedback.cusID = customer.cusID;";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['cusName']; ?></h4>
				<a href="mailto:<?php echo $row['cusEmail']; ?>"><?php echo $row['cusEmail']; ?></a>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
	</div>
	
</body>
</html>