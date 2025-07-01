<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style2.css">
    <style>
        body {
            background-image: url('assets/background/back.jpg');
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: black;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            background:rgba(44, 130, 201);, 1 /* Semi-transparent black */
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            max-width: 850px;
            
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.5);
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        /* Sidebar styles */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 22px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            background: black;
            color: white;
            border-radius: 5px;
        }

        .closebtn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 36px;
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px 15px;
            border-radius: 8px;
            color: white;
            transition: 0.3s;
        }

        .menu-icon:hover {
            background: white;
            color: black;
        }
    </style>
</head>
<body>

    <!-- Sidebar Menu -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="home.php">HOME</a>
        <a href="admin_login.php">ADMIN LOGIN</a>
        <a href="#">ABOUT</a>
        <a href="contact.html">CONTACT</a>
    </div>

    <!-- Menu Icon -->
    <span class="menu-icon" onclick="openNav()">&#9776;</span>

    <div class="container">
        <h1>About</h1>
        <p style="text-align:left">The advancement of technology has significantly transformed the electoral process, addressing
            challenges such as security, transparency, and efficiency in traditional voting methods. This
            project focuses on the development of an Online Voting System using PHP and MySQL to
            streamline and enhance the voting experience.</p><br>
            <p style="text-align:left">The system provides three key user roles: Admin, Voter, and Candidate, each with distinct functionalities 
            to ensure a seamless election process. The Admin oversees election management, candidate verification, 
            and result generation. Voters can securely register, log in, and cast their votes while maintaining anonymity.</p><br>
            <p style="text-align:left">By leveraging PHP for backend development and MySQL for efficient database management, the system ensures 
            high performance, security, and scalability. Furthermore, it encourages voter participation by allowing remote 
            voting, reducing logistical challenges.</p>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

</body>
</html>
