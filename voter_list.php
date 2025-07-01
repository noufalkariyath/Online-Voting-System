

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>online voting system</title>

        <!-- Styles -->
        
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
            background-color: #393b60; /*  header colour */
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
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    
    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    td:first-child {
        text-align: left; /* Align election names to the left */
    }

    th, td {
        white-space: nowrap; /* Prevents text from wrapping */
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

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                   <ul>
                    <div class="logo"><img src="assets/res/images/logo.png" alt="" /> <span><br>Online Voting System</br></span></div>
          
                        <li><a href="admin_dash.php" > <i class="ti-user"> </i>Admin's Dashboard <span class="badge badge-primary"></span> </a>
              
                        </li>
                        			<li><a href="upcoming_elections.php"><i  class="ti-timer"> </i> Upcoming Elections </a></li>

                   
                        <li><a href="election_decleration.php"><i class="ti-exchange-vertical"> </i><span>Election Declaration </span> </a></li>
                        <li><a href="approval_page.php"><i  class="ti-ticket"> </i> Candidate Approval </a></li>
                         <li><a href="result_page.php"><i  class="ti-package"> </i> Result  </a></li>
                     <li><a href="election_history.php"><i  class="ti-time"> </i>Election History  </a></li>
                     <li class="active"><a href=""><i  class="ti-list"> </i>Voter List  </a></li>
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
        <!-- /# notification -->
                                <li class="header-icon dib"><i class="ti-bell"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Recent Notifications</span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            
                                        </div>
                                                <!-- /# messages -->
                                    </div>
                                </li>
                                <li class="header-icon dib"><a href="home.php"><i class="ti-home"></a></i>
                                   
                                </li>
                                <li class="header-icon dib"><span class="user-avatar">Admin <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                               
                                                <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
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
                                    <h1>Hello, <span>Welcome Here</span></h1>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /# column -->
                    </div>
<div class="container">

                <?php
                      include 'db_connect.php';
                      echo "<h5>List Of Voters</h5>";
                      $candidates = $conn->query("SELECT * FROM user_details");
                      $temp=0;
$currentDateTime = date('Y-m-d H:i:s');
echo $currentDateTime;  
?>
       <table class="election-history">
            <thead>
                <tr>
                    <th>Voter Id</th>
                    <th style="text-align:center;">Voter Name</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($candidate = $candidates->fetch_assoc()): ?>
                    <?php $temp = 1; ?>
                    <tr>
                        <td style="text-align:center;"><?php echo htmlspecialchars($candidate['voter_id']); ?></td>
                        <td style="text-align:center;"><?php echo htmlspecialchars($candidate['name']); ?></td>
                    </tr>
                <?php endwhile; ?>

                <?php if ($temp == 0): ?>
                    <tr>
                        <td colspan="3">No Voters Available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </table>
</div>
        

  
  
   
</div>    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer">
                                   
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- jquery vendor -->
        <script src="assets/res/js/lib/jquery.min.js"></script>
        <script src="assets/res/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/res/js/lib/menubar/sidebar.js"></script>
        <script src="assets/res/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->

        <!-- bootstrap -->

      
        <script src="assets/res/js/scripts.js"></script>
            <script src="res/js/s.js"></script>
        <!-- scripit init-->
    </body>

</html>
