<?php 

require 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pizzaName = $_GET['pizza_name'];

// Query to pull all rows from the table and sort in descending order by product name
$sql = "SELECT * FROM pizzas WHERE pizza_name LIKE '%$pizzaName%'";
$stmt = $conn->prepare($sql);
$stmt->execute();


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="pizzaStyle.css">
 	<title></title>
 </head>
 <body>
<?php

//$stmt->setFetchMode(PDO::FETCH_ASSOC)

// Check if there are any rows returned
if ($stmt->rowCount() > 0) {
    // Loop through each row and display the details
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='productBlock'>";
        
        echo"<div class='productImage'>";
        echo "<p><img src='../images/".$row['pizza_image']."'/></p>";
        echo"</div>";
        
        echo "<h3 class='productName'>{$row['pizza_name']}</h3>";
        echo "<p productDesc>{$row['pizza_description']}</p>";
        $amount = $row['price'];
        $formattedAmount = number_format($amount, 2, '.', ',');
        echo "<p productDesc>Price:  $ {$formattedAmount} </p>";

        echo "</div>";
        echo"<br><br>";
    }
} else {
	 echo"<br><br>";
    echo "No products found.";
}

?>
 </body>
 </html>