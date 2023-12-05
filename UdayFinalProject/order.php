<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order</title>
</head>
<body>
    <h1>Pizza Order</h1>

    <?php 

require 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Query to pull all rows from the table and sort in descending order by product name
$sql = "SELECT * FROM pizzas ORDER BY pizza_name DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();



 ?>

    <?php
    $row = mysqli_fetch_assoc ($stmt);
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
            "Supreme" => 15
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
            echo"$num_pizzas";
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
</body>
</html>