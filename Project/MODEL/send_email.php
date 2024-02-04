<?php

$email_from = "mdmaksud.bd20@gmail.com";


if(empty($email_to) OR empty($email_subject) OR empty($email_message)){
	die("Email sending format is invalid. Please check to, subject or message.");
}

$headers = "From: $email_from" . "\r\n" .
    "Reply-To: $email_from" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$isSuccess = mail($email_to, $email_subject, $email_message, $headers);
if($isSuccess){
	echo "Email sent successfully!";
}
else{
	echo "Failed to send email.";
}