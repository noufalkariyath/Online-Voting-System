<?php
if(mail('test@example.com', 'Test Subject', 'Test Message')) {
    echo 'Email sent successfully';
} else {
    echo 'Email sending failed';
}
?>

