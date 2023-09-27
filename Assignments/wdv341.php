<!DOCTYPE html>
<html>
<head>
    <title>Homework Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    
    <img src="../images/homework.jpg" alt="Homework Image">
</head>





<body>


 <?php 
   echo' <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="wdv341.php">Assignments</a></li>
                <li><a href="../Database/dbConnect.php">Connect</a></li>
                <li><a href="contantUs.php">Contact</a></li>
            </ul>
        </nav>
    </header>

   ';


   echo '
    <div class="container">

        <h1>Uday Chinhamora Homework Page!</h1>
     

        <div class="button-container">
            <a href="../index.php" class="button">Home Page Assignment</a>
            <a href="git_terms.php" class="button">Git-related terms Assignment</a><br><br>
            <a href="php_basics.php" class="button">PHP Basics Assignment</a>
             <a href="inputForm.html"  class="button">5-1: HTML Form Processor</a>
              <a href="PHP-Functions.php"  class="button">4-1:PHP Functions</a>
        </div>

        <img src="../images/homework2.jpg" alt="Homework Image">
    </div>
';
   
   echo' <footer>
        <p>&copy; 2023 Uday Chinhamora Homework Page. All rights reserved.</p>
    </footer>
   ';
    ?>

</body>
</html>