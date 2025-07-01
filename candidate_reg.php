
<?php
require_once 'db_connect.php'; // Include database connection only once

$currentDateTime = date('Y-m-d H:i:s');

// Fetch active elections
$elections = $conn->query("SELECT * FROM election_declaration WHERE candidate_registration_starting_date < '$currentDateTime' AND candidate_registration_ending_date > '$currentDateTime'");

// Function to generate a unique application number
function generateUniqueApplicationNumber() {
    global $conn;

    do {
        $appNumber = bin2hex(random_bytes(3));
        $result = $conn->query("SELECT COUNT(*) as count FROM candidate_details WHERE application_no = '$appNumber'");
        $row = $result->fetch_assoc();
        $exists = $row['count'];
    } while ($exists > 0);

    return $appNumber;
}

// Process form submission
if (isset($_POST['submit'])) {
    $file = $_FILES['image'];
    $de_id = $_POST['election_id'];
    $dname = $_POST['name'];
    $ddob = $_POST['dob'];
    $dgender = $_POST['gender'];
    $dmob = $_POST['mob'];
    $dmail = $_POST['mail'];
    $dadd = $_POST['add'];

    // Calculate Age
    $dobDate = new DateTime($ddob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    if ($age >= 18) {
        // Read image data
        $imageData = file_get_contents($file['tmp_name']);

        // Generate unique application number
        $uniqueAppNumber = generateUniqueApplicationNumber();

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO candidate_details (application_no, e_id, image, candidate_name, dob, gender, mob, email, addr) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssssss", $uniqueAppNumber, $de_id, $imageData, $dname, $ddob, $dgender, $dmob, $dmail, $dadd);
        $stmt->send_long_data(2, $imageData); // Send image data

        if ($stmt->execute()) {
            $popupMessage = "Your Application Number: " . $uniqueAppNumber;
        } else {
            $popupMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $popupMessage = "You need to be at least 18 years old to register.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Registration</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/background/back.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            margin: 20px;
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
            width: 600px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-btn {
            background: #f44336;
            color: #fff;
            border: none;
            padding: 5px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #d32f2f;
        }

        form {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   <a href="home.php">HOME</a>
  <a href="admin_login.php">ADMIN LOGIN</a>
  <a href="candidate_login.php">KNOW YOUR STATUS</a>
  <a href="about.php">ABOUT</a>
  <a href="contact.html">CONTACT</a>
  
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div id="head" class="head">
<h2 style="text-align:center;">Candidate Registration Form</h2>

<form id="registrationForm" method="POST" action="" enctype="multipart/form-data">
    <label>Select Election:</label>
    <select name="election_id" required>
        <?php if ($elections->num_rows > 0): ?>
            <?php while ($row = $elections->fetch_assoc()): ?>
                <option value="<?php echo $row['e_id']; ?>"><?php echo $row['election_name']; ?></option>
            <?php endwhile; ?>
        <?php else: ?>
            <option>No Elections Available</option>
        <?php endif; ?>
    </select>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" title="Enter a valid name" required>

    <label for="image">Choose an image:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="mobile">Mobile Number:</label>
    <input type="tel" id="mobile" name="mob" pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="mail" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="add" required>

    <button name="submit" type="submit">Register</button>
</form>

<?php if (isset($popupMessage)): ?>
    <div class='popup-container' id='popup'>
        <div class='popup-card'>
            <h3>Online Voting System</h3>
            <p><?php echo $popupMessage; ?></p>
            <button class='close-btn' onclick='redirectToPage()'>Close</button>
        </div>
    </div>
<?php endif; ?>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  
}
</script>  
<script>
document.addEventListener('DOMContentLoaded', function () {
    var popup = document.getElementById('popup');
    if (popup) {
        popup.style.display = 'flex';
    }
});

function redirectToPage() {
    window.location.href = 'candidate_reg.php';
}
</script>

</body>
</html>

