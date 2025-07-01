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
    $voters = $row1['total_users'];
    echo "Total number of users: " . $voters;
} else {
    // Output a more user-friendly error message
    echo "Error retrieving user count: " . $conn->error;
}
//2nd ifff
if ($result2) {
    $row2 = $result2->fetch_assoc();
    $non_voters = $row2['voted_users'];
    
} else {
    // Output a more user-friendly error message
    echo "Error retrieving user count: " . $conn->error;
}
echo "<br>Total Voters :" . $voters;
echo "<br>Voters in". $de_id. " is". $non_voters;
// Close the database connection
//$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Voter Distribution</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="voterPieChart" width="50" height="50"></canvas>

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
                    text: 'Voter Distribution for <?php echo $de_id; ?>'
                }
            }
        }
    });
</script>

</body>
</html>




