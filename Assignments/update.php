<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'wdv341_events');

// check if the form is submitted
if (isset($_POST['edit'])) {
  // get the form data


    $id = $row['events_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $presenter = $_POST['presenter'];
    $date = $_POST['date'];
    $time = $_POST['time'];


  // update the record in the database
    $sql = "UPDATE pizzas SET events_name,='$name', events_description='$description', events_presenter='$presenter', events_date='$date', events_time='$time' WHERE events_id='$id'";
    mysqli_query($db, $sql);
  
        // redirect 
  header('location:eventsForm.php');
    } 



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

  $id = $row['events_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $presenter = $_POST['presenter'];
    $date = $_POST['date'];
    $time = $_POST['time'];

echo "<form method='post' action='update.php'>";
echo "<input type='hidden' name='events_id' value='$id'>";
echo "<label for='name'>Event Name:</label>";
echo "<input type='text' name='name' id='name' value='$name'><br><br><br>";

echo "<label for='description'>Description:</label>";
echo"<textarea name='description' id='description'  rows='5' cols='60'>$description</textarea><br><br><br><br>";

echo "<label for='presenter'>Presenter:</label>";
echo"<textarea name='presenter' id='presenter'  rows='5' cols='60'>$presenter</textarea><br>";



echo "<label for='date'>Date:</label>";
echo "<input type='number' name='date' id='date' value='$date'><br><br><br>";

echo "<label for='time'>Time</label>";
echo "<input type='text' name='time' id='time' value='$time'><br><br><br>";


echo "<input type='submit' name='edit' value='Edit and Save'><br><br><br>";



echo "</form>";
 ?>


 

</body>
</html>