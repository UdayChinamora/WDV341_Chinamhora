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

  // Check if a user with the given credentials exists
  if ($user) {
    // Save the user's information in a session variable
    $_SESSION['user'] = $user;

    // Redirect the user to the welcome page
    header("location:eventsForm.php");
  } else {
    // Password is not valid, display an error message
    $password_err = "The password you entered was not valid.";
  }
} elseif (empty($username_err) && !empty($password_err)) {
  // Username does not exist, display an error message
  $username_err = "No account found with that username.";
} else {
  // Statement execution failed, display an error message
  echo "Oops! Something went wrong. Please try again later.";
}
   
  }



// Function to sanitize input data
function test_input($data) {
  $data = trim($data); // Remove extra space, tab, newline
  $data = stripslashes($data); // Remove backslashes (\)
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;
}



 
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    /* Add some style to the login form */
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
