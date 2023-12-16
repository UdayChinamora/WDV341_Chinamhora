<?php
require '..\Database\dbConnect.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT events_id,events_name,events_presenter FROM wdv341_events";
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
  </style>
  <title></title>
</head>
<body>
  <?php  

while($row = $stmt->fetch() ) {
echo"<p style='border:solid 1px black;width:50%;'>";
 echo "Events ID  : ".$row["events_id"]."&ensp;&ensp;&ensp;&ensp;" ."Events  Name :  ".$row["events_name"]."&ensp;&ensp;&ensp;&ensp;". "Presenter : ".$row["events_presenter"]. "<br>";
echo"</p>";
  }
?>

</body>
</html>