<?php
require_once '../PHPMailer 6.8.1 source code/PHPMailer-PHPMailer-dd01c56/src/PHPMailer.php';
require_once '../PHPMailer 6.8.1 source code/PHPMailer-PHPMailer-dd01c56/src/SMTP.php';
require_once '../recaptcha-master/recaptcha-master/src/autoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'uchinamhora@gmail.com';
$mail->Password = 'rqpg yjyk atuc jihu';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$mail->setFrom($email, 'Your Name');
$mail->addAddress('uchinamhora@gmail.com', 'Recipient Name');

$mail->Subject = 'Test Email';
$mail->Body = $message;

// Verify reCAPTCHA
$recaptcha = new \ReCaptcha\ReCaptcha('6Le5dQIpAAAAAKQqCwObzVy5o4EN-7BYwI3j9lw3');
$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
if (!$resp->isSuccess()) {
    echo 'reCAPTCHA verification failed.';
    exit;
}

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>
