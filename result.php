<head>
<link href="assets/res/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
        <link href="assets/res/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="assets/res/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="assets/res/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="assets/res/css/lib/themify-icons.css" rel="stylesheet">
        <link href="assets/res/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="assets/res/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="assets/res/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="assets/res/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="assets/res/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="assets/res/css/lib/helper.css" rel="stylesheet">
        <link href="assets/res/css/style.css" rel="stylesheet">
</head>
<style>
        /* Style for the table */
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        /* Style for table header */
        th {
            background-color: #393b60;
            color: white;
            padding: 12px 15px;
            text-align: left;
           
        }

        /* Style for table data cells */
        td {
            border: 1px solid #ddd;
            padding: 8px 15px;
            text-align: left;
        }

        /* Hover effect for rows */
        tr:hover {
            background-color: #f2f2f2;
            text-align: left;
        }

        /* Style for table row */
        tr:nth-child(even) {
            background-color: #f9f9f9;
            text-align: left;
        }
        style="color: white;"
        tr:nth-child(odd) {
            background-color: #ffffff;
            text-align: left;
        }

        /* Style for table container */
        .table-container {
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            
        }
    </style>
 <style>
 .container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    width: 80%;
}

.reward-container {
    width: 45%; /* Ensures both containers are equal */
    background-color: #fff;
    color: #000;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
}

/* Add space between the two containers */
.reward-container:first-child {
    margin-right: 40px;
    width:40%;
}
.reward-container:nth-child(2) {
    margin-left: 40px;
    width:25%;
}
       .confirm-btn {
      background-color: #007bff;
      color: #fff;
      
    }
          .confirm-btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            position:right;
        }

        .confirm-btn:hover {
            background-color: #0056b3;
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
<div id="bot" class="bot" style="display: flex;
justify-content: center;
align-items: center;
height: 750px;">
  <div class="reward-container">  
<?php
$de_id=$_POST['e_id'];
include 'db_connect.php';
//echo "<br>".$de_id;
$elections = $conn->query("SELECT * FROM election_declaration WHERE e_id='$de_id'");
while ($election = $elections->fetch_assoc()){
$election_name=$election['election_name'];
}
$candidates = $conn->query("SELECT * FROM candidate_details WHERE e_id='$de_id' AND status='approved'");
$temp=0;
?>
<table border='1'> 
<tr>
<td style="background-color: #f2f2f2;text-align:left ;"><h3><b>Election Result</h3></td>
</tr><tr><td></td>
</tr><td style="background-color: #f2f2f2;text-align:left ;"><h4>List of Candidates</h4>
</tr></table>
<table border='1'> 
<tr>
<th style="color: white;">Candidate Id</th>
<th style="color: white;">Candidate Name</th>
<th style="color: white;">No.of Votes</th>
</tr>
<?php while ($candidate = $candidates->fetch_assoc()): ?>
  <?php $temp=1; ?>
<tr>

<td> <?php echo $candidate['candidate_id']; ?><br></td>
<td> <?php echo $candidate['candidate_name']; ?><br></td>
<td> <?php echo $candidate['votes']; ?><br></td></tr>
  <?php endwhile; ?>
  <?php if($temp==0): ?>
    <h3>No Candidates Found</h3>
    <?php endif; ?>
  </table>
  <table border='1'> <tr><td style="background-color: #f2f2f2;text-align:left ;">
  <?php
include 'db_connect.php' ;
$sql="SELECT * FROM candidate_details WHERE e_id='$de_id' AND status='approved' ORDER BY votes DESC LIMIT 1";
$result=$conn->query($sql);
  
if($result->num_rows>0){
while ($row = $result->fetch_assoc()) {
  $maxvote=$row['votes'];
}
}
$sql2="SELECT * FROM candidate_details WHERE e_id='$de_id' AND status='approved' AND votes='$maxvote'";
$result2=$conn->query($sql2);
if($result2->num_rows>0){
  echo"<h4>Candidate(s) with the Highest Vote</h4>";
  while ($row2 = $result2->fetch_assoc()) {
    
echo"<p><strong>id:</strong> ".htmlspecialchars($row2['candidate_id'])."</p>";
echo"<p><strong>Name:</strong> ".htmlspecialchars($row2['candidate_name'])."</p>";
echo"<p><strong>votes:</strong> ".htmlspecialchars($row2['votes'])."</p>";
echo "<hr>";
  }
  }else{
  echo"<h1>No Users Found</h1>";
  }
?>
</td>
</tr>
</table>
</div>



<div class="reward-container">  
<?php
include 'db_connect.php';

// Prepare the SQL statement
$sql1 = "SELECT COUNT(voter_id) AS total_users FROM user_details";
$result1 = $conn->query($sql1);

//2nd
$sql2 = "SELECT COUNT(voter_id) AS voted_users FROM voted WHERE election_id=$de_id";
$result2 = $conn->query($sql2);

// Check if the query was successful
if ($result1) {
    $row1 = $result1->fetch_assoc();
    $non_voters = $row1['total_users'];
    //echo "Total number of users: " . $voters;
} else {
    // Output a more user-friendly error message
    echo "Error retrieving user count: " . $conn->error;
}
//2nd ifff
if ($result2) {
    $row2 = $result2->fetch_assoc();
    $voters = $row2['voted_users'];
    
} else {
    // Output a more user-friendly error message
    echo "Error retrieving user count: " . $conn->error;
}
//echo "<br>Total Voters :" . $voters;
//echo "<br>Voters in". $de_id. " is". $non_voters;
// Close the database connection
//$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="voterPieChart" width="" height=""></canvas>

<script>
    // Data from PHP
    const voters = <?php echo json_encode($voters); ?>;
    const nonVoters = <?php echo json_encode($non_voters); ?>;

    // Create the pie chart
    const ctx = document.getElementById('voterPieChart').getContext('2d');
    const voterPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Voters', 'Non-Voters'],
            datasets: [{
                label: 'Voter Distribution',
                data: [voters, nonVoters],
                backgroundColor: [
                    'rgba(52, 60, 84, 1)',
                    'rgba(244, 244, 244, 10)'
                ],
                borderColor: [
                    'rgba(52, 60, 84, 1)',
                    'rgba(244, 244, 244, 10)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Voter Distribution for <?php echo $election_name; ?>'
                }
            }
        }
    });
</script>

</body>
</html>





    <a href="result_page.php" class="confirm-btn">Back</a>
</div>
</div>

