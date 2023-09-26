<!DOCTYPE html>
<html>
<head>
    <title>Php Basics</title>
</head>
<body>
    <h1>PHP Basics Assignment</h1>
    
    <?php
    $myName = "Uday F Chinhamora"; #create a PHP variable called `$myName` and assign it a value 
    echo " Name :  $myName";   #display myName variable 
    
   #create the variables `$number1`, `$number2`, and `$total`, assign them values, and display their values on the page.
    $number1 = 5;
    $number2 = 10;
    $total = $number1 + $number2;
    
    echo "<p>Number 1: $number1</p>";
    echo "<p>Number 2: $number2</p>";
    echo "<p>Total: $total</p>";
    
    $phpArray = array('PHP', 'HTML', 'Javascript');  #php array
    $jsArray = json_encode($phpArray);  #convert this PHP array into a JavaScript array and store in a variable
    
    #use JavaScript to display the values of `jsArray` on the page.
    echo "<script>";   

    echo "var jsArray = $jsArray;";
    echo "document.write('<p>Array Values: ' + jsArray.join(', ') + '</p>');";
    echo "</script>";
    ?>
    

</body>
</html>