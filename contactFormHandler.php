




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
    <div class="w3-container w3-green">
  <p><h1 style='color:red;'>Message received</h1></p>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // You can add your own code here to process the form data, such as sending an email

  // Display a thank you message
  

  echo" <img src='https://th.bing.com/th/id/OIP.NEkd9kHqgBbDx0KbLimS-QHaFj?w=257&h=193&c=7&r=0&o=5&pid=1.7' alt='Thank you Image' width='20%'' height ='10%''>" ."<br>";

  echo "<h1>Thank you for contacting me, $name! I will get back to you soon.</h1>";
}
?>


</body>
</html>