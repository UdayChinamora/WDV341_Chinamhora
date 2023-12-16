<?php
// Function to format timestamp into mm/dd/yyyy format
function formatTimestamp($timestamp) {
    return date("m/d/Y", $timestamp);
}


// Function to format timestamp into dd/mm/yyyy format
function formatInternationalTimestamp($timestamp) {
    return date("d/m/Y", $timestamp);
}


// Function to manipulate string
function manipulateString($input) {
    $length = strlen($input);
    $trimmed = trim($input);
    $lowercase = strtolower($input);
    $containsDMACC = stripos($input, "DMACC") !== false;

    return "Number of characters: $length </br> Trimmed string: $trimmed </br> Lowercase string: $lowercase </br> Contains DMACC: " . ($containsDMACC ? "Yes" : "No");
}


// Function to format number as phone number
function formatPhoneNumber($number) {
    return preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "($1) $2-$3", $number);
}


// Function to format number as US currency
function formatCurrency($number) {
    return "$" . number_format($number, 2);
}

?>


<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body class="w3-container">

<div class="w3-container w3-red">
  <p><h2>PHP Functions</h2></p>
</div>

<?php  
  $timestamp = time();
  $input = "Hello , DMACC!";
  $phoneNumber = "1234567890";
  $currency = 123456;
  
  echo"<div class='w3-row-padding w3-section w3-stretch'  style='align-items:center;'>";
  
  echo"<div class='w3-col s4' style='color:purple;widhth:20%;'>";
  echo "Formatted timestamp (mm/dd/yyyy): " . formatTimestamp($timestamp) . "</br>";
  echo "Formatted international timestamp (dd/mm/yyyy): " . formatInternationalTimestamp($timestamp) . "\n";
  echo"</div>";


  echo"<div class='w3-col s4' style='color:red;width:100%;'> ";
  echo manipulateString($input) . "</br>";
  echo"\n";
  echo"</div>";


  echo"<div class='w3-col s4' style='color:blue;width:100%;'>";
  echo "Unformatted Number: " . $phoneNumber . "</br>";
  echo "Formatted phone number: " . formatPhoneNumber($phoneNumber) . "</br>";
  echo"</div>";

  echo"<div class='w3-col s4' style='color:green;width: 100%;'>";
  echo"Currency:". $currency ."<br>";
  echo"Formatted currency:". formatCurrency($currency);
  echo"</div>";

  echo"</div>";
?>
<div class="w3-container w3-yellow">
  <p>@udaycCreatehinhamhora</p>
</div>

</body>
</html>
