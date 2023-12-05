<?php
/* Algorithm for a sign on page

provide a signon form - username and password, self posting

if(form has been submitted)
{
    x process form data
    x validate input data
        if error 
            displayForm
            validData = false       //bad data switch on!
    if(validData)
        access database
            (SQL SELECT WHERE clause username/password )
        if you find the username/password in the database
            -you are valid user
            -display Admin Page/content
        else
            -Invalid username/password - ERROR
            display login form OR return to home page
    else
        ERROR - Invalid username or password
        x display login form 
}
else{
    x display the form
}
//VIEW - HTML area

if(validUser - signed on){
    display the admin content
}
else{
    display the login form
}

*/

$inUsername = "";
$inPassword = "";
$usernameErrMsg = "";
$passwordErrMsg = "";


if( isset($_POST['submit'])){
    echo "<h1>Form has Been Submitted</h1>";
    $displayForm = false;

    $inUsername = $_POST['username'];
    $inPassword = $_POST['password'];

    //validate input values

    $validData = true;          //assume the input data is good
    if($inUsername == ""){
        //display error message on the form
        $usernameErrMsg = "Please enter a username";
        $validData = false;
        //put the input values back into the form fields
        //display the form
    }

    if($validData){
        //process the database
        //START HERE on Thursday
    }
    else{
        //display the form
        $displayForm = true;        //set our displayForm flag/switch to true 
    }
}
else{
    echo "<h1>Display Login Form</h1>";
    $displayForm = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login to the Event System</h1>
    <?php
        if($displayForm){
            //the user has SIGNED ON and should display the Admin System
            echo "<h2>Display Form</h2>";
    ?>
            <form method="post" action="signOn.php">

            <p>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username"  value="<?php echo $inUsername; ?>">
                <span><?php echo $usernameErrMsg; ?></span>
        </p>
        <p>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" value="<?php echo $inPassword; ?>">
                <span><?php echo $passwordErrMsg; ?></span>
        </p>
        <p>
                <input type="submit" name="submit" value="Submit">
                <input type="reset">
        </p>

        </form>
    <?php
        }
        else{
            //the user needs to display the form - to sign on OR fix their input

            echo "<h2>Event ADMIN SYstem</h2>";
        }


    ?>
</body>
</html>