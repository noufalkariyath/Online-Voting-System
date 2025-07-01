<?php
include 'db_connect.php';
session_start();
$username = $_SESSION['username2'];
$password = $_SESSION['password2'];

$sql = "SELECT * FROM user_details WHERE user = '$username' AND pass ='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $name = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
        border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #393b60;
            color: white;
            text-align: center;
        }

        .profile-img {
            display: block;
            margin: 10px auto;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid black;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
        body  {   background-image: url('assets/background/back_violet.jpg'); height: 100vh; background-repeat: norepeat; width: 100%; background-size: cover;
}
    </style>
</head>
<body>

    <table>
        <tr>
            <th colspan="2">Voter Profile</th>
        </tr>
        <tr>
            <td><strong>VOTER ID:</strong></td>
            <td><?php echo $name['voter_id']; ?></td>
        </tr>
        <tr>
            <td><strong>NAME:</strong></td>
            <td><?php echo $name['name']; ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <?php
                $imageData = $name['image'];
                echo "<img src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Profile Image' class='profile-img'>";
                ?>
            </td>
        </tr>
        <tr>
            <td><strong>USERNAME:</strong></td>
            <td><?php echo $name['user']; ?></td>
        </tr>
        <tr>
            <td><strong>DOB:</strong></td>
            <td><?php echo $name['dob']; ?></td>
        </tr>
        <tr>
            <td><strong>GENDER:</strong></td>
            <td><?php echo $name['gender']; ?></td>
        </tr>
        <tr>
            <td><strong>MOBILE NO.:</strong></td>
            <td><?php echo $name['mob']; ?></td>
        </tr>
        <tr>
            <td><strong>EMAIL ID:</strong></td>
            <td><?php echo $name['email']; ?></td>
        </tr>
        <tr>
            <td><strong>ADDRESS:</strong></td>
            <td><?php echo $name['addr']; ?></td>
        </tr>
    </table>

    <a href="voter_dash.php" class="back-link">Back</a>

</body>
</html>

