<?php
include 'my_email.php';

// change the text below for your Auto-Reply message:
$autoreply_subject = "Subscription auto-reply.";
$autoreply_message = "Thank You for Subscribing to our Newsletter!" . "\n\n" .
				     "Kind Regards";

// request data on form submit
$sEmail = $_REQUEST["subscribe-email"];
$headers = 'From: ' . $sEmail . "\r\n" .
		   'Reply-To: ' . $sEmail . "\r\n" .
		   'X-Mailer: PHP/' . phpversion() . "\r\n";
 
// include sender IP and some other data in the message
$subscribe_message = "New subscription request: " . "\n\n" .
				     "IP: " . $_SERVER['REMOTE_ADDR'] . "\n\n" .
				     "Email: " . $sEmail . "\n\n";
 
// subject line for the Email message with subscription request
$subject = "Subscribe request!";

// if variable is set, send $subscribe_message to $subscribe_email
if(isset($subscribe_message)){
		
		if(mail($subscribe_email, $subject, $subscribe_message, $headers)){
				
				// if mail successful, send auto-reply message to subscriber's email
				$autoreply_headers = 'From: ' . $subscribe_email . "\r\n" .
									 'Reply-To: ' . $subscribe_email . "\r\n" .
									 'X-Mailer: PHP/' . phpversion();
				mail($sEmail, $autoreply_subject, $autoreply_message, $autoreply_headers);
		}
}
?>