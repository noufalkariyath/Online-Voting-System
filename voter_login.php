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
  <a href="admin_login.php">ADMIN LOGIN</a>
 
  <a href="about.php">ABOUT</a>
  <a href="contact.html">CONTACT</a>
  
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<div id="head" class="head">
<h1><center>VOTER LOGIN </center></h1>
</div>
<body>
<form action="" method="POST">
    <label for="name">USERNAME</label>
    <input type="text" name="username" required> 
    <br>
    <label for="pass">PASSWORD</label>
    <input type="password" name="password" required> 
    <br>
    <input type="submit" value="LOGIN" name="submit">
    <p><a href="forgot_password.php">Forgot Password?</a></p>
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
$sql = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";
$result = $conn->query($sql);
// Check if the query returned any results
if ($result->num_rows > 0) {
// Login successful

//Continuing to voter dashboard
session_start();

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

error_reporting(E_ALL);
ini_set('display_errors', 1);
$error = ""; // Initialize error variable
if (isset($_POST['submit'])) {
 $pdo = new PDO("mysql:host=localhost;dbname=test_online_voting_system", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
;

$sql20 = "SELECT email FROM user_details WHERE user = :username AND pass = :password";
    $stmt = $pdo->prepare($sql20);
    
    // Execute the query with an associative array (without bind_param)
    $stmt->execute(['username' => $username, 'password' => $password]);

    // Fetch the email
    $email = $stmt->fetchColumn();



    

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
            $l_otp = random_int(100000, 999999);

            // Store OTP in session (temporary) & database
            $_SESSION['l_otp'] = $l_otp;
            $_SESSION['email'] = $email;

            // Store OTP securely in the database
            $update = $conn->prepare("UPDATE user_details SET l_otp = ? WHERE email = ?");
            $update->bind_param("is", $l_otp, $email);
            $update->execute();

            // Send OTP via email
$subject = "Your OTP for Secure Login - Online Voting System 2-Step Verification";

$message = <<<EOT
Dear User,

Your One-Time Password (OTP) for logging into your Online Voting System account is $l_otp.

For your security, please do not share this code with anyone. If you did not request this OTP, please contact our support team immediately.

Best regards,  
Poly Voting System  
polyvotingsystem@gmail.com  
EOT;


            $headers = "From: no-reply@yourwebsite.com\r\n";

            if (mail($email, $subject, $message, $headers)) {
                header("Location: verify_login.php");
                exit();
            } else {
                $error = "Failed to send OTP. Please try again.";
            }
        } else {
            $error = "Email not found.";
        }
    }
}


echo $email;
} else {
// Login failed
echo "Invalid username or password.";
}
}
// Close the database connection
$conn->close();
?>
</html>



