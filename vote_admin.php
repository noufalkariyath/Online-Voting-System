<head>
    <title>Online Voting System</title>

    <!-- Styles -->
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
    <link href="assets/res/css/style.css" rel="stylesheet"><!-- STYLE CSS -->

    <style>
        /* Election History Table Styling */
        .election-history {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .election-history th,
        .election-history td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .election-history th {
            background-color: #393b60; /* header colour */
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .election-history tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .election-history tr:hover {
            background-color: #D3D3D3; /* Light purple hover effect */
        }

        .election-history td:first-child {
            text-align: left; /* Align election names to the left */
            font-weight: bold;
        }

        .election-history td {
            white-space: nowrap; /* Prevent text wrapping */
        }

        /* Mobile Responsive Table */
        @media (max-width: 768px) {
            .election-history th,
            .election-history td {
                padding: 8px;
                font-size: 14px;
            }
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        body {
            background-image: url('assets/background/back_violet.jpg');
            height: 100vh;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
            margin: 0; /* Remove default margin */
        }
        .countdown {
        font-size: 10px;
        font-weight: bold;
        margin-top: 0px;
        color: #ff0000; /* Red color for countdown */
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="countdown" id="countdown">Loading...</div>
            <h4>List of Candidates</h4>
            <?php
            session_start(); // receiving the values
            $username = $_SESSION['username2'];
            $password = $_SESSION['password2'];
            $voter_id = $_SESSION['voter_id'];
            $de_id = $_POST['e_id'];

            include 'db_connect.php';

            $temp = 0;
            $currentDateTime = date('Y-m-d H:i:s');
            $candidates = $conn->query("SELECT * FROM candidate_details WHERE e_id='$de_id' AND status='approved'");
            // Fetch election ending time
$sql10 = $conn->query("SELECT * FROM election_declaration WHERE e_id='$de_id'");
if ($candidate3 = $sql10->fetch_assoc()) {
    $et = $candidate3['election_ending_time'];
    $ending_time = strtotime($et); // Convert to timestamp for JavaScript
}
?>

            
            <table class="election-history">
                <thead>
                    <tr>
                        <th style="text-align:center;"> S.No</th>
                        <th style="text-align:center;"> Image</th>
                        <th style="text-align:center;"> List of Candidates</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql2 = $conn->query("SELECT * FROM election_declaration WHERE e_id='$de_id'");
                    while ($candidate1 = $sql2->fetch_assoc()):
                    ?>
                        <?php echo htmlspecialchars($candidate1['election_name']); ?>
                    <?php endwhile; ?>
                    <?php $n = 0; ?>
                    <?php while ($candidate = $candidates->fetch_assoc()): ?>
                        <?php $temp = 1; ?>
                        <tr>
                            <?php $n = $n + 1; ?>
                            <td style=" width:2%;"><?php echo $n; ?></td>

                            <?php
                            $imageData = $candidate['image'];
                            if (!empty($imageData)) {
                                $imageSrc = "data:image/jpeg;base64," . base64_encode($imageData);
                            } else {
                                $imageSrc = "default-profile.png"; // Use a default image if no data
                            }
                            echo "<td><img src='$imageSrc' width='100'></td>";
                            ?>
                            <td style="text-align:center;"><?php echo htmlspecialchars($candidate['candidate_name']); ?></td>
                        </tr>
                    <?php endwhile; ?>

                    <?php if ($temp == 0): ?>
                        <tr>
                            <td colspan="3">No candidates Available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <br>
            <a href="admin_dash.php">Back</a>
        </div>
    </div>
</body>
<script>
    // Set the election ending time from PHP
    const endingTime = <?php echo $ending_time; ?>; // PHP timestamp

    function updateCountdown() {
        const currentTime = Math.floor(Date.now() / 1000); // Current time in seconds
        const difference = endingTime - currentTime;

        if (difference > 0) {
            const days = Math.floor(difference / (60 * 60 * 24));
            const hours = Math.floor((difference % (60 * 60 * 24)) / (60 * 60));
            const minutes = Math.floor((difference % (60 * 60)) / 60);
            const seconds = difference % 60;

            document.getElementById('countdown').textContent = `Ends in  ${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`;
        } else {
            document.getElementById('countdown').textContent = "Voting has ended!";
        }
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);
    updateCountdown(); // Initial call to display countdown immediately
</script>
</html>
