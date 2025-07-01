<!DOCTYPE html>
<?php
include 'db_connect.php';
$currentDateTime = date('Y-m-d H:i:s');
 $sql = "SELECT * FROM election_declaration WHERE election_starting_date < '$currentDateTime' AND election_ending_time > '$currentDateTime'";
$result = $conn->query($sql);
// Check if the query returned any results

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
fdiv {
display: flex;
justify-content: center;
align-items: center;
height: 250px;
}

body  {   background-image: url('assets/background/back.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
</style>
<body>

<div id="mySidenav" class="sidenav">
  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php">HOME</a>
  <a href="voter_reg.php">VOTER REGISTRATION</a>
  <a href="candidate_reg.php">CANDIDATE REGISTRATION</a>
  <a href="candidate_login.php">KNOW YOUR STATUS</a>
  <a href="admin_login.php">ADMIN LOGIN</a>
  <a href="about.php">ABOUT</a>
  <a href="contact.html">CONTACT</a>
  
  
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<div id="head" class="head">
<h1><center>ONLINE VOTING SYSTEM</center></h1>
</div>

<div id="bot" class="bot" style="display: flex;
justify-content: center;
align-items: center;
height: 650px;">

<a href="registration.html" class="btn" role="button"  aria-pressed="true"><img src='assets/background/u.png' alt="user image"  class="rounded-0" width="150" height="150" ><hr> registration</a>

<a href="login.html" class="btn" role="button" " aria-pressed="true"><img src='assets/background/l.png' alt="user image"  class="rounded-0" width="150" height="150" ><hr> login</a>

<a href="about.php" class="btn" role="button"  aria-pressed="true"><img src='assets/background/h.png' alt="user image"  class="rounded-0" width="150" height="150"  ><hr> about</a>
</div>


<marquee width="100%" direction="right" height="150px">
NB:Ongoing Elections : <?php $temp=0; if ($result->num_rows > 0) { while($row=$result-> fetch_assoc()){ $temp=1; echo " | ".$row["election_name"];} if($temp==0){ echo "No Elections Available";}} ?>
</marquee>
<script>





function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}
</script>
  
</body>
</html>
