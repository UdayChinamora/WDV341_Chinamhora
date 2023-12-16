<?php
// Include the config file
require_once "dbConnectPizza.php";

// Start a session
session_start();

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter your username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }


// Check if the username and password are empty
if (empty($username_err) && empty($password_err)) {
  // Prepare a SQL statement to select the user from the database
  $sql = "SELECT * FROM event_user WHERE event_user_name = '$username' AND event_user_password = '$password'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Check if a user  exists
  if ($user) {
    // Save the user's information in a session variable
    $_SESSION['user'] = $user;

    
    header("location:eventsForm.php");
  } else {
    // Password is not valid, display an error
    $password_err = "The password you entered was not valid.";
  }
} elseif (empty($username_err) && !empty($password_err)) {
  // Username does not exist, display an error 
  $username_err = "No account found with that username.";
} else {
  echo "Oops! Something went wrong. Please try again later.";
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
<html lang="en">
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <title>Login</title>
  <style>
  
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .wrapper {
      width: 360px;
      padding: 20px;
      margin: auto;
    }

    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        <span class="error"><?php echo $username_err; ?></span>
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <span class="error"><?php echo $password_err; ?></span>
      </div>
      <div>
        <button type="submit">Login</button>
      </div>
      <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
  </div>
</body>
</html>
