<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php';

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
    die("Unauthorized access.");
}

if (isset($_POST['reset'])) {
    $new_password = $_POST['password'];
    $email = $_SESSION['email'];

    // Update password in database & remove OTP
    $update = "UPDATE user_details SET pass='$new_password', otp=NULL WHERE email='$email'";
    $conn->query($update);
    
    echo "<p class='success'>Password has been reset successfully!.<br> <a href='voter_login.php'>Login Here</a></p>";

    // Clear session
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>

    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Full-screen background */
        body {
            background-image: url('assets/background/back.jpg');
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        /* Container Box */
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        /* Form Elements */
        h2 {
            margin-bottom: 15px;
            color: #393b60;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #393b60;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background: #50527e; /* Lightened version */
        }

        /* Success Message */
        .success {
            color: green;
            margin-top: 10px;
            font-size: 14px;
        }

        /* Link Styling */
        a {
            text-decoration: none;
            color: #393b60;
            font-weight: bold;
        }

        a:hover {
            color: #50527e;
        }
             /* Sidebar Navigation */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #eee;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            background-color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
        }

        /* Sidebar Toggle Button */
        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 20px;
            color: black;
        }
    </style>
</head>
<body>
<!-- Sidebar Menu -->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="home.php">HOME</a>
    <a href="admin_login.php">ADMIN LOGIN</a>
    <a href="about.php">ABOUT</a>
    <a href="contact.html">CONTACT</a>
</div>

<!-- Sidebar Open Button -->
<span class="menu-icon" onclick="openNav()">&#9776;</span>

<div class="container">
    <h2>Reset Password</h2>
    <form action="" method="POST">
        <label for="password">Enter New Password</label>
        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <br>
        <input type="submit" value="Reset Password" name="reset">
</div>
<!-- JavaScript for Sidebar -->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.querySelector(".menu-icon").style.display = "none"; // Hide menu icon
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".menu-icon").style.display = "block"; // Show menu icon again
}

</script>
</body>
</html>

