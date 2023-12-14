<?php
require_once 'dbConnectPizza.php';

// Fetch data from the pizzas table
$query = "SELECT * FROM pizzas";
$result = $conn->query($query);

// Display the table
echo "<table>";
echo "<tr><th>Name</th><th>Description</th><th>Toppings</th><th>Price</th><th>Image</th></tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
      echo "<td><a href='edit.php?id=" . $row['pizza_id'] . "'>" . $row['pizza_name'] . "</a></td>";
    echo "<td>" . $row['pizza_description'] . "</td>";
    echo "<td>" . $row['toppings'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td><img src='../images/" . $row['pizza_image'] . "' alt='Pizza Image' width='100'></td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
$conn = null;
?>