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
      color:red;
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
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contactPizza.php">Contact</a></li>
            </ul>
        </nav>
    </header>
<body>
    <h1>Pizza Order</h1>
    <div class="w3-container w3-green" style="border: 15px solid grey;text-align: center;">

    <?php 

require 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Query to pull all rows from the table and sort in descending order by product name
$sql = "SELECT * FROM pizzas ORDER BY pizza_name DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();



 ?>

    <?php
    //$row = mysqli_fetch_assoc ($stmt);
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the pizza name and tax rate from the form
        $pizzaName = $_POST['pizza_name'];
       $num_pizzas = $_POST['numberOfPizzas'];
        $taxRate = 0.1; // Assuming a tax rate of 10%

        // Define the prices for different pizzas
        $pizzaPrices = [
            "Taco Pizza" => 10,
            "Pepperoni" => 12,
            "Supreme" => 15,
            "Cheese" => 11
             
       ];

        // Check if the entered pizza name exists in the prices array
        if (array_key_exists($pizzaName, $pizzaPrices)) {
            // Calculate the price including tax
            $price = $pizzaPrices[$pizzaName];
            $totalPrice = ($price + ($price * $taxRate)) * $num_pizzas;

            // Display the order details
            echo "<p>Thank you for ordering the $pizzaName pizza!</p>";

        $formattedAmount = number_format($totalPrice, 2, '.', ',');
            echo "<p>The total price including tax is: $ {$formattedAmount} </p>";
            echo" <img src='https://th.bing.com/th/id/OIP.rstMQimkYhD3c3_Hb0jg7AHaEK?w=270&h=180&c=7&r=0&o=5&dpr=1.2&pid=1.7' alt='Image 2'>";
        } else {
            // Display an error message if the entered pizza name is not found
            echo "<p>Sorry, the entered pizza name is not available.</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <label for="pizza_name">Pizza Name:</label>
        <input type="text" name="pizza_name" id="pizza_name" required>
        <label for="numberOfPizzas">Pizza ID:</label>
    <input type="number" name="numberOfPizzas" id="numberOfPizzas" required><br><br>

        <button type="submit">Place Order</button>
    </form>


     <footer>
 <div class="w3-bar w3-black">
 
  <p>&copy; 2023 Pizza Paradise. All rights reserved. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <b style="color:red;">NOTE :  This is page is for educational purposes </b>
  </p>
</div>
</footer>
</body>
</html>