<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connect.php';

$error = ""; // Initialize error variable

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Use prepared statement to prevent SQL injection
        $query = $conn->prepare("SELECT * FROM user_details WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            // Generate secure 6-digit OTP
            $otp = random_int(100000, 999999);

            // Store OTP in session (temporary) & database
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

            // Store OTP securely in the database
            $update = $conn->prepare("UPDATE user_details SET otp = ? WHERE email = ?");
            $update->bind_param("is", $otp, $email);
            $update->execute();

            // Send OTP via email
            $subject = "Your OTP for Online Voting System Account Reset";
$message = "Dear User,
Your One-Time Password (OTP) for resetting your Online Voting System account is $otp.
Please do not share this code with anyone for security reasons. If you did not request this reset, please contact our support team immediately.
Best regards,
[Poly Voting System]
[polyvotingsystem@gmail.com]";


            $headers = "From: no-reply@yourwebsite.com\r\n";

            if (mail($email, $subject, $message, $headers)) {
                header("Location: verify_otp.php");
                exit();
            } else {
                $error = "Failed to send OTP. Please try again.";
            }
        } else {
            $error = "Email not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

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
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="email"] {
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
        }

        input[type="submit"]:hover {
            background: #50527e;
        }

        /* Error Message */
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
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

<!-- Forgot Password Form -->
<div class="container">
    <form action="" method="POST">
        <h2>Forgot Password</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <label for="email">Enter Your Email</label>
        <input type="email" name="email" required>
        <input type="submit" value="Send OTP" name="submit">
    </form>
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

