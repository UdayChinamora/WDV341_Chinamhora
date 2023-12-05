



<?php

require '..\Database\dbConnect.php';
echo"<br><br>";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user inputs
     // Get the user inputs
    $UserName= $_POST['username'];
     $Email = $_POST['email'];
     $Password= $_POST['password'];

    // Insert the user inputs into the database
  $sql = "INSERT INTO users (username, email, password) VALUES ($UserName, $Email,$Password)";

$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    // Query executed successfully
    echo "Pizza added successfully! <br>";
      
} else {
    // Error executing the query
    echo "Error adding pizza: " . $stmt->errorInfo()[2];
}
}

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
  <form action="register.php" method="post">
  <label for="username">Username:</label> 
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="register" type="submit" value="Register" />
</form>

</body>
</html>