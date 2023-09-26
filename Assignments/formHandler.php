<?php 

 $firstName = $_POST['first_name'];
 $lastName = $_POST['last_name'];
$academicStanding = $_POST['academicStanding'];
$selectedMajor = $_POST['selectedMajor'];
$emailAddress = $_POST['customerEmail'];
$comments = $_POST['comments'];



 ?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>

<script type="text/javascript">
	body {
  background-color: lightblue;
}
	
#container{
	background-color:red;
}

</script>

</head>

<body>
<h1 style=color:red;>Thank you for registering !!!</h1>
<h2></h2>

<?php




echo nl2br("Dear $firstName,\n\n");
echo nl2br("Thank you for your interest in DMACC.\n\n");
echo nl2br("We have you listed as an $academicStanding starting this fall.\n\n");
echo nl2br("You have declared $selectedMajor as your major.\n\n");
echo nl2br("Based upon your responses, we will provide the following information in our confirmation email to you at <u style='color:blue;'>$emailAddress:</u>\n");
if(isset($_POST['contactInfo'])){
    echo nl2br("Please contact me with program information\n");
}

if(isset($_POST['programAdvisor'])){
    echo nl2br("I would like to contact a program advisor\n");
}

echo nl2br("\nYou have shared the following comments which we will review:\n");
echo "$comments\n";

?>


</body>
</html>
