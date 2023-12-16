<?php
require '..\Database\dbConnect.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT events_id,events_name,events_presenter,events_description,DATE_FORMAT(events_date, '%m/%d/%Y') AS formatted_date,events_time,events_date_updated FROM wdv341_events";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript"></script>
  <style type="text/css">
    
    .myColor{
      color:red;
    }

.eventBlock{
  width:500px;
  background-color: limegreen;
  padding: 5px ;
  border: 1px solid #ccc;
  margin-bottom: 20px;
}

.eventsDetails{
  display:flex;
  justify-content: space-between;
 
}





  </style>
  <title></title>
</head>
<body>
<?php
while($row = $stmt->fetch() ) {
  
echo"<section><!--Event display Area -->";

  echo"<div class='eventBlock'>";
   
    echo"<div>Event Name :".$row["events_name"]." </div>";
    
    echo"<div>Event Description :".$row["formatted_date"]."</div>";
    
   echo" <div >";
   echo"<div>Event Date  " .$row["formatted_date"]."</div>";
     echo" <div>Event Time " .$row["events_time"]."</div>";
      
    
    echo"</div>";
    echo"<div>Updated :".$row["events_date_updated"]."</div>";

 echo"</div>";
  

echo"</section> ";
}
?>
  <?php  

while($row = $stmt->fetch() ) {
echo"<p style='border:solid 1px black;width:50%;'>";
 echo "Events ID  : ".$row["events_id"]."&ensp;&ensp;&ensp;&ensp;" ."Events  Name :  ".$row["events_name"]."&ensp;&ensp;&ensp;&ensp;". "Presenter : ".$row["events_presenter"]. "<br>";
echo"</p>";
  }
?>
</body>
</html>