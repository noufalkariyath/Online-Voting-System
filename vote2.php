<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Message in Card</title>
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
            width: 300px;
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
fdiv {
display: flex;
justify-content: center;
align-items: center;
height: 250px;
}

body  {   background-image: url('assets/background/back_violet.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
</style>
</head>
<?php
 

if (isset($_POST['vote'])) {
include 'db_connect.php';
session_start();
$username = $_SESSION['username2'];
$password = $_SESSION['password2'];

$vote_id=$_POST['candi_id'];
session_start();
$tablename=$_SESSION['tablename'];
//////////////////////////

//echo "<br>VOTE ID :".$vote_id;
//echo "<br>TABLE NAME :".$tablename;

$sql7 = "SELECT * FROM election_declaration WHERE e_id = '$tablename'";
$res = $conn->query($sql7);
if ($res->num_rows > 0){
    $name7=$res->fetch_assoc();
    $election_names=$name7['election_name'];
    //echo "Election Name :".$election_names;
}

$sql2 = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";//Retriving the voter id
$result = $conn->query($sql2);

if ($result->num_rows > 0) {//Retriving the voter id
$name=$result->fetch_assoc();
$voter_id=$name['voter_id'];
//echo "<br>USER NAME : ".$name['name']; 
//echo "<br> USER ID : ".$voter_id; 
}

// Check if the query returned any results
$sql3 = "SELECT * FROM voted WHERE election_id = '$tablename' AND voter_id = '$voter_id'";//Inserts the has_voted
$result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {//Inserts the has_voted
 $name2=$result2->fetch_assoc();
  //echo "<br>";
  // echo '<script>alert("ALREADY VOTED ")</script>';
   //header("Location: voter_dash.php");
           echo "<div class='popup-container' id='popup'>";
        echo "    <div class='popup-card'>";
        echo "        <h3>Online Voting System</h3><br>";
        echo "        <p> YOU HAVE ALREADY VOTED </p><br>";
        echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
        echo "    </div>";
        echo "</div>";
  }
  else{
  
  $sql1=mysqli_query($conn,"UPDATE candidate_details SET votes=votes+1 WHERE e_id='$tablename' AND candidate_id='$vote_id'");
  $text="has_voted";
 $date = new DateTime();
$ddate = $date->format("Y-m-d H:i:s");  // Store the formatted date correctly
$sql4 = mysqli_query($conn, "INSERT INTO voted (election_id, voter_id, election_name, has_voted, voted_on) 
VALUES ('$tablename', '$voter_id', '$election_names', '$text', '$ddate')");

if($sql1)
 {
            echo "<div class='popup-container' id='popup'>";
        echo "    <div class='popup-card'>";
        echo "        <h3>Online Voting System</h3><br>";
        echo "        <p>VOTED SUCCESSFULLY </p><br>";
        echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
        echo "    </div>";
        echo "</div>";
 //echo '<script>alert("Voted successfully")</script>';
 //header("Location: hello.html");
 }
 else
 {
              echo "<div class='popup-container' id='popup'>";
        echo "    <div class='popup-card'>";
        echo "        <h3>Online Voting System</h3><br>";
        echo "        <p>VOTED UNSUCCESSFULLY </p><br>";
        echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
        echo "    </div>";
        echo "</div>";
  //echo '<script>alert("Voted Unsuccessfully")</script>';
  } }
  }
 //echo "<br><a href='voter_dash.php'>click Here </a>";
?>
    <script>
        // Show the popup if it exists
        document.addEventListener('DOMContentLoaded', function () {
            var popup = document.getElementById('popup');
            if (popup) {
                popup.style.display = 'flex';
            }
        });

        // Function to redirect to another page
        function redirectToPage() {
            window.location.href = 'voter_dash.php'; // Replace with your desired page
        }
    </script>
    </html>
