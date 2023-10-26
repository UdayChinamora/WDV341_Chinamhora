<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<title></title>
	<script type="text/javascript">
		
		function redirectToAddPizzaPage() {
  window.location.href = "add.php";
}
	</script>
</head>
<body>
	<?php  
require 'dbConnectPizza.php';
echo"<br><br>";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a user with the given credentials exists
    if ($user) {
        // Save the user's information in a session variable
        $_SESSION['user'] = $user;

        // Redirect the user to the addpizza page
        header("Location: add.php");
        exit();
    } else {
        // Invalid credentials, display an error message
         echo"<div>";
        echo "<p style='color:red'>Invalid username or password. Please try again.</p>";
        echo"<br><br>";
        echo" <img src ='https://th.bing.com/th/id/OIP.lbh3eb-7RpcUNx7wfwMmcAHaD4?pid=ImgDet&rs=1' style='margin-left:25%'>";
        echo"<div>";
        echo"<br><br>";
        echo "<button onclick='redirectToAddPizzaPage()' style='color:blue'>Back to Login</button>";
         echo"<br><br>";
    }
}
?>
 <footer>
     <div class="w3-bar w3-black">
 
  <p>&copy; 2023 Pizza Paradise. All rights reserved. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <b style="color:red;">NOTE :  This is page is for educational purposes </b>
  </p>
</div>

 </footer>
</body>
</html>