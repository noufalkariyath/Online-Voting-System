<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style2.css">
</head>
<style>
body  {   background-image: url('assets/background/back.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
</style>
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
            padding: 2px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2><center>Voter Registration Form</h2>

<form id="registrationForm" method="POST" action="" enctype="multipart/form-data">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" title="Enter a Valid Name" required >

    <label for="image">Choose an image:</label>
    <input type="file" name="image" id="image" accept="image/*" required>
   
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required>
   

   <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="mobile">Mobile Number:</label>
    <input type="tel" id="mobile" name="mob" title="Enter a valid mobile number" pattern="[0-9]{10}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="mail" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="add" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="user" required>

    <label for="password">Password:</label>
        <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    <button name="submit" type="submit">Register</button>
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
if (isset($_POST['submit'])) {
$file = $_FILES['image'];
$dname=$_POST['name'];
$ddob=$_POST['dob'];
$dgender=$_POST['gender'];
$dmob=$_POST['mob'];
$dadd=$_POST['add'];
$duser=$_POST['user'];
$dpass=$_POST['pass'];
$dmail=$_POST['mail'];


include 'db_connect.php';

     
     $dobDate = new DateTime($ddob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;
 if($age>=18){   
// Assuming you have already established a connection to the database in $conn

// Read the image file
$imageData = file_get_contents($file['tmp_name']);

// Prepare the SQL query to insert user details along with the image
$stmt = $conn->prepare("INSERT INTO user_details (image, name, dob, gender, mob, email, addr, user, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters: all strings except for the image which is a blob
$stmt->bind_param("sssssssss", $imageData, $dname, $ddob, $dgender, $dmob, $dmail, $dadd, $duser, $dpass);

// Execute the statement
if ($stmt->execute()) {
    echo "User  details and image uploaded successfully!";
} else {
    echo "Error uploading data: " . $stmt->error;
}


  if($stmt)
 {
session_start();
$_SESSION['username'] = $duser;
$_SESSION['password'] = $dpass;
 echo "<br>insertion successfull";



error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


$error = ""; // Initialize error variable

if (isset($_POST['submit'])) {
    $email = trim($_POST['mail']);

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
            $_SESSION['mail'] = $email;

            // Store OTP securely in the database
            $update = $conn->prepare("UPDATE user_details SET l_otp = ? WHERE email = ?");
            $update->bind_param("is", $l_otp, $email);
            $update->execute();

            // Send OTP via email
           $subject = "Your OTP for Secure Registration - Online Voting System 2-Step Verification";

$message = <<<EOT



Dear User,

Your One-Time Password (OTP) for Registering into your Online Voting System account is $l_otp.

For your security, please do not share this code with anyone. If you did not request this OTP, please contact our support team immediately.

Best regards,  
Poly Voting System  
polyvotingsystem@gmail.com 

EOT;


            $headers = "From: no-reply@yourwebsite.com\r\n";

            if (mail($email, $subject, $message, $headers)) {
                header("Location: verify_reg.php");
                exit();
            } else {
                $error = "Failed to send OTP. Please try again.";
            }
        } else {
            $error = "Email not found.";
        }
    }
}





 }
 else
 {
    echo '<script>alert("Registration Unsuccessfull")</script>'; 
  }
  }
    else{
   echo '<script>alert("You have to be atleast 18 year old ")</script>';
  }
  }

  ?>

</html>
