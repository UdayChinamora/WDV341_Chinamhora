<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// check if the form is submitted
if (isset($_POST['edit'])) {
  // get the form data
   $id = $_POST['events_id'];
    $name = $_POST['events_name'];
    $description = $_POST['events_description'];
    $presenter = $_POST['events_presenter'];
    $date = $_POST['events_date'];
    $time = $_POST['events_time'];


  // update  the database
    $sql = "UPDATE wdv341_events SET `events_name`='$name', `events_description`='$description', `events_presenter`='$presenter', `events_date`='$date', `events_time`='$time' WHERE events_id=$id";
   $stmt = $conn->prepare($sql);

    // Execute the statement and check the result
    if ($stmt->execute()) {
        // Event updated successfully
             
  header('location:eventsForm.php');
    } else {
        // Error deleting event
        echo"Error updating event: " . $stmt->error;
    }
  
  
    } 



// Check if the events_id key is set in the $_GET array
if (isset($_GET['events_id'])) {
  // Get the events_id value from the $_GET array
  $id = $_GET['events_id'];
  // query the database for the current values of the event
  $sql = "SELECT * FROM wdv341_events  WHERE events_id ='$id'";
  //$result = mysqli_query($db, $sql);
  //$row = mysqli_fetch_assoc($result);
  $result = $conn->query($sql);

  // Check if the query returned any row
  if ($result->rowCount() > 0) {
    // Fetch the row as an associative array
    $row = $result->fetch(PDO::FETCH_ASSOC);
    // Assign the event data to variables
    $name = $row['events_name'];
    $description = $row['events_description'];
    $presenter = $row['events_presenter'];
    $date = $row['events_date'];
    $time = $row['events_time'];
  } else {
    // No event found with the given id
    echo "No event found with id $id";
    exit;
  }
} else {
  // Handle the case when the events_id key is not set
  echo "No events_id parameter provided.";
  exit;
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="wdv341.php">Assignments</a></li>
               <li><a href="login.php">Admin Login</a></li>
              
            </ul>
        </nav>
  
<header>
<body>
  <div class="w3-container w3-green" style="border: 15px solid grey;text-align: center;">
  <p><h1> <?php  echo"$name"?></h1></p>
</div>

  

  <?php 
   // display the form with the current values of the event

  echo "<form method='post' action='update.php'>";
echo "<input type='hidden' name='events_id' value='$id'>";
echo "<label for='events_name'>Events Name:</label>";
echo "<input type='text' name='events_name' id='events_name' value='$name'><br><br><br>";

echo "<label for='events_description'>Description:</label>";
echo"<textarea name='events_description' id='events_description'  rows='5' cols='60'>$description</textarea><br><br><br><br>";

echo "<label for='events_presenter'>Presenter:</label>";
echo"<textarea name='events_presenter' id='events_presenter'  rows='5' cols='60'>$presenter</textarea><br>";



echo "<label for='events_date'>Date:</label>";
echo "<input type='date' name='events_date' id='events_date' value='$date'><br><br><br>";

echo "<label for='events_time'>Time</label>";
echo "<input type='time' name='events_time' id='events_time' value='$time'><br><br><br>";


echo "<input type='submit' name='edit' value='Edit and Save'><br><br><br>";



echo "</form>";
 ?>


 

</body>
</html>