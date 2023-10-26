<?php 

require 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Query to pull all rows from the table and sort in descending order by product name
$sql = "SELECT * FROM pizzas ORDER BY pizza_name DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="pizzaStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
     <title>Uday Pizza Paradase</title>

</head>
<body>
     <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutPizza.php">About Us</a></li>
                <li><a href="userLoginForm.php">Login</a></li>
                <li><a href="contactPizza.php">Contact</a></li>
            </ul>
        </nav>
        <h1><b style="color:white;">Uday Pizza Paradise</b></h1>
        <p style="color:yellow;">"Delicious slices, endless smiles! We serve happiness, one slice at a time."</p>
    </header>
<form method="GET" action="search.php">
  <input type="text" name="pizza_name" placeholder="Search pizza by name">
  <button type="submit">Search</button>
</form>
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
    }
} else {
    echo "No products found.";
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