<style>
.header{
    color: green;
    border:1px solid #000;
    background: #ccc;
    padding: 10px;

}




</style>

<?php


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'wdv341_events');


echo"<br>";
// include the css file
echo "<link rel='stylesheet' href='style.css'>";

// create a header with a title and links
echo "<div class='header'>";
echo "<h1>Lists of Pizzas</h1>";
echo "<ul class='nav'>";
echo "<li><a href='index.php'>Home</a></li>";
echo "<li><a href='aboutPizza.php'>About Us</a></li>";
echo "<li><a href='contact.php'>Contact</a></li>";
echo "</ul>";
echo "</div>";

// get all the pizzas from the database
$sql = "SELECT * FROM pizzas";
$result = mysqli_query($db, $sql);

// display the pizzas in a table
echo "<table>";
echo "<tr><th>Name</th> <th>Description</th> <th>Toppings</th><th>Price</th><th>Image</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  // get the id, name, price, and ingredients of each pizza
  $pizzaID = $row['pizza_id'];
  $pizzaName = $row['pizza_name'];
  $pizzaDescription = $row['pizza_description'];
  $toppings = $row['toppings'];
  $price = $row['price'];
  $pizzaImage = $row['pizza_image'];
  



  // create a link on the name of the pizza that will take you to the edit page
  

  echo "<tr><td><a href='edit.php?pizza_id=$pizzaID'> $pizzaName</a></td>
  <td>$pizzaDescription</td>
  <td> $toppings</td>
  <td>$price</td>
  <td>$pizzaImage</td>

</tr>";

  
}
echo "</table>";

echo"<br>";
echo"<br>";

?>
<input type='button' value='Add New Pizza' onclick="window.location.href='add.php'">