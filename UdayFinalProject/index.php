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
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
     <title>Gabby's Pizza Paradise</title>

</head>
<body>
        <!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
  <h3 class="w3-bar-item"> Watch Ads</h3>
  <iframe width="400" height="562" src="https://www.youtube.com/embed/Y6MHE0-CQAs?autoplay=1&mute=1" title="Pizza HD" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  <iframe width="400" height="562" src="https://www.youtube.com/embed/CYPLmrJjxOM?autoplay=1&mute=1"autoplay=1 title="Domino&#39;s Pizza Commercial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
<iframe width="400" height="562" src="https://www.youtube.com/embed/N-WeTJukLcM?autoplay=1&mute=1"autoplay=1 title="Cook Different | Gozney" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
<iframe width="400" height="562" src="https://www.youtube.com/embed/Y6MHE0-CQAs?autoplay=1&mute=1"autoplay=1 title="Pizza HD" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

<!-- Page Content -->
<div style="margin-left:20%">
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
        <h1><b style="color:white;">Gabby's Pizza Paradise</b></h1>
        <p style="color:yellow;">"Delicious  slices, endless smiles! We serve happiness, one slice at a time."</p>
    </header>
    <br>  <br>
<form method="GET" action="search.php">
  <input type="text" name="pizza_name" placeholder="Search pizza by name">
  <button type="submit">Search</button>
</form>

 <form method="GET" action="order.php">
        <label for="pizza_name">Pizza Name:</label>
        <input type="text" name="pizza_name" id="pizza_name" required>

        <button type="submit">Place Order</button>
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
        echo"<button><a href='order.php'>Order</a></button>";


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