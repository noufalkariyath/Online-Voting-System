<?php
include 'db_connect.php';
session_start();//receiving
$username = $_SESSION['username'];
$password = $_SESSION['password'];
session_start();//passing
$_SESSION['username2'] = $username;
$_SESSION['password2'] = $password;
 ?>
 <?php
 $sql = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";
$result = $conn->query($sql);
// Check if the query returned any results
if ($result->num_rows > 0) {
$name=$result->fetch_assoc();
$voter_id=$name['voter_id'];
session_start();
$_SESSION['voter_id'] = $voter_id;
} 


// Close the database connection
$conn->close();
?>
 
 
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>online voting system</title>

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
    </head>
    <style>
         .reward-container {
      background-color: #fff;
      color: #000;
      border-radius: 10px;
      width: 300px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
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
    }
      .cancel-btn {
      background-color: #e0e0e0;
      color: #000;
      margin-right: 10px;
    }
    </style>
       <style>
body  {   background-image: url('assets/background/back_violet.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
</style> 

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                    <div class="logo"><img src="assets/res/images/logo.png" alt="" /> <span><br>Online Voting System</br></span></div>
          
                        <li class="active"><a class="sidebar-sub-toggle"> <i class="ti-user"> </i>Voter's Dashboard <span class="badge badge-primary"></span> </a>
              
                        </li>

                   
                        <li><a href="upcoming_elections.php"><i class="ti-exchange-vertical"> </i><span>Upcoming Election </span> </a></li>
                        <li><a href="upcoming_elections.php"><i  class="ti-ticket"> </i> Result  </a></li>
                     <li><a href="upcoming_elections.php"><i  class="ti-package"> </i>Voting History  </a></li>
                     <li><a href="upcoming_elections.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
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
                                            <span class="text-left">Recent elections<br></span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            
                                        </div>
                                                <!-- /# messages -->
                                    </div>
                                </li>
                                <li class="header-icon dib"><a href="home.php"><i class="ti-home"></a></i>
                                   
                                </li>
                                <li class="header-icon dib"><span class="user-avatar"><?php echo $name['name'];?> <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            
                                        </div>
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
                                    <h1>Hello, <span><?php echo $name['name'];?></span></h1>
                                    
                                </div>
                                                                  
                            </div>

                        </div>
                        
                       
                                
                        <!-- /# column -->
                    </div>
                    
                 <div class="reward-container">

                               <?php
                      include 'db_connect.php';
$currentDateTime = date('Y-m-d H:i:s');
echo $currentDateTime;
echo "<h5>Available Elections</h5>";
                       $candidates = $conn->query("SELECT * FROM election_declaration WHERE election_starting_date < '$currentDateTime' AND election_ending_time > '$currentDateTime'");
                       ?>
<form method="post" action="vote.php">

   <!-- <h2>Select a candidate to vote:</h2>-->

    <?php while ($candidate = $candidates->fetch_assoc()): ?>

        <input type="radio" name="e_id" value="<?php echo $candidate['e_id']; ?>" required>

        <?php echo $candidate['election_name']; ?><br>

    <?php endwhile; ?>
   <div class="actions">
    <button class="confirm-btn">Click here</button>

</div>
</form>

                                
                                </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer">
                                    <p>2024 © Online Voting system</p>
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
