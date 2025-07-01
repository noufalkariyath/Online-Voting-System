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
    .reward-container {
        background-color: #fff;
        color: #000;
        border-radius: 10px;
        width: 400px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: left;
    }

    .confirm-btn {
        background-color: #007bff;
        color: #fff;
    }

    .actions button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }

    .actions {
        margin-top: 20px;
        btn-align: right;
    }

    input[type="submit"] {
        background-color: #393b60;
        color: #fff;
        margin-right: 10px;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }

    body {
        background-image: url('assets/background/back_violet.jpg');
        height: 100vh;
        background-repeat: no-repeat;
        width: 100%;
        background-size: cover;
    }

    .countdown {
        font-size: 10px;
        font-weight: bold;
        margin-top: 0px;
        color: #ff0000; /* Red color for countdown */
    }
</style>

<?php
session_start(); // receiving the values
$username = $_SESSION['username2'];
$password = $_SESSION['password2'];
$voter_id = $_SESSION['voter_id'];
include 'db_connect.php';

$sql2 = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";
$result = $conn->query($sql2);

// Check if the query returned any results
if ($result->num_rows > 0) {
    $name = $result->fetch_assoc();
    $voter_id = $name['voter_id'];
}

$de_id = $_POST['e_id'];
$candidates = $conn->query("SELECT * FROM candidate_details WHERE e_id='$de_id' AND status='approved'");
$_SESSION['tablename'] = $de_id;

// Fetch election ending time
$sql10 = $conn->query("SELECT * FROM election_declaration WHERE e_id='$de_id'");
if ($candidate3 = $sql10->fetch_assoc()) {
    $et = $candidate3['election_ending_time'];
    $ending_time = strtotime($et); // Convert to timestamp for JavaScript
}
?>

<div id="bot" class="bot" style="display: flex; justify-content: center; align-items: center; height: 750px;">
    <div class="reward-container">
    <div class="countdown" id="countdown">Loading...</div>
        <form method="post" action="vote2.php">        
            <h4>Select a candidate to vote:</h4>
            <?php $temp = 0; ?>
            <?php while ($candidate = $candidates->fetch_assoc()): ?>
                <?php $temp = 1; ?>
                <input type="radio" name="candi_id" value="<?php echo $candidate['candidate_id']; ?>" required>
                <?php echo $candidate['candidate_name']; ?><br>
            <?php endwhile; ?>
            <?php if ($temp == 0): ?>
                <br><h6>No Candidates Available</h6>
            <?php else: ?>
                <br><input type="submit" name="vote" value="Vote ">
            <?php endif; ?>
        </form>
        <a href="voter_dash.php">Back</a>

        <!-- Countdown Timer -->

        
    </div>
</div>

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
