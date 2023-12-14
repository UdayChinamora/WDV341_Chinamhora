
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
</script>
