<?php
// require the database connection file
require 'dbConnectPizza.php';

// initialize variables for storing user input and error messages
$username = $password = "";
$usernameErr = $passwordErr = "";
$recaptchaErr = ""; // initialize the variable with an empty string


// check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validate the username field
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  // validate the password field
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  // validate the recaptcha field
  if (isset($_POST["g-recaptcha-response"])) {
    $recaptcha = $_POST["g-recaptcha-response"];
    if (!$recaptcha) {
      $recaptchaErr = "Please check the recaptcha box";
    } else {
      // verify the recaptcha response using Google API
      $secret = "6LfdDS4pAAAAAGejS-q_54Hra1GGZe5MgTwBBtPI"; // secret key
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
      $response = json_decode($response, true);
      if ($response["success"] == false) {
        $recaptchaErr = "Invalid recaptcha response";
      }
    }
  } else {
    $recaptchaErr = "Recaptcha is required";
  }

  // if there are no errors, proceed to login
  if ($usernameErr == "" && $passwordErr == "" && $recaptchaErr == "") {
    // prepare and bind the SQL statement
    $sql = "SELECT id, password FROM my_users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    //$stmt = mysqli_prepare($conn, $sql);
   // $stmt->bind_param("s", $username);
    $stmt->bindParam(1, $username, PDO::PARAM_STR);

    // execute the statement and fetch the result
    $stmt->execute();
    $result = $stmt->fetch();

    // check if the username exists in the database
    if ($result->num_rows > 0) {
      // fetch the user data as an associative array
      $user = $result->fetch_assoc();

      // verify the password using password_verify function
      if (password_verify($password, $user["password"])) {
        // password is correct, redirect to add.php
        header("Location: thank_you.php");
        exit();
      } else {
        // password is incorrect, display an error message
        $passwordErr = "Wrong password";
      }
    } else {
      // username does not exist, display an error message
      $usernameErr = "User not found";
    }

    // close the statement and the connection
    $stmt->close();
    $conn->close();
  }
}

// function to sanitize the user input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<head>
  <title>PHP Login Self Posting Form</title>
  <!-- include the recaptcha script -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <h2>PHP Login Self Posting Form</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="username" value="<?php echo $username;?>">
    <span style="color:red"><?php echo $usernameErr;?></span>
    <br><br>
    Password: <input type="password" name="password" value="<?php echo $password;?>">
    <span style="color:red"><?php echo $passwordErr;?></span>
    <br><br>
    <!-- include the recaptcha widget -->
    <div class="g-recaptcha" data-sitekey="6LfdDS4pAAAAAIURQT6PO-rT62Q9Pklju4aU68rq"></div> <!--  site key -->
    <span style="color:red"><?php echo $recaptchaErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
