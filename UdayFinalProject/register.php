<?php if (isset($_POST['register'])) { 

// Connect to the database 
$mysqli = new mysqli("localhost", "root", "", "wdv341_events"); 

// Check for errors 
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 

// Prepare and bind the SQL statement 
$stmt = $mysqli->prepare("INSERT INTO my_users (username, email, password) VALUES (?, ?, ?)"); $stmt->bind_param("sss", $username, $email, $password); 

// Get the form data 
$username = $_POST['username']; $email = $_POST['email']; $password = $_POST['password']; 

// Hash the password 
$password = password_hash($password, PASSWORD_DEFAULT); 

// Execute the SQL statement 
if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; } 

// Close the connection 
$stmt->close(); $mysqli->close(); }

?>






<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Contact Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    h1 {
      color: #333;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color:yellow;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

        .image-container img {
    display: inline-block;
    width: 47.35% ;
    background-color: green;
    border-radius: 242px;
}
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    color: red;
    height:50px;
    padding-top:20px ;
}

nav ul li {
    display: inline;
    margin-right: 10px;
     color: red;
}

nav ul li a {
     color: red;
    text-decoration: none;
}
    
  </style>
</head>
<header>
       <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutPizza.php">About Us</a></li>
                <li><a href="userLoginForm.php">Login</a></li>
                <li><a href="contactPizza.php">Contact</a></li>
            </ul>
        </nav>
  

<body>
  <div class="w3-container w3-green" style="border: 15px solid grey;text-align: center;">
  <p><h1>Register Admin </h1></p>
</div>



<br><br>
<form action="register.php" method="post">
  <label for="username">Username:</label> 
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="register" type="submit" value="Register" />
</form>
<br><br>

<div class="image-container">
    
    <img src="https://th.bing.com/th/id/OIP.rstMQimkYhD3c3_Hb0jg7AHaEK?w=270&h=180&c=7&r=0&o=5&dpr=1.2&pid=1.7" alt="Image 2">
   
</div>

 <footer>
 <div class="w3-bar w3-black">
 
  <p>&copy; 2023 Pizza Paradise. All rights reserved. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <b style="color:red;">NOTE :  This is page is for educational purposes </b>
  </p>
</div>
</footer>

</body>
</html>