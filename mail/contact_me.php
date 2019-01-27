<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to  = 'info@cedarridgehighschool.ca' . ', ';  // This is where the form will send a message to.
$to .= 'donna@cedarridgehighschool.ca' . ', ';// multiple recipients
$to .= 'michelle@cedarridgehighschool.ca' . ', ';// multiple recipients
$to .= 'michelle@kmscrhs.ca' . ', ';// multiple recipients
$to .= 'kristina@kmscrhs.ca' . ', ';// multiple recipients
$to .= 'cbkrol@gmail.com';// webmaster for testing purposes

$email_subject = "Cedar Ridge | Contact Form Submission:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";


// To send Text (Plain) mail, the Content-type header must be set 

$headers = 'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n"; 

$headers = "From: noreply@cedarridgehighschool.ca\r\n"; // This is the email address the generated message will be from.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
