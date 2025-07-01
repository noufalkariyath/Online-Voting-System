

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
                <style>
 .info-container {
    background-color: #fff;
      color: #000;
      border-radius: 10px;
      width: 600px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: left;
}

.info-title {
    font-size: 24px;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 20px;
    text-align: center;
}

.info-description {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
    text-align: left;
    margin-bottom: 20px;
}

.info-item {
    background-color: #f8f9fa;
    border-left: 5px solid #393b60;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.info-label {
    font-weight: bold;
    color: #393b60;
    font-size: 16px;
    margin-bottom: 10px;
    display: inline-block;
}

.info-item p {
    font-size: 14px;
    color: #555;
    margin: 0;
    line-height: 1.5;
}

.info-tip {
    font-size: 16px;
    color: #e67e22;
    font-weight: bold;
    margin-top: 20px;
    text-align: center;
}

.info-footer {
    font-size: 14px;
    color: #555;
    margin-top: 20px;
    text-align: center;
}
         .reward-container {
      background-color: #fff;
      color: #000;
      border-radius: 10px;
      width: 300px;
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
      margin-top: 10px;
      text-align: center;
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
          
                        
                        <li><a href="admin_dash.php"><i  class="ti-user"> </i> Admin's Dashboard </a></li>

                   			<li><a href="upcoming_elections.php"><i  class="ti-timer"> </i> Upcoming Elections </a></li>
                        <li class="active"><a href="#"><i class="ti-exchange-vertical"> </i><span>Election Declaration </span> </a></li>
                        <li><a href="approval_page.php"><i  class="ti-ticket"> </i> Candidate Approval </a></li>
                         <li><a href="result_page.php"><i  class="ti-package"> </i> Result  </a></li>
                     <li><a href="election_history.php"><i  class="ti-time"> </i>Election History  </a></li>
                     <li><a href="voter_list.php"><i  class="ti-list"> </i>Voter List  </a></li>
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
 <div class="reward-container">                   
                <h3>Election Declaration</h3>
 <form action="" method="POST">
  <label for="name">Election Name :</label>
    <input type="text" id="name" name="name" required>

<br><label for="date">Election Starts On :</label>
    <input type="datetime-local" id="date" name="date" required>



<br><label for="election_ending_time">Election Ends On :</label>
    <input type="datetime-local" id="election_ending_time" name="election_ending_time" required>
    
    
    
<br><label for="candidate_registration_start">Cadidate Registration Starts On :</label>
    <input type="datetime-local" id="d1" name="candidate_registration_start" required>


<br><label for="candidate_registration_ending">Cadidate Registration Ends On :</label>
    <input type="datetime-local" id="d2" name="candidate_registration_ending" required>
  
<br><input type='submit' id='sumbit' name="submit" value="Register campaign">
   

   </form> 
    </div>
    <hr>
    <div class="info-container">
    <h3>Important Information for Election Declaration</h3>
    <p class="info-description">
        When declaring an election, please ensure that all the dates and times are valid. Follow the instructions below to avoid any conflicts:
    </p>
    
    <div class="info-item">
        <div class="info-label">Election Start Date:</div>
        <p>The election start date must be set in the future. You cannot start the election in the past.</p>
    </div>
    <div class="info-item">
        <div class="info-label">Candidate Registration Start Date:</div>
        <p>The registration start date must also be in the future. It cannot be in the past.</p>
    </div>
    <div class="info-item">
        <div class="info-label">Election End Date:</div>
        <p>The election end date must be later than the current date and time.</p>
    </div>
    <div class="info-item">
        <div class="info-label">Candidate Registration End Date:</div>
        <p>The registration end date must be in the future.</p>
    </div>
    <div class="info-item">
        <div class="info-label">Election Start Date vs Candidate Registration Start Date:</div>
        <p>The Candidate Registration Start Date must be earlier than the Election Start Date. The election cannot start before the candidate registration period begins.</p>
    </div>
    <div class="info-item">
        <div class="info-label">Election End Date vs candidate Registration End Date:</div>
        <p>The election end date must be after the candidate registration end date. The election cannot end before the registration period ends.</p>
    </div>

    <div class="info-tip">
        <span class="info-label">Tip:</span> Always make sure that the dates are set in the future and follow the above conditions to avoid any issues.
    </div>

    <p class="info-footer">
        If all the dates and times are valid, your election will be declared successfully. If there are any conflicts or invalid dates, please correct them and try again.
    </p>
</div>
   <?php
include 'db_connect.php';
if (isset($_POST['submit'])) {
    $currentDateTime = date('Y-m-d H:i:s');
$ename=$_POST['name'];
$edate=$_POST['date'];
//$estime=$_POST['election_starting_time'];
$eetime=$_POST['election_ending_time'];
$crsdate=$_POST['candidate_registration_start'];
$credate=$_POST['candidate_registration_ending'];
if ($edate>=$currentDateTime && $crsdate>=$currentDateTime && $eetime>$currentDateTime && $credate>$currentDateTime && $edate>$crsdate && $eetime>$credate){
$sql=mysqli_query($conn,"insert into election_declaration (election_name,election_starting_date,election_ending_time,candidate_registration_starting_date,candidate_registration_ending_date) values('$ename','$edate','$eetime','$crsdate','$credate')");
 if($sql)
 {
    echo '<script>alert("Election has been Declared Successfully")</script>'; }
 else{
    echo '<script>alert("Election Declaration Unsuccessfull")</script>'; 
  }
  }
  else{
    echo '<script>alert("You need to choose a valid date  ")</script>'; 

  }
}
?>
   
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
