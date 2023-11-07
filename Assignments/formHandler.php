<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $honeypot = $_POST["honeypot"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $schoolName = $_POST['school_name'];
  $academicStanding = $_POST['academicStanding'];
  $selectedMajor = $_POST['selected_Major'];
  $email = $_POST["email"];
  $comments = $_POST['comments'];
  if (!empty($_POST['honeypot'])) {

  echo "Error: Unauthorized access detected.";
  exit;
}
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
    echo nl2br("<h1 style=color:red;>Thank you for registering !!!</h1>");

echo nl2br("Thank you $first_name $last_name.\n\n");


 echo nl2br("A signup confirmation has been sent to <u style='color:blue;'>$email:</u> Thank you for your support!.\n\n");
echo nl2br("Thank you for your interest in $schoolName.\n\n");
echo nl2br("We have you listed as an $academicStanding starting this fall.\n\n");
echo nl2br("You have declared $selectedMajor as your major.\n\n");
echo nl2br("Based upon your responses, we will provide the following information in our confirmation email to you at <u style='color:blue;'>$email:</u>\n");

if(isset($_POST['contactInfo'])){
    echo nl2br("Please contact me with program information\n");
}

if(isset($_POST['programAdvisor'])){
    echo nl2br("I would like to contact a program advisor\n");
}

echo nl2br("\nYou have shared the following comments which we will review:\n");
echo "$comments\n";
}
  }

