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
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
 	<title></title>
    <style type="text/css">

          #header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
  }

    .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px auto;
            max-width: 960px;
        }
        
.card {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 10px;
            text-align: center;
            width: 1000px;
            border: 5px solid red;
        }
        .card img {
            height: 180px;
            margin-bottom: 10px;
            width: 280px;
        }
        .card h2 {
            font-size: 1.2em;
            margin: 0;
        }
        .card p {
            margin: 0;
            padding: 5px;
        }

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

    .uday{
background-color:red;
}
    </style>
 </head>
 <body>

<?php

//$stmt->setFetchMode(PDO::FETCH_ASSOC)

// Check if there are any rows returned
if ($stmt->rowCount() > 0) {
    // Loop through each row and display the details
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo" <header id='header'>";
        echo" <nav>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='aboutPizza.php'>About Us</a></li>
                <li><a href='register.php'>Register</a></li>
                <li><a href='login.php'>Login</a></li>
                <li><a href='contactPizza.php'>Contact</a></li>
            </ul>
        </nav>
        ";
        echo"<h3 class='productName'>{$row['pizza_name']}</h3>";
echo"</header>";

    echo"<div class='card-container'>";
  

        echo "<div class='card'>";
        
        
        echo "<p><img src='../images/".$row['pizza_image']."'/></p>";
       
        
        echo "<h3>{$row['pizza_name']}</h3>";
        echo "<p productDesc>{$row['pizza_description']}</p>";
        $amount = $row['price'];
        $formattedAmount = number_format($amount, 2, '.', ',');
        echo "<p>Price:  $ {$formattedAmount} </p>";

        echo "</div>";
         echo "</div>";
        

         echo"<br><br>";
     
       
    }
} else {
	 echo"<br><br>";
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