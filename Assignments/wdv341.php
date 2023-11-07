<!DOCTYPE html>
<html>
<head>
    <title>Homework Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    
    <img src="../images/homework.jpg" alt="Homework Image">

<style type="text/css">

.grid-container {
  display: grid;
  height: 400px;
  align-content: center;
  grid-template-columns: auto auto auto;
  gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color:green;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-right: 10px;
   height: fit-content;
  transition: background-color 0.3s ease;
  font-size: small;
}
.h1{
    font-family: "Sofia", sans-serif;
    text-align: center;
    font-style:oblique ;
    font-weight: bold;
    color: rgba(255, 255, 255, 0.8);
}

</style>

</head>
<header>
       <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="wdv341.php">Assignments</a></li>
                <li><a href="selectEvents.php">Connect</a></li>
                <li><a href="../contactUs.php">Contact</a></li>
              
            </ul>
        </nav>
</header>

<body>


<div class="grid-container">
<h1 class="h1">Uday Chinhamora Homework Page!</h1>
        <div> <a href="../index.php" class="button">Home Page Assignment</a></div>
        <div>  <a href="git_terms.php" class="button">Git-related terms Assignment</a></div>
        <div> <a href="php_basics.php" class="button">PHP Basics Assignment</a></div>
        <div>  <a href="inputForm.php" class="button">5-1: HTML Form Processor</a></div>
        <div> <a href="PHP-Functions.php" class="button">4-1: PHP Functions</a></div>
        <div><a href="formartEvents.php" class="button">Format Events</a> </div>
        <div> <a href="selectOneEvent.php" class="button">7-2: Create selectOneEvent.php</a></div>
        <div><a href="selectOneEvent.php" class="button">7-2: Create selectOneEvent.php</a> </div>
        <div><a href="Php_Formated_Retail_Products.php" class="button">8-1: PHP Formatted Content</a> </div>
        <div> <a href="deliverEventObject.php" class="button">9-1: PHP-JSON Event Object</a> </div>
       

 </div>
 <div><img src="../images/homework2.jpg" alt="Homework Image" style=" float: right;"></div>

<footer>
        <p>&copy; 2023 Uday Chinhamora Homework Page. All rights reserved.</p>
    </footer>
</body>
</html>