<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style2.css">
<style>
        body {
            font-family: Arial, sans-serif;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 500px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .popup-card h3 {
            margin: 0 0 10px;
        }

        .popup-card p {
            margin: 10px 0;
        }

        .close-btn {
            background: #f44336;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #d32f2f;
        }
    </style>
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
<h1><center>CANDIDATE REGISTRATION APPLICATION STATUS </center></h1>
</div>
<body>
<form action="" method="POST">
<label for="name">Application Number</label>
<input type="text" name="application_no" required> 
<br><label for="date">Date of Birth</label>
<input type="date" name="date" required> 
<br><bd><input type="submit" value="LOGIN" name="submit">
</form>
<script>
     document.addEventListener('DOMContentLoaded', function () {
            var popup = document.getElementById('popup');
            if (popup) {
                popup.style.display = 'flex';
            }
        });

        // Function to redirect to another page
        function redirectToPage() {
            window.location.href = 'candidate_login.php'; // Replace with your desired page
        }
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
    $app_no=$_POST['application_no'];
    $ddob=$_POST['date'];
    echo "date of birth :".$ddob;
    include 'db_connect.php';
    $sql = "SELECT * FROM candidate_details WHERE application_no = '$app_no' AND dob = '$ddob'";
    $result = $conn->query($sql);
    // Check if the query returned any results
    if ($result->num_rows > 0) {
        $name=$result->fetch_assoc();

        echo "Login success";
    // Login successful
    echo "<div class='popup-container' id='popup'>";
    echo "    <div class='popup-card'>";
    echo "        <h3>Online Voting System</h3><br>";
    echo "        <p>Candidate name : ".$name['candidate_name']."<br>Candidate Id : ".$name['candidate_id']."<br>Application Status : ".$name['status']."</p>";
    echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
    echo "    </div>";
    echo "</div>";
   
    
    
    //Continuing to admin dashboard
   // header("Location: admin_dash.php");
    } else {
    // Login failed
    echo "<div class='popup-container' id='popup'>";
    echo "    <div class='popup-card'>";
    echo "        <h3>Online Voting System</h3><br>";
    echo "        <p>Invalid Apllication Number or date of Birth </p><br>";
    echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
    echo "    </div>";
    echo "</div>";
    }

}
?>

</html>

