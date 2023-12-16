<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include the config file
require "dbConnectPizza.php";

// Start a session
session_start();

// Check if the user is logged in, if not then redirect to the login page
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== true) {
  header("location: login.php");
  exit;
}

// Get the username from the session variable
$username = $_SESSION["username"];

// Define variables and initialize with empty values
$event_name = $event_description = $event_presenter = $event_date = $event_time = "";
$event_name_err = $event_description_err = $event_presenter_err = $event_date_err = $event_time_err = "";

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate event name
  if (empty(trim($_POST["event_name"]))) {
    $event_name_err = "Please enter an event name.";
  } else {
    $event_name = trim($_POST["event_name"]);
  }

  // Validate event description
  if (empty(trim($_POST["event_description"]))) {
    $event_description_err = "Please enter an event description.";
  } else {
    $event_description = trim($_POST["event_description"]);
  }

  // Validate event presenter
  if (empty(trim($_POST["event_presenter"]))) {
    $event_presenter_err = "Please enter an event presenter.";
  } else {
    $event_presenter = trim($_POST["event_presenter"]);
  }

  // Validate event date
  if (empty(trim($_POST["event_date"]))) {
    $event_date_err = "Please enter an event date.";
  } else {
    $event_date = trim($_POST["event_date"]);
  }

  // Validate event time
  if (empty(trim($_POST["event_time"]))) {
    $event_time_err = "Please enter an event time.";
  } else {
    $event_time = trim($_POST["event_time"]);
  }

  // Check the input errors before inserting into the database
  if (empty($event_name_err) && empty($event_description_err) && empty($event_presenter_err) && empty($event_date_err) && empty($event_time_err)) {
    // Prepare an insert statement
    $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
      // Bind the parameters to the statement
      $stmt->bind_param("sssss", $param_event_name, $param_event_description, $param_event_presenter, $param_event_date, $param_event_time);

      // Set the parameter values
      $param_event_name = $event_name;
      $param_event_description = $event_description;
      $param_event_presenter = $event_presenter;
      $param_event_date = $event_date;
      $param_event_time = $event_time;

      // Attempt to execute the statement
      if ($stmt->execute()) {
        // Event added successfully, display a success message
        echo "Event added successfully.";
      } else {
        // Statement execution failed, display an error message
        echo "Something went wrong. Please try again later.";
      }

      // Close the statement
      $stmt->close();
    }
  }

  // Close the connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <style>
    /* Add some style to the welcome page */
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .wrapper {
      width: 800px;
      margin: auto;
    }

    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
    }

    input[type=text], input[type=date], input[type=time] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .error {
      color: red;
    }

    a {
      color: blue;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h1>Welcome, <?php echo $username; ?></h1>
    <h2>Add New Event</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div>
        <label for="event_name">Event Name</label>
        <input type="text" name="event_name" id="event_name" value="<?php echo $event_name; ?>">
        <span class="error"><?php echo $event_name_err; ?></span>
      </div>
      <div>
        <label for="event_description">Event Description</label>
        <input type="text" name="event_description" id="event_description" value="<?php echo $event_description; ?>">
        <span class="error"><?php echo $event_description_err; ?></span>
      </div>
      <div>
        <label for="event_presenter">Event Presenter</label>
        <input type="text" name="event_presenter" id="event_presenter" value="<?php echo $event_presenter; ?>">
        <span class="error"><?php echo $event_presenter_err; ?></span>
      </div>
      <div>
        <label for="event_date">Event Date</label>
        <input type="date" name="event_date" id="event_date" value="<?php echo $event_date; ?>">
        <span class="error"><?php echo $event_date_err; ?></span>
      </div>
      <div>
        <label for="event_time">Event Time</label>
        <input type="time" name="event_time" id="event_time" value="<?php echo $event_time; ?>">
        <span class="error"><?php echo $event_time_err; ?></span>
      </div>
      <div>
        <button type="submit">Add Event</button>
      </div>
    </form>
    <h2>List of Events</h2>
    <table>
      <tr>
        <th>Event Name</th>
        <th>Event Description</th>
        <th>Event Presenter</th>
        <th>Event Date</th>
        <th>Event Time</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
      <?php
      // Include the config file
      require "dbConnectPizza.php";

      // Prepare a select statement
      $sql = "SELECT * FROM wdv341_events";

      if ($result = $conn->query($sql)) {
        // Check if there are any rows in the result
        if ($result->num_rows > 0) {
          // Fetch the data from each row as an associative array
          while ($row = $result->fetch_assoc()) {
            // Display the data in a table row
            echo "<tr>";
            echo "<td>" . $row["events_name"] . "</td>";
            echo "<td>" . $row["events_description"] . "</td>";
            echo "<td>" . $row["events_presenter"] . "</td>";
            echo "<td>" . $row["events_date"] . "</td>";
            echo "<td>" . $row["events_time"] . "</td>";
            echo "<td><a href=\"update.php?id=" . $row["events_id"] . "\">Update</a></td>";
            echo "<td><a href=\"delete.php?id=" . $row["events_id"] . "\">Delete</a></td>";
            echo "</tr>";
          }
        } else {
          // No rows found, display a message
          echo "<tr><td colspan=\"7\">No events found.</td></tr>";
        }
      } else {
        // Query execution failed, display an error message
        echo "<tr><td colspan=\"7\">Something went wrong. Please try again later.</td></tr>";
      }

      // Close the connection
      $conn->close();
      ?>
    </table>
    <p><a href="logout.php">Logout</a></p>
  </div>
</body>
</html>