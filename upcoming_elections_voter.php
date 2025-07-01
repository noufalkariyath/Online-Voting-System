<?php
include 'db_connect.php';
session_start(); // receiving session data
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// passing session data
$_SESSION['username2'] = $username;
$_SESSION['password2'] = $password;

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM user_details WHERE user = ? AND pass = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();


// Close the database connection
$stmt->close();
$conn->close();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="assets/res/css/style.css" rel="stylesheet"> <!-- STYLE CSS -->

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

        .container {
            margin: 20px 10px;
            max-width: 600px;
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
        }
    </style>
</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <img src="assets/res/images/logo.png" alt="" />
                        <span><br>Online Voting System</span>
                    </div>

                    <li><a href="voter_dash.php"><i class="ti-user"> </i> Voter's dashboard </a></li>
                    <li class="active"><a href="#"><i class="ti-exchange-vertical"> </i><span>Upcoming Election </span> </a></li>
                    <li><a href="result_page_voter.php"><i class="ti-ticket"> </i> Result </a></li>
                    <li><a href="voting_history.php"><i class="ti-time"> </i> Voting History </a></li>
                    <li><a href="logout.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <ul>
                            <li class="header-icon dib"><i class="ti-bell"></i>
                                <div class="drop-down">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent elections<br></span>
                                    </div>
                                    <div class="dropdown-content-body">
                                    </div>
                                </div>
                            </li>
                            <li class="header-icon dib"><a href="home.php"><i class="ti-home"></i></a></li>
                            <li class="header-icon dib">
                                <span class="user-avatar"><?php echo $name['name']; ?> <i class="ti-angle-down f-s-10"></i></span>
                                <div class="drop-down dropdown-profile">
                                    <div class="dropdown-content-heading"></div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="voter_profile.php"><i class="ti-user"></i> <span>Profile</span></a></li>
                                            <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                            <li><a href="logout.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span><?php echo $name['name']; ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <?php
                    include 'db_connect.php';

                    echo "<h5>Upcoming Elections</h5>";

                    $currentDateTime = date('Y-m-d H:i:s');
                    $currentTimestamp = strtotime($currentDateTime); // convert to timestamp
                    $candidates = $conn->query("SELECT * FROM election_declaration WHERE election_starting_date > '$currentDateTime'");

                    ?>
                    <table class="election-history">
                        <thead>
                            <tr>
                                <th style="text-align:center;"> S.No</th>
                                <th style="text-align:center;"> Upcoming Elections</th>
                                <th style="text-align:center;"> Starts In</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 0; ?>
                            <?php while ($candidate = $candidates->fetch_assoc()): ?>
                                <tr data-start-time="<?php echo strtotime($candidate['election_starting_date']); ?>">
                                    <?php $n = $n + 1; ?>
                                    <td style=" width:2%;"><?php echo $n; ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($candidate['election_name']); ?></td>
                                    <td style="text-align:center;" class="countdown">Loading...</td>
                                </tr>
                            <?php endwhile; ?>

                            <?php if ($n == 0): ?>
                                <tr>
                                    <td colspan="3">No Elections Available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2024 © Online Voting system</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/res/js/lib/jquery.min.js"></script>
    <script src="assets/res/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/res/js/lib/menubar/sidebar.js"></script>
    <script src="assets/res/js/lib/preloader/pace.min.js"></script>
    <script src="assets/res/js/scripts.js"></script>

    <script>
        function updateCountdown() {
            const rows = document.querySelectorAll('.election-history tbody tr');
            const currentTime = Math.floor(Date.now() / 1000); // Current time in seconds

            rows.forEach(row => {
                const startTime = parseInt(row.getAttribute('data-start-time'));
                const countdownCell = row.querySelector('.countdown');

                if (startTime > currentTime) {
                    const difference = startTime - currentTime;

                    const days = Math.floor(difference / (60 * 60 * 24));
                    const hours = Math.floor((difference % (60 * 60 * 24)) / (60 * 60));
                    const minutes = Math.floor((difference % (60 * 60)) / 60);
                    const seconds = difference % 60;

                    countdownCell.textContent = `${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`;
                } else {
                    countdownCell.textContent = "Election has started!";
                }
            });
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
    </script>
</body>

</html>
