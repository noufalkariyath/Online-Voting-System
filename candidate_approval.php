

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
            text-align: center;
           
        }

        /* Style for table data cells */
        td {
            border: 1px solid #ddd;
            padding: 8px 15px;
            text-align: center;
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
               
         .reward-container {
      background-color: #fff;
      color: #000;
      border-radius: 10px;
      width: auto;
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

      border-radius: 5px;
    }
      .cancel-btn {
      background-color: #e0e0e0;
      color: red;
      margin-right: 10px;
      
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
              
                        </li>

                   			<li><a href="upcoming_elections.php"><i  class="ti-timer"> </i> Upcoming Elections </a></li>
                        <li><a href="election_decleration.php"><i class="ti-exchange-vertical"> </i><span>Election Declaration </span> </a></li>
                        <li class="active"><a href="#"><i  class="ti-ticket"> </i> Candidate Approval </a></li>
                        <li><a href="result_page.php"><i  class="ti-package"> </i>Result</a></li>

                     <li><a href="election_history.php"><i  class="ti-time"> </i>Election History  </a></li>
                  <li><a href="voter_list.php"><i  class="ti-package"> </i>Voter List  </a><li>                     
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
  <?php
include 'db_connect.php';

$tablename=$_GET['e_id'];

// Handle approval or rejection of candidates
if (isset($_GET['action']) && isset($_GET['id'])) {
    $tablename=$_GET['tablename'];

    
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'approve') {
        $sql = "UPDATE candidate_details SET status = 'approved' WHERE candidate_id = '$id'";
       // $sql = "UPDATE candidate_details SET status='approved' WHERE candidate_id=$id";
    } elseif ($action == 'reject') {
        $sql = "UPDATE candidate_details SET status = 'rejected' WHERE candidate_id = '$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Candidate status updated successfully!";
    } else {
        echo "Error updating record: " .$conn->error;
    }
}

// Fetch pending candidates
$sql_pending = "SELECT * FROM candidate_details WHERE e_id = '$tablename' AND status = 'pending'";
$result_pending = $conn->query($sql_pending);
$result = $conn->query($sql_pending);
// Check if the query returned any results
if ($result->num_rows > 0) {
$name=$result->fetch_assoc();
}

// Fetch approved candidates
$sql_approved = "SELECT * FROM candidate_details WHERE e_id = '$tablename' AND status = 'approved'";
$result_approved = $conn->query($sql_approved);

// Fetch rejected candidates
$sql_rejected = "SELECT * FROM candidate_details WHERE e_id = '$tablename' AND status = 'rejected'";
$result_rejected = $conn->query($sql_rejected);
?>

<body>
    <h4>Pending Candidates</h4>
    <table border="1">
        <tr>
            <th  style="color: white;">ID</th>
            <th  style="color: white;">Appl.No.</th>
            <th  style="color: white;">Image</th>
            <th  style="color: white;">Name</th>
            <th  style="color: white;">Date of Birth</th>
            <th  style="color: white;">Gender</th>
            <th  style="color: white;">Mobile No.</th>
            <th  style="color: white;">Email</th>
            <th  style="color: white;">Address</th>

            <th  style="color: white;">Status</th>
            <th  style="color: white;">Action</th>
            </div>
        </tr>
        <?php
        if ($result_pending->num_rows > 0) {
            while($row = $result_pending->fetch_assoc()) {
            $imageData = $name['image'];

if (!empty($imageData)) {
    $imageSrc = "data:image/jpeg;base64," . base64_encode($imageData);
} else {
    $imageSrc = "default-profile.png"; // Use a default image if no data
}

echo "<tr>
        <td>{$row['candidate_id']}</td>
        <td>{$row['application_no']}</td>
        <td><img src='$imageSrc'' width='100'></td>
        <td>{$row['candidate_name']}</td>
        <td>{$row['dob']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['mob']}</td>
        <td>{$row['email']}</td>
        <td>{$row['addr']}</td>
        <td>{$row['status']}</td>
        <td style='text-align: center;'>
            <a href='candidate_approval.php?tablename=$tablename&action=approve&id={$row['candidate_id']}'>Approve</a> |
            <a href='candidate_approval.php?tablename=$tablename&action=reject&id={$row['candidate_id']}'>Reject</a>
        </td>
    </tr>";

            }
        } else {
            echo "<tr><td colspan='10'><center>No pending candidates</center></td></tr>";
        }
        ?>
    </table>
    <h4>Approved Candidates</h4>
    <table border="1">
        <tr>
            <th  style="color: white;">ID</th>
            <th  style="color: white;">Name</th>
            
            <th  style="color: white;">Status</th>
        </tr>
        <?php
        if ($result_approved->num_rows > 0) {
            while($row = $result_approved->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['candidate_id']}</td>
                        <td>{$row['candidate_name']}</td>
                        
                        <td style='text-align: center;'>{$row['status']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'><center>No approved candidates</center></td></tr>";
        }
        ?>
    </table>

    <h4>Rejected Candidates</h4>
    <table border="1">
        <tr>
            <th  style="color: white;">ID</th>
            <th  style="color: white;">Name</th>
           
            <th  style="color: white;">Status</th>
        </tr>
        <?php
        if ($result_rejected->num_rows > 0) {
            while($row = $result_rejected->fetch_assoc()) {
                echo "<tr>
                       <td>{$row['candidate_id']}</td>
                        <td>{$row['candidate_name']}</td>
                        
                        <td style='text-align: center;'>{$row['status']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'><center>No rejected candidates</center></td></tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>             
               
               
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
