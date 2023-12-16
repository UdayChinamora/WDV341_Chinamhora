
<?php
// Include the db-connect.php file to connect to the database
include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $presenter = $_POST['presenter'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Get the current date
    $current_date = date('Y-m-d');

    // Check if the honeypot field is empty
    if ($_POST['honeypot'] == "") {
        // Prepare a SQL statement to insert the data into the table
        $stmt = $conn->prepare("INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $presenter);
        $stmt->bindParam(4, $date);
        $stmt->bindParam(5, $time);
        $stmt->bindParam(6, $current_date);
        $stmt->bindParam(7, $current_date);

        // Execute the statement and check the result
        if ($stmt->execute()) {
            // Data inserted successfully
            $message = "Event added successfully.";
        } else {
            // Error inserting data
            $message = "Error adding event: " . $stmt->error;
        }

        // Close the statement
       // $stmt->close();
    } else {
        // The honeypot field is filled, so it is a spam
        $message = "Invalid request.";
    }
}
?>

<html>
<head>
    <title>Events Form</title>
</head>
<body>
    <h1>Events Form</h1>
    <?php
    // Display the message if any
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </p>
        <p>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </p>
        <p>
            <label for="presenter">Presenter:</label>
            <input type="text" id="presenter" name="presenter" required>
        </p>
        <p>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </p>
        <p>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
        </p>
        <p>
            <input type="hidden" name="honeypot" value="">
            <input type="submit" name="submit" value="Add Event">
        </p>
    </form>


      <h2>List of Events</h2>
<?php
// Connect to the database
include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query the events table
$sql = "SELECT * FROM wdv341_events";
//$result = mysqli_query($conn, $sql);
$result = $conn->query($sql);
// Check if there are any events
//if (mysqli_num_rows($result) > 0) {
    // Display the events in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Presenter</th><th>Date</th><th>Time</th></tr>";
    //while ($row = mysqli_fetch_assoc($result)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Get the event data
        $id = $row['events_id'];
        $name = $row['events_name'];
        $description = $row['events_description'];
        $presenter = $row['events_presenter'];
        $date = $row['events_date'];
        $time = $row['events_time'];

        // Display the event data in a table row
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        echo "<td>$presenter</td>";
        echo "<td>$date</td>";
        echo "<td>$time</td>";

        // Create a delete button for each event
        // Use a hidden input field as a honeypot
        // Use a JavaScript function to confirm the deletion
        echo "<td>";
        echo "<form action='delete-event.php' method='POST'>";
        echo "<input type='hidden' name='honeypot' value=''>";
        echo "<input type='hidden' name='id' value='$id'>";
         echo "<button type='submit' onclick='return confirmDelete();'>Delete</button>";
        echo "</form>";
        echo "</td>";


           echo "<td>";
        echo "<form action='update.php' method='POST'>";
        echo "<input type='hidden' name='honeypot' value=''>";
        echo "<input type='hidden' name='id' value='$id'>";
         echo "<button type='submit' onclick='return confirmUpdate();'>Update</button>";
        echo "</form>";
        echo "</td>";
       




        echo "</tr>";
    }
    echo "</table>";

// Close the database connection
$conn = null;

?>

<script>
// Define a function to confirm the deletion
function confirmDelete() {
    // Check if the honeypot field is empty
    if (document.querySelector("input[name='honeypot']").value == "") {
        // Ask the user to confirm the deletion
        return confirm("Are you sure you want to delete this event?");
    } else {
        // The honeypot field is filled, so it is a spam
        return false;
    }
}

// Define a function to confirm the update
function confirmUpdate() {
    // Check if the honeypot field is empty
    if (document.querySelector("input[name='honeypot']").value == "") {
        // Ask the user to confirm the deletion
        return confirm("Are you sure you want to update this event?");
    } else {
        // The honeypot field is filled, so it is a spam
        return false;
    }
}

</script>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
