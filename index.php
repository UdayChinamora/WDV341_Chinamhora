<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
 


   
</head>
<body>
     <?php
        echo '
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="wdv341.php">HomeWorks</a></li>
                <li><a href="#">Contact</a></li>
              
            </ul>
        </nav>
    </header>

    ';
    echo '
    <div class="container">
        <h1>Uday Chinhamora Home Page!</h1>
        <p>Check out my services and explore my portfolio.</p>

        <div class="button-container">
            <a href="#" class="button">Learn More</a>
            <a href="#" class="button">Contact Us</a>
        </div>

        <img src="udayGraduate.jpg" alt="Uday Image" width="20%" height ="50%">
    </div>
    ';

   echo' <footer>
        <p>&copy; 2023 Uday Chinhamora. All rights reserved.</p>
    </footer>
    ;'
     ?>
</body>
</html>