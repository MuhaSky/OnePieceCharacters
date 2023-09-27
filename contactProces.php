<?php
if(!empty($_POST["send"])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userSubject = $_POST["userSubject"];
    $userMessage = $_POST["userMessage"];
    $toEmail = "serdarsaar2004@hotmail.com";
  
    $mailHeaders = "Name: " . $userName.
    "\r\nEmail: ". $userEmail .
    "\r\nMessage: " . $userMessage. "\r\n";

    if(mail($toEmail, $userName, $mailHeaders)) {
        $message = "Jouw email is succesvol verzonden!";
    }
}
header("Location: index.php");