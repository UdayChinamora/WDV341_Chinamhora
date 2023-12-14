<?php
require_once '../phpmailer/src/PHPMailer.php';
require_once '../phpmailer/src/SMTP.php';
require_once '../phpmailer/src/Exception.php';
require_once '../recaptcha/src/autoload.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'uchinamhora@gmail.com';
$mail->Password = 'rqpg yjyk atuc jihu';
//$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer/PHPMailer/PHPMailer::ENCRYPTION_STARTTLS
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$mail->setFrom($email,$name );
$mail->addAddress('uchinamhora@gmail.com', 'Recipient Name');

$mail->Subject = 'Test Email';
$mail->Body = $message;

// Verify reCAPTCHA
$recaptcha = new \ReCaptcha\ReCaptcha('6LfdDS4pAAAAAGejS-q_54Hra1GGZe5MgTwBBtPI');
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
