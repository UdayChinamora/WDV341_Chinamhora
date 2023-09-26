<?php
$servername = "localhost";
$username = "uday";//database username
$password = "masahwira123$";//database password
$databasename = "wdv341_events";


// Create connection
try{
$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
$conn-> setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
echo "<h1>Name : Uday Chinhamora</h1>";
echo "Database Connected Successfully";
echo date('Y-m-d H:i:s');
}
catch(PDOException $e){
  echo"Connection failed: " .$e->getMessage();
}
?>
