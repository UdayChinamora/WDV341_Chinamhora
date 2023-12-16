
<?php 

require '..\Database\dbConnect.php';
echo'<br><br>';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create a SELECT statement that will pull one row/event from your wdv341_events table.
// Use SQL WHERE clause to limit the result set to one, and prepare your statement before execution.

//$sql = "SELECT * FROM wdv341_events WHERE events_id = :eventNumber";
//$eventNumber = 2;
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':eventNumber', $eventNumber, PDO::PARAM_INT);
//$stmt->execute();
//$result = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events WHERE events_id = :id LIMIT 1";

// Hard code the event number for testing purposes
$id = 2;
$stmt = $conn->prepare($sql);
// Bind the event number parameter
$stmt->bindParam(':id', $id);

$stmt->execute();

// Format the result into a PHP associative array by setting the PDO fetch style.
$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Object</title>

	<script type="text/javascript">


// Create a Class called Event and give it a property for every column in your wpdv341_events table (excluding the date_inserted/update columns).
<?php  

class Event {
    public $events_id;
    public $events_name;
    public $events_description;
    public $events_presenter;
    public $events_date;
    public $events_time;

    // You can make the properties public so they can be mutated on the fly
    // You can make the properties private and create public getters and setters to let users modify their values
}
?>

     </script>
<style type="text/css">
	#container{
		border: 1px solid black; 
		padding: 10px;
		background-color: lightsteelblue;
		width: 800px;
		text-align: center;
	}
</style>
</head>

<body>
	<head><h2>WDV341</h2></head>
	<h1>9-1: PHP-JSON Event Object</h1>

<?php


// Create a PHP object called $outputObj and assign it to be an instance of the Event class.
$outputObj = new Event();

// Assign a value to each property of your $outputObj instance based on the row you pulled from yoru DataBase (DB).
$outputObj->events_id = $result['events_id'];
$outputObj->events_name = $result['events_name'];
$outputObj->events_description = $result['events_description'];
$outputObj->events_presenter = $result['events_presenter'];
$outputObj->events_date = $result['events_date'];
$outputObj->events_time = $result['events_time'];

// Encode the $outputObj into a JSON object using json_encode
$json = json_encode($outputObj);

// Echo the JSON object
echo 'JSON Object : '.$json;


// Decode the JSON object into a PHP associative array using json_decode
$data = json_decode($json, true);

// Create an HTML container to display the data
echo '<div id="container">';

// Loop through each key-value pair in the array and display it
foreach ($data as $key => $value) {
    echo '<p>' . $key . ': ' . $value . '</p>';
}

// Close the HTML container
echo '</div>';

?>



</body>
</html>