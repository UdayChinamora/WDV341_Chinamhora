<!DOCTYPE html>
<html>
<head>
    <title>Homework Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    
    <img src="images/homework.jpg" alt="Homework Image">
</head>





<body>


 <?php 
   echo' <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="wdv341.php">Assignments</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

   ';


   echo '
    <div class="container">

        <h1>Uday Chinhamora Homework Page!</h1>
     

        <div class="button-container">
            <a href="index.php" class="button">Home Page Assignment</a>
            <a href="git_terms.php" class="button">Git-related terms Assignment</a><br><br>
            <a href="php_basics.php" class="button">PHP Basics Assignment</a>
        </div>

        <img src="images/homework2.jpg" alt="Homework Image">
    </div>
';
   
   echo' <footer>
        <p>&copy; 2023 Uday Chinhamora Homework Page. All rights reserved.</p>
    </footer>
   ';
    ?>

</body>
</html>