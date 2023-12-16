<?php
$servername = "localhost";
$username = "root";//database username
$password = "";//database password
$databasename = "wdv341_events";


// Create connection
try{
$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
$conn-> setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);

echo "@uday";

}
catch(PDOException $e){
  echo"Connection failed: " .$e->getMessage();
}




?>
