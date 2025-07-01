<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style2.css">
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
   <style>
body  {   background-image: url('assets/background/back.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
</style> 
</head>
<body>
<div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   <a href="home.php">HOME</a>
  <a href="#">ADMIN LOGIN</a>
  <a href="about.php">ABOUT</a>
  <<a href="contact.html">CONTACT</a>
  
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<div id="head" class="head">
<h1><center>ADMIN LOGIN </center></h1>
</div>
<body>
<form action="" method="POST">
<label for="name">USERNAME</label>
<input type="text" name="username" required> 
<br><label for="pass">PASSWORD</label>
<input type="password" name="password" required> 
<br><bd><input type="submit" value="LOGIN" name="submit" >
</form>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  
}
</script>     
</body>
<?php

include 'db_connect.php';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
// Query to retrieve data from the database
$sql = "SELECT * FROM admin_details WHERE user = '$username' AND pass ='$password'";
$result = $conn->query($sql);
// Check if the query returned any results
if ($result->num_rows > 0) {
// Login successful
echo "Login successful!";
session_start();

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
//Continuing to admin dashboard
header("Location: admin_dash.php");
} else {
// Login failed
echo "Invalid username or password.";
}
}
// Close the database connection
$conn->close();
?>
</html>

