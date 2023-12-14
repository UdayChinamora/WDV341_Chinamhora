<?php
// Start a session and get the user input from the session variables
session_start();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$message = $_SESSION["message"];
// Destroy the session and clear the session variables
session_destroy();
$_SESSION = array();
// Display a thank you message with the user input
echo "<h1>Thank you for contacting us!</h1>";
echo "<p>We have received your message and will get back to you soon.</p>";
echo "<p>Here is a summary of your message:</p>";
echo "<ul>";
echo "<li>Name: $name</li>";
echo "<li>Email: $email</li>";
echo "<li>Message: $message</li>";
echo "</ul>";
echo "<p><a href='../index.php'>Return to home page</a></p>";
?>