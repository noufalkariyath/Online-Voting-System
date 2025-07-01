<?php
 $conn=mysqli_connect("localhost","root","","test_online_voting_system");
if ($conn->connect_error) {
echo "Connection failed";
    die("Connection failed: " . $conn->connect_error);
 
}
date_default_timezone_set("Asia/Kolkata")
 ?>
