<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php';

if (isset($_POST['verify'])) {
    // Concatenate the OTP from the individual input fields
    $entered_otp = implode('', $_POST['otp']);
    $email = $_SESSION['email'];

    // Check OTP from database
    $query = "SELECT * FROM user_details WHERE email='$email' AND l_otp='$entered_otp'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['verified'] = true;
        header("Location: voter_dash.php");
        exit();
    } else {
        $error = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>

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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 450px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .otp-input {
            width: 50px;
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
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
        }

        input[type="submit"]:hover {
            background: #50527e;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
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
<h2>2-Step Verification</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form action="" method="POST">
        <label for="otp">Enter OTP</label>
        <div>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
            <input type="text" name="otp[]" class="otp-input" maxlength="1" oninput="moveToNext(this)" required>
        </div><br>
        <input type="submit" value="Verify OTP" name="verify">
    </form>
</div>

<!-- JavaScript for Sidebar and OTP Input -->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.querySelector(".menu-icon").style.display = "none"; // Hide menu icon
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".menu-icon").style.display = "block"; // Show menu icon again
}

function moveToNext(current) {
    if (current.value.length >= current.maxLength) {
        const next = current.nextElementSibling;
        if (next) {
            next.focus();
        }
    }
}
</script>
</body>
</html>
