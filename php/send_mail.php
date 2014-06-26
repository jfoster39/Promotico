<?php
include 'my_email.php';

// request data on form submit
$sName = $_REQUEST["name"];
$sEmail = $_REQUEST["email"];
$sMessage = $_REQUEST["message"];

$sFrom = $sName . " <" . $sEmail . ">";

$headers = 'From: ' . $sFrom . "\r\n" .
		   'Reply-To: ' . $sEmail . "\r\n" .
		   'X-Mailer: PHP/' . phpversion() . "\r\n";
 
// include sender IP and some other data in the message
$full_message = "IP: " . $_SERVER['REMOTE_ADDR'] . "\n\n" . 
				"E-mail: " . $sEmail . "\n\n" .
				"Message: " . $sMessage;			
$message = $full_message;
 
// remove the backslashes from form fields
$sName = stripslashes($sName); 
$message = stripslashes($message); 
 
// add a prefix in the subject line so that you know the email was sent from your web site
$subject = "Email from: ". $sName;
$sender = $sName;

// if every variable is set, send $message to $contact_email
if(isset($message) and isset($subject) and isset($sender)){
		mail($contact_email, $subject, $message, $headers);
}
?>