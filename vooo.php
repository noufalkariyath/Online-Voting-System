<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Message in Card</title>
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
    <h2>Click the Button to Show a Message</h2>
    <form method="POST">
        <button type="submit" name="showMessage">Show Message</button>
    </form>

    <?php
    if (isset($_POST['showMessage'])) {
        echo "<div class='popup-container' id='popup'>";
        echo "    <div class='popup-card'>";
        echo "        <h3>Online Voting System</h3><br>";
        echo "        <p>! YOU HAVE ALREADY VOTED !</p><br>";
        echo "        <button class='close-btn' onclick='redirectToPage()'>Close</button>";
        echo "    </div>";
        echo "</div>";
    }
    ?>

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
            window.location.href = 'voter_dash.php'; // Replace with your desired page
        }
    </script>
</body>
</html>
