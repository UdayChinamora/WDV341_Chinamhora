

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["event_user_name"];
  $password = $_POST["event_user_password"];

  $sql = "INSERT INTO event_user (event_user_name, event_user_password) VALUES ('$username', '$password')";

    $stmt = $conn->prepare($sql);

    // Execute the statement and check the result
    if ($stmt->execute()) {
        // Event updated successfully

  //if (mysqli_query($conn, $sql)) {
    $_SESSION["username"] = $username;
    header("Location: login.php");
  } else {
    echo "Error: ". $stmt->error;
  }
}
//mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    
    }

    h1 {
      color: #333;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
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
      background-color: blue;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

    
 nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

#pizza_description {
word-wrap: break-word;
 width:auto-fit; 
 height:fit-content;
  border: 1px solid #000000;
  word-wrap: break-word;
   text-align: justify;
  text-justify: inter-word;
 
 

}
#toppings{
 word-wrap: break-word;
 width:auto-fit; 
 height:fit-content;
  border: 1px solid #000000;
  word-wrap: break-word;
   text-align: justify;
  text-justify: inter-word;
 

}


    
  </style>
</head>
<header>
       <nav>
           <ul>
               
               <li><a href="login.php">Admin Login</a></li>
              
            </ul>
        </nav>
  
<header>

<head>



<body>
  <div class="container">
  <h2>Register</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <div class="form-group">
  <label for="event_user_name">Username:</label>
  <input type="text" class="form-control" id="event_user_name" name="event_user_name" required>
  </div>
  <div class="form-group">
  <label for="event_user_password">Password:</label>
  <input type="password" class="form-control" id="event_user_password" name="event_user_password" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  </form>
  <p>Already have an account? <a href="login.php" style="color:blue">Login here</a>.</p>
  </div>
</body>
</html>
