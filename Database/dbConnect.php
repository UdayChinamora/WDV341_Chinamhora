<?php
$servername = "localhost";
$username = "root";//database username
$password = "";//database password
$databasename = "wdv341_events";


// Create connection
try{
$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
$conn-> setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);

echo "<h>Name : Uday Chinhamora</h></br>";
echo "Database Connected Successfully </br>";
echo "Date/Time  : " . date('Y-m-d H:i:s');
}
catch(PDOException $e){
  echo"Connection failed: " .$e->getMessage();
}




?>
