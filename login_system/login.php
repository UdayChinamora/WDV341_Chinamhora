<?php session_start(); 
$servername = "localhost";
$username = "root";//database username
$password = "";//database password
$databasename = "login_system";

if (isset($_POST['login'])) { 

// Connect to the database 
$mysqli = new mysqli($servername, $username ,$password,$databasename); 

// Check for errors 
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 

// Prepare and bind the SQL statement 
$stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?"); $stmt->bind_param("s", $username); 

// Get the form data 
$username = $_POST['username']; $password = $_POST['password']; 

// Execute the SQL statement 
$stmt->execute(); $stmt->store_result(); 

// Check if the user exists 
//if ($stmt->num_rows > 0) { 

// Bind the result to variables 
//$stmt->bind_result($id, $hashed_password); 

// Fetch the result 
//$stmt->fetch(); 

 $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a user with the given credentials exists
    if ($user) {
        // Save the user's information in a session variable
        $_SESSION['user'] = $user;

// Verify the password 
if (password_verify($password, $hashed_password)) { 

// Set the session variables 
$_SESSION['loggedin'] = true; $_SESSION['id'] = $id; $_SESSION['username'] = $username; 

// Redirect to the user's dashboard 
header("Location: dashboard.php"); 
echo "Success";
exit; 

} else 

{ 
	echo "Incorrect password!"; 
} 
} else { 
	echo "User not found!"; 
} 

// Close the connection 
$stmt->close(); $mysqli->close(); }
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form action="login.php" method="post">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="password">Password:</label> <input id="password" name="password" required="" type="password" />
  <input name="login" type="submit" value="Login" />
</form>
</body>
</html>