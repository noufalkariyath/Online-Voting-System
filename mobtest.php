<?php
$to = "shahilabbas76@gmail.com";
$subject = "Test Email";
$message = "This is a test email.";
$headers = "From: no-reply@yourwebsite.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
