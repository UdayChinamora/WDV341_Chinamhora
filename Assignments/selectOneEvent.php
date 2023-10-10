<?php
require '..\Database\dbConnect.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Create an SQL SELECT command in PDO using Prepared Statements
$sql = "SELECT * FROM wdv341_events WHERE events_id = :eventNumber";

// Hard code the event number for testing purposes
$eventNumber = 1;
$stmt = $conn->prepare($sql);

// Bind the event number parameter
$stmt->bindParam(':eventNumber', $eventNumber, PDO::PARAM_INT);

$stmt->execute();

//$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript"></script>
  <style type="text/css">
    


.event-table {
  width: 100%;
  border-collapse: collapse;
}

.event-table th,
.event-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.event-table th {
  background-color: #f2f2f2;
}





  </style>
  <title></title>
</head>
<body>
<h1>7-2: Create selectOneEvent</h1>


<?php 
// Check if the result is empty
if (!$result) {
  echo "No event found in the table.";
} else {
  // Display the record in a table-like format
  //echo "<table class='eventBlock'>";
    echo "<h2>Event Details</h2>";
  echo "<table class='event-table'>";
  echo "<tr ><th>Event ID</th> <th>Event Name</th>  <th>Presenter</th> <th>Description</th> <th>Time</th> <th>Date</th>  <th>Updated On</th>  </tr>";
  
  echo "<tr><td>".$result['events_id']."</td><td>".$result['events_name']."</td><td>".$result['events_presenter']."</td><td>".$result['events_description']."</td><td>".$result['events_time']."</td><td>".$result['events_date']."</td><td>".$result['events_date_updated']."</td></tr>";
 
  echo "</table>";
}

 ?>
 
</body>
</html>