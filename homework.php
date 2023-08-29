<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
        <h1><?php 
    echo'Homework Page';
    ?>
</h1>
</head>
<body>
 <p>Here are the links to your assignments:</p>

   

        <?php 

            echo '<div class="assignment">
            <h2>Home Page Assignment</h2>
            <a href="index.php" class="btn">Go to Home Page Assignment</a>
        </div>
';



echo '<div class="assignment">
            <h2>Git-related terms Assignment</h2>
            <a href="git_terms.php" class="btn">Go to Git-related terms Assignment</a>
        </div>
';

?>
</body>
</html>