
<?php
// Connect to the database
// Connect to the database
include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the honeypot field is empty
if ($_POST['honeypot'] == "") {
    // Get the event ID from the POST data
    $id = $_POST['id'];

    // Prepare a SQL statement to delete the event
    //$stmt = $conn->prepare("DELETE FROM wdv341_events WHERE events_id = ?");
    ///$stmt->bind_param("i", $id);

    // delete the record from the database
  $sql = "DELETE FROM wdv341_events WHERE events_id='$id'";
  //mysqli_query($db, $sql);
  $stmt = $conn->prepare($sql);

    // Execute the statement and check the result
    if ($stmt->execute()) {
        // Event deleted successfully
        $message = "Event deleted successfully.";
    } else {
        // Error deleting event
        $message = "Error deleting event: " . $stmt->error;
    }

    // Close the statement
   // $stmt->close();
} else {
    // The honeypot field is filled, so it is a spam
    $message = "Invalid request.";
}

// Redirect the user back to the events page with a message
header("Location: display-events.php?message=" . urlencode($message));
?>
