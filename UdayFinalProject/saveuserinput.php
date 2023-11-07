<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Pizza Form Handler</title>
  <script type="text/javascript">
            function redirectToAddPizzaPage() {
  window.location.href = "add.php";
  </script>
</head>
<body>
    <div class="w3-container w3-green">
  <p><h1 style='color:red;'>Message received</h1></p>
</div>

<?php

require 'dbConnectPizza.php';
echo"<br><br>";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user inputs
    $pizzaID = $_POST['pizzaID'];
     $pizzaName = $_POST['pizzaName'];
     $pizzaDescription= $_POST['pizzaDescription'];
     $toppings = $_POST['toppings'];
      $price = $_POST['price'];
     $pizzaImage = $_POST['pizzaImage'];

    // Insert the user inputs into the database
    $sql = "INSERT INTO pizzas (pizza_id,pizza_name,pizza_description, toppings, price,pizza_image) VALUES ($pizzaID,'$pizzaName', '$pizzaDescription', '$toppings', '$price','$pizzaImage')";

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
<div>
<button onclick="redirectToAddPizzaPage()">Back to Add Pizza</button>
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