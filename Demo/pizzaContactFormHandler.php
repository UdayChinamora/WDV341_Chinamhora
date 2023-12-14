<?php

require 'PHPMailerAutoload.php';
require_once 'Recaptcha.php';

if ( ! class_exists('Recaptcha') ) 
  die('Class Recaptcha not found') ; 

$recaptcha = $_POST['g-recaptcha-response'];

// Sanitize input
$name    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$recobj = new Recaptcha();
$response = $recobj->verifyResponse($recaptcha);

if( isset($response['success']) && $response['success'] != true )  {
  echo "An Error Occurred and Error code is :".$response['error-codes'];
}
else { 

  $mail = new PHPMailer;
  
  $mail->SMTPDebug = 3;                      // Enable verbose debug output
  
  $mail->isSMTP();                           // Set mailer to use SMTP
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";     // sets GMAIL as the SMTP server
  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "uchinamhora@gmail.com";           // GMAIL username
  $mail->Password   = "rqpg yjyk atuc jihu";                              
  
  $mail->setFrom($email,$name);
  $mail->addReplyTo($username, 'reply to');
  $mail->addAddress( $username, 'Uday Chinhamora');     // Add a recipient
  
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'New Lead' ;
  $mail->Body = <<<EOT
    <strong>Name:</strong> $name<br>
    <strong>Email:</strong> $email<br>
    <strong>Message:</strong>   $message
EOT;

  if(!$mail->send() ) {
      echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  } 
  
}