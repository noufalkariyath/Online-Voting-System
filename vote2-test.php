
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
        body {
            font-family: Arial, sans-serif;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .popup-card h3 {
            margin: 0 0 10px;
        }

        .popup-card p {
            margin: 10px 0;
        }

        .close-btn {
            background: #f44336;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #d32f2f;
        }
    </style>
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                    <div class="logo"><img src="assets/res/images/logo.png" alt="" /> <span><br>Online Voting System</br></span></div>
          
                      

                   
                        <li><a href="#"class="sidebar-sub-toggle"><i class="ti-exchange-vertical"> </i>election decleration  </a></li>
                        
                          <li class="active"><a class="sidebar-sub-toggle"> <i class="ti-user"> </i>cadidate nominations <span class="badge badge-primary"></span> </a>
              
                        </li>
                        
                        
                         <li><a class="sidebar-sub-toggle"> <i class="ti-user"> </i>cadidate list <span class="badge badge-primary"></span> </a>
              
                        </li>
                        
                        
                     <li><a href="#"class="sidebar-sub-toggle"> <i class="ti-package"> </i>Voting   </a></li>
                     <li><a href="#"class="sidebar-sub-toggle"><i class="ti-ticket"> </i> Result  </a></li>
                     <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
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
                                <li class="header-icon dib"><span class="user-avatar">John <i class="ti-angle-down f-s-10"></i></span>
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
<?php
if (isset($_POST['vote'])) {
include 'db_connect.php';
session_start();
$username = $_SESSION['username2'];
$password = $_SESSION['password2'];

$vote_id=$_POST['candi_id'];
session_start();
$tablename=$_SESSION['tablename'];
//////////////////////////

echo "<br>VOTE ID :".$vote_id;
echo "<br>TABLE NAME :".$tablename;




$sql2 = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";//Retriving the voter id
$result = $conn->query($sql2);

if ($result->num_rows > 0) {//Retriving the voter id
$name=$result->fetch_assoc();
$voter_id=$name['voter_id'];
echo "<br>USER NAME : ".$name['name']; 
echo "<br> USER ID : ".$voter_id; 
}

// Check if the query returned any results
$sql3 = "SELECT * FROM voted WHERE election_id = '$tablename' AND voter_id = '$voter_id'";//Inserts the has_voted
$result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {//Inserts the has_voted
 $name2=$result2->fetch_assoc();
  //echo "<br>";
  // echo '<script>alert("ALREADY VOTED ")</script>';
   
  ///////////////////////
      echo "<div class='popup-container' id='popup'>";
        echo "    <div class='popup-card'>";
        echo "        <h3>Online Voting System</h3><br>";
        echo "        <p>! YOU HAVE ALREADY VOTED !</p><br>";
        echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
        echo "    </div>";
        echo "</div>";
   
  }
  else{
  
  $sql1=mysqli_query($conn,"UPDATE `$tablename` SET votes=votes+1 WHERE candidate_id='$vote_id'");
  $text="has_voted";
  $sql4=mysqli_query($conn,"INSERT INTO voted values('$tablename','$voter_id','$text')");
if($sql1)
 {
 
 echo '<script>alert("Voted successfully")</script>';
 //header("Location: hello.html");
 }
 else
 {
  
  echo '<script>alert("Voted Unsuccessfully")</script>';
  } }
  }
 echo "<br><a href='voter_dash.php'>click Here </a>";
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
        <script>
        // Show the popup if it exists
        document.addEventListener('DOMContentLoaded', function () {
            var popup = document.getElementById('popup');
            if (popup) {
                popup.style.display = 'flex';
            }
        });

        // Function to redirect to another page
        function redirectToPage() {
            window.location.href = 'vote.php'; // Replace with your desired page
        }
    </script>
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
