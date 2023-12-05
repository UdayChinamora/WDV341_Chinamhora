<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <title>Add Pizza Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      background-image: url("https://th.bing.com/th/id/R.8f562353dbaf42f2ba07077e6d53bc90?rik=Otf4I18HZFrbQQ&pid=ImgRaw&r=0");
    }

    h1 {
      color: #333;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

   
    textarea {
      width: 100%;
      background-color:light-yellow;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: blue;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

    
 nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}
    
  </style>
</head>
<header>
       <nav>
            <ul>
                 <li><a href="index.php">Home</a></li>
                <li><a href="aboutPizza.php">About Us</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contactPizza.php">Contact</a></li>
            </ul>
        </nav>
  

<body>
  <div class="w3-container w3-green" style="border: 15px solid grey;text-align: center;">
  <p><h1>Add Pizza</h1></p>
</div>

  
 <form  action="upload.php"  method="POST" enctype="multipart/form-data">
    <label for="pizzaID">Pizza ID:</label>
    <input type="number" name="pizzaID" required><br><br>

    <label for="pizzaName">Pizza Name:</label>
    <input type="text" name="pizzaName" required><br><br>

    <label for="pizzaDescription">Description</label>
    <textarea name="pizzaDescription"  rows="5" cols="80" required></textarea><br>

    <label for="toppings">Toppings:</label>
    <textarea name="toppings"  rows="5" cols="80" required></textarea><br>

    <label for="price">Price:</label>
    <input type="number" name="price" required><br><br>

    <label for="image">Image Name</label>
    <input type="file" name="image">
    <button type="submit" name="upload">Upload Image</button> <br><br>

    <input type="submit" value="Add Pizza">
</form>

  <div class="w3-container w3-green">
  <p><img src="https://th.bing.com/th/id/OIP.R-AOBfjWUoWDICzZbhiZKgHaFj?w=247&h=185&c=7&r=0&o=5&dpr=1.2&pid=1.7" alt="Uday Image" width="20%" height ="50%"></p>
</div>

 <footer>
     <div class="w3-bar w3-black">
 
  <p>&copy; 2023 Pizza Paradise. All rights reserved. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <b style="color:red;">NOTE :  This is page is for educational purposes </b>
  </p>
</div>

 </footer>

</body>
</html>