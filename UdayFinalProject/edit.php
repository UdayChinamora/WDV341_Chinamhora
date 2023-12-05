<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'wdv341_events');

// check if the form is submitted
if (isset($_POST['edit'])) {
  // get the form data
  $pizzaID = $_POST['pizza_id'];
  $pizzaName = $_POST['pizza_name'];
  $pizzaDescription = $_POST['pizza_description'];
  $toppings = $_POST['toppings'];
  $price = $_POST['price'];
  $pizzaImage = $_POST['pizza_image'];


    // update the record in the database
    $sql = "UPDATE pizzas SET pizza_name='$pizzaName', pizza_description='$pizzaDescription', toppings='$toppings', price='$price', pizza_image='$pizzaImage' WHERE pizza_id='$pizzaID'";
    mysqli_query($db, $sql);
  
        // redirect to the index page
  header('location:successEdit.php');
    } 
// get the id of the pizza from the URL
// check if the delete button is clicked
if (isset($_POST['delete'])) {
  // get the pizza ID from the button value
  $pizzaID = $_POST['pizza_id'];
  // delete the record from the database
  $sql = "DELETE FROM pizzas WHERE pizza_id='$pizzaID'";
  mysqli_query($db, $sql);
  // redirect to the index page
  header('location:currentdetails.php');
}

$pizzaID = $_GET['pizza_id'];
 //$id = $_GET['pizza_id'];
// query the database for the current values of the pizza
$sql = "SELECT * FROM pizzas WHERE pizza_id ='$pizzaID'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
// get the name, price, and ingredients of the pizza

  $pizzaName = $row['pizza_name'];
  $pizzaDescription = $row['pizza_description'];
  $toppings = $row['toppings'];
  $price = $row['price'];
  $pizzaImage = $row['pizza_image'];


?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <title>Add Pizza Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      background-image: url("https://th.bing.com/th/id/R.8f562353dbaf42f2ba07077e6d53bc90?rik=Otf4I18HZFrbQQ&pid=ImgRaw&r=0");
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
                 <li><a href="index.php">Home</a></li>
                <li><a href="aboutPizza.php">About Us</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contactPizza.php">Contact</a></li>
            </ul>
        </nav>
  

<body>
  <div class="w3-container w3-green" style="border: 15px solid grey;text-align: center;">
  <p><h1> <?php  echo"$pizzaName"?></h1></p>
</div>

  

  <?php 
   // display the form with the current values of the pizza

echo "<form method='post' action='edit.php'>";
echo "<input type='hidden' name='pizza_id' value='$pizzaID'>";
echo "<label for='pizza_name'>Name:</label>";
echo "<input type='text' name='pizza_name' id='pizza_name' value='$pizzaName'><br><br><br>";

echo "<label for='pizza_description'>Description:</label>";
echo"<textarea name='pizza_description' id='pizza_description'  rows='5' cols='60'>$pizzaDescription</textarea><br><br><br><br>";

echo "<label for='toppings'>Toppings:</label>";
echo"<textarea name='toppings' id='toppings'  rows='5' cols='60'>$toppings</textarea><br>";



echo "<label for='price'>Price:</label>";
echo "<input type='number' name='price' id='price' value='$price'><br><br><br>";

echo "<label for='pizza_image'>Image:</label>";
echo "<input type='text' name='pizza_image' id='pizza_image' value='$pizzaImage'><br><br><br>";


echo "<input type='submit' name='edit' value='Edit and Save'><br><br><br>";

echo "<input type='submit' name='delete' value='Delete'>";

echo "</form>";
 ?>
  <div class="w3-container w3-green">
  <p><img src="https://th.bing.com/th/id/OIP.R-AOBfjWUoWDICzZbhiZKgHaFj?w=247&h=185&c=7&r=0&o=5&dpr=1.2&pid=1.7" alt="Uday Image" width="20%" height ="50%"></p>
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