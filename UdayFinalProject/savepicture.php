<?php 
// Check if the form was submitted 
if(isset($_POST[“submit”])) 
    { 
    // Check if the file was uploaded without errors 

        if(isset($_FILES[“picture”]) && $_FILES[“picture”][“error”] == 0) { 
        // Get the file name 

        $filename = $_FILES[“picture”][“name”]; 
        // Get the file extension 

        $ext = pathinfo($filename, PATHINFO_EXTENSION); 
        // Validate the file type 

        if($ext == “jpg” || $ext == “png” || $ext == “gif”) { 
        // Specify the folder where the file will be stored 

            $folder = “images/”;
             // Move the file to the folder 

            move_uploaded_file($_FILES[“picture”][“tmp_name”], $folder . $filename); 
            // Connect to the database 

            $conn = mysqli_connect(“localhost”, “username”, “password”, “database”); 

            // Check the connection 

            if(!$conn) { die("Connection failed: " . mysqli_connect_error()); }

             // Insert the file name into the pizzas table 

            $sql = “INSERT INTO pizzas (image_name) VALUES (‘$filename’)”; 

            // Execute the query 
            if(mysqli_query($conn, $sql)) { echo “Picture uploaded and stored successfully.”; } 

            else { echo "Error: " . mysqli_error($conn); } 
            // Close the connection 
            mysqli_close($conn); } else { echo “Invalid file type. Only jpg, png, and gif files are allowed.”; } } else { echo "Error: " . $_FILES[“picture”][“error”]; } } ?>
