<?php
// Include PHPMailer library
//require_once  __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor//phpmailer/src/PHPMailer.php';
require_once '../phpmailer/src/SMTP.php';
require_once '../phpmailer/src/Exception.php';
require_once  __DIR__ . '/vendor/autoload.php';

// Define variables and initialize with empty values
$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  // Validate email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Validate subject
  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  // Validate message
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }

  // Check if there are no errors before sending email
  if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // Set mailer to use SMTP
    $mail->isSMTP();
    // Specify main and backup SMTP servers
    $mail->Host = 'smtp.gmail.com';
    // Enable SMTP authentication
    $mail->SMTPAuth = true;
    // SMTP username
    $mail->Username = 'samscot061@gmail.com';
    // SMTP password
    $mail->Password = 'tfnx dvqt lgox fwzj';
    // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPSecure = 'ssl';
    // TCP port to connect to
    $mail->Port = 465;

    // Set the sender's email address and name
    $mail->setFrom('samscot061@gmail.com','User');
    // Set the recipient's email address and name
    $mail->addAddress('uchinamhora@gmail.com', 'Uchi Namhora');
    // Set the email subject
    $mail->Subject = $subject;
    // Set the email body
    $mail->Body = $message;

    // Send the email and check for errors
    if ($mail->send()) {
      echo "Your message has been sent successfully.";
    } else {
      echo "There was an error sending your message: " . $mail->ErrorInfo;
    }
  }
}

// Function to sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html>
<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <style>
    .error {
      color: red;
      float: right;
    }
  </style>
</head>
<body>
  <h1>Contact Us</h1>
  <p>Please fill in this form and we will get back to you as soon as possible.</p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
    </p>
    <p>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
    </p>
    <p>
      <label for="subject">Subject:</label>
      <input type="text" id="subject" name="subject" value="<?php echo $subject;?>">
      <span class="error">* <?php echo $subjectErr;?></span>
    </p>
    <p>
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" cols="40"><?php echo $message;?></textarea>
      <span class="error">* <?php echo $messageErr;?></span>
    </p>
    <p>
   
      <div class="g-recaptcha" data-sitekey="6Lc5cS8pAAAAAHnjFYzAupw1_vNEC1b8rd4PjnNb"></div>
      
    </p>
    <p>
      <input type="submit" name="submit" value="Submit">
    </p>
  </form>
</body>
</html>
