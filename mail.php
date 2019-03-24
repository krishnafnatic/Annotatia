<?php

session_start();
$email = $_SESSION['email'];
$first_name= $_SESSION['first_name'];
$hash= $_SESSION['hash'];
require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
    
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 587
   //$mail ->IsHTML(true);
   $mail ->Username = "xyz@its.edu.in";
   $mail ->Password = "xyz";
   $mail ->SetFrom("yourmail@gmail.com");
   $mail ->Subject = "Activate Your Account!";
   $mail ->Body = "Hello ".$first_name.",

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/project/verify.php?email=".$email."&hash=".$hash;;
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {	
       echo "Mail Not Sent";
   }
   else
   {header("location: profile.php"); 
       echo "Mail Sent";
   }

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
header("Location: profile.php");

 
?>