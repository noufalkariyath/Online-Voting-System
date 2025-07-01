<?php
$to = "your-email@example.com"; // Replace with your email
$subject = "Test Email";
$message = "This is a test email.";
$headers = "From: no-reply@yourwebsite.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed.";
}
?>

