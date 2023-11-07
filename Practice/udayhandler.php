<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];

  // Validate inputs
  if (empty($first_name)) {
    $errors["first_name"] = "Please enter your first name.";
  }
  // Add regex validation for first name
  elseif (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
    $errors["first_name"] = "First name should only contain alphabets.";
  }
  if (empty($last_name)) {
    $errors["last_name"] = "Please enter your last name.";
  }
  // Add regex validation for last name
  elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
    $errors["last_name"] = "Last name should only contain alphabets.";
  }
  if (empty($email)) {
    $errors["email"] = "Please enter your email.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Please enter a valid email address.";
  }

  // If there are errors, display them on the form
  if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $field => $error) {
      echo "<li>$error</li>";
      echo "<style>#$field { border: 1px solid red; }</style>";
    }
    echo "</ul>";
  } else {
    // Form is valid, do something with the data (e.g., save to database)
    echo "Thank you for submitting the form, $first_name!";
  }
}


