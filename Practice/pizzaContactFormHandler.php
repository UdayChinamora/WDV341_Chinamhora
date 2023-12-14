<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define a function to sanitize the user input
function sanitize($data) {
  // Trim any whitespace from the beginning and end of the data
  $data = trim($data);
  // Remove any slashes from the data
  $data = stripslashes($data);
  // Convert any special characters to HTML entities
  $data = htmlspecialchars($data);
  // Return the sanitized data
  return $data;
}

// Define variables to store the user input and the error messages
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = $recaptchaErr = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize and validate the name input
  if (empty($_POST["name"])) {
    // If the name input is empty, set the error message to "Name is required"
    $nameErr = "Name is required";
  } else {
    // If the name input is not empty, sanitize it and assign it to the name variable
    $name = sanitize($_POST["name"]);
  }

  // Sanitize and validate the email input
  if (empty($_POST["email"])) {
    // If the email input is empty, set the error message to "Email is required"
    $emailErr = "Email is required";
  } else {
    // If the email input is not empty, sanitize it and assign it to the email variable
    $email = sanitize($_POST["email"]);
    // Check if the email input is a valid email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // If the email input is not a valid email address, set the error message to "Invalid email format"
      $emailErr = "Invalid email format";
    }
  }

  // Sanitize and validate the message input
  if (empty($_POST["message"])) {
    // If the message input is empty, set the error message to "Message is required"
    $messageErr = "Message is required";
  } else {
    // If the message input is not empty, sanitize it and assign it to the message variable
    $message = sanitize($_POST["message"]);
  }

  // Verify the user's response to the reCAPTCHA challenge
  if (empty($_POST["g-recaptcha-response"])) {
    // If the reCAPTCHA response is empty, set the error message to "Please verify that you are not a robot"
    $recaptchaErr = "Please verify that you are not a robot";
  } else {
    // If the reCAPTCHA response is not empty, get the secret key and the user's response
    $secret = "6LfdDS4pAAAAAGejS-q_54Hra1GGZe5MgTwBBtPI";
    $response = $_POST["g-recaptcha-response"];
    // Send a POST request to the Google reCAPTCHA API with the secret key and the user's response
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
    // Decode the JSON response from the API
    #$data = json_decode($verify);
    try {
  // Try to decode the JSON string
  $data = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
  // Do something with the data
} catch (JsonException $e) {
  // Catch the exception and print the error message
  echo "JSON decode error: " . $e->getMessage();
}
    // Check if the reCAPTCHA response is valid
    if (!$data->success) {
      // If the reCAPTCHA response is not valid, set the error message to "Invalid reCAPTCHA response"
      $recaptchaErr = "Invalid reCAPTCHA response";
    }
  }

  // Check if there are no errors in the user input
  if ($nameErr == "" && $emailErr == "" && $messageErr == "" && $recaptchaErr == "") {
    // If there are no errors, start a session and store the user input in session variables
    session_start();
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["message"] = $message;
    // Send an email to the pizza shop with the user input
    $to = "uchinamhora@gmail.com"; // The email address of the pizza shop
    $subject = "New contact form submission"; // The subject of the email
    $body = "You have received a new message from $name ($email):\n\n$message"; // The body of the email
    $headers = "From: $email"; // The headers of the email
    // Add the -f option to set the envelope sender address
    $parameters = "-f$email";
    // Call the mail() function with the additional parameter
    mail($to, $subject, $body, $headers, $parameters);
    // Redirect the user to a thank you page
    header("Location: thank_you.php");
    exit();
  }
}
?>
