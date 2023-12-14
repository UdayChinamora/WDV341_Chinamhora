
<?php

// Connect to the database
include_once 'dbConnectPizza.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the honeypot field is empty
if ($_POST['honeypot'] == "") {
    // Get the event ID from the POST data
    $id = $_POST['id'];

   
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
    // The honeypot field is filled
    $message = "Invalid request.";
}

// Redirect the user back to the events page 
header("Location: display-events.php?message=" . urlencode($message));
?>
