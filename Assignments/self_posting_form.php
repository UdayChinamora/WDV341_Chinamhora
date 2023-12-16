<?php
// Create connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wdv341_events";

// Create connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Initialize form variables
$events_name = "";
$events_description = "";
$events_presenter = "";
$events_date = "";
$events_time = "";
$events_date_inserted = "";
$events_date_updated = "";
$honeypot = "";

// Initialize error variables
$events_name_error = "";
$events_description_error = "";
$events_presenter_error = "";
$events_date_error = "";
$events_time_error = "";
$events_date_inserted_error = "";
$events_date_updated_error = "";
$honeypot_error = "";

// Initialize confirmation variable
$confirmation = "";

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate events name
  if (empty($_POST["events_name"])) {
    $events_name_error = "Please enter a name for the event.";
  } else {
    $events_name = test_input($_POST["events_name"]);
  }

  // Validate events description
  if (empty($_POST["events_description"])) {
    $events_description_error = "Please enter a description for the event.";
  } else {
    $events_description = test_input($_POST["events_description"]);
  }

  // Validate events presenter
  if (empty($_POST["events_presenter"])) {
    $events_presenter_error = "Please enter a presenter for the event.";
  } else {
    $events_presenter = test_input($_POST["events_presenter"]);
  }

  // Validate events date
  if (empty($_POST["events_date"])) {
    $events_date_error = "Please enter a date for the event.";
  } else {
    $events_date = test_input($_POST["events_date"]);
  }

  // Validate events time
  if (empty($_POST["events_time"])) {
    $events_time_error = "Please enter a time for the event.";
  } else {
    $events_time = test_input($_POST["events_time"]);
  }

  // Validate events date inserted
  if (empty($_POST["events_date_inserted"])) {
    $events_date_inserted_error = "Please enter a date inserted for the event.";
  } else {
    $events_date_inserted = test_input($_POST["events_date_inserted"]);
  }

  // Validate events date updated
  if (empty($_POST["events_date_updated"])) {
    $events_date_updated_error = "Please enter a date updated for the event.";
  } else {
    $events_date_updated = test_input($_POST["events_date_updated"]);
  }

  // Validate honeypot
  if (!empty($_POST["honeypot"])) {
    $honeypot_error = "You are a bot!";
  } else {
    $honeypot = test_input($_POST["honeypot"]);
  }

  // Check for errors before inserting into database
  if ($events_name_error == "" && $events_description_error == "" && $events_presenter_error == "" && $events_date_error == "" && $events_time_error == "" && $events_date_inserted_error == "" && $events_date_updated_error == "" && $honeypot_error == "") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $events_name, $events_description, $events_presenter, $events_date, $events_time, $events_date_inserted, $events_date_updated);

    // Execute the statement
    if ($stmt->execute()) {
      $confirmation = "New record created successfully";
    } else {
      $confirmation = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
  }

  // Close the connection
  $conn->close();
}

// Function to sanitize input data
function test_input($data) {
  $data = trim($data); // Remove extra space, tab, newline
  $data = stripslashes($data); // Remove backslashes (\)
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Self Posting Form</title>
</head>
<body>
  <h1>Self Posting Form</h1>
  <p>Please fill in the form below to insert data into the events table.</p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="events_name">Events Name:</label>
    <input type="text" id="events_name" name="events_name" value="<?php echo $events_name;?>">
    <span style="color:red;"><?php echo $events_name_error;?></span>
    <br><br>
    <label for="events_description">Events Description:</label>
    <textarea id="events_description" name="events_description" rows="4" cols="50"><?php echo $events_description;?></textarea>
    <span style="color:red;"><?php echo $events_description_error;?></span>
    <br><br>
    <label for="events_presenter">Events Presenter:</label>
    <input type="text" id="events_presenter" name="events_presenter" value="<?php echo $events_presenter;?>">
    <span style="color:red;"><?php echo $events_presenter_error;?></span>
    <br><br>
    <label for="events_date">Events Date:</label>
    <input type="date" id="events_date" name="events_date" value="<?php echo $events_date;?>">
    <span style="color:red;"><?php echo $events_date_error;?></span>
    <br><br>
    <label for="events_time">Events Time:</label>
    <input type="time" id="events_time" name="events_time" value="<?php echo $events_time;?>">
    <span style="color:red;"><?php echo $events_time_error;?></span>
    <br><br>
    <label for="events_date_inserted">Events Date Inserted:</label>
    <input type="date" id="events_date_inserted" name="events_date_inserted" value="<?php echo $events_date_inserted;?>">
    <span style="color:red;"><?php echo $events_date_inserted_error;?></span>
    <br><br>
    <label for="events_date_updated">Events Date Updated:</label>
    <input type="date" id="events_date_updated" name="events_date_updated" value="<?php echo $events_date_updated;?>">
    <span style="color:red;"><?php echo $events_date_updated_error;?></span>
    <br><br>
    <input type="hidden" id="honeypot" name="honeypot" value="<?php echo $honeypot;?>">
    <span style="color:red;"><?php echo $honeypot_error;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>
  <p><?php echo $confirmation;?></p>
</body>
</html>
