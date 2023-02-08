<?php 
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $message = $_POST["msg"];
        $subject = $_POST["subject"];

        $mail = "From: $email";

        if(empty($username) || empty($email) || empty($subject) || empty($message)){
            header("location: ../contact.php?error=emptyfield");
        }
        else {
            $to = "myphp914@outlook.com";

            if(mail($to, $subject, $message, $mail)){
                header("location: ../contact-login.php?success");
            }
            else {
                header("location: ../contact.php?error=sendfail");
            }
        }
    }
    else {
        header("location: ../contact.php");
    }
?>