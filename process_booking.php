<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configure the SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'swirlycarwash@gmail.com';
$mail->Password = 'iall kxkt wzcf oasa'; // Use the App Password generated for your Gmail account
$mail->Port = 587; // Port 587 is for TLS, 465 for SSL
$mail->SMTPSecure = 'tls'; // Use 'ssl' if you prefer SSL encryption

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $time = $_POST["time"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Set email sender and recipient
    $mail->setFrom('swirlycarwash@gmail.com', 'Tomas Rubio');
    $mail->addAddress('swirlycarwash@gmail.com', 'Tomas Rubio'); // You can use the same address for both sender and recipient

    // Set email subject and body
    $mail->Subject = "New Car Wash Booking";
    $mail->Body = "Date: $date\nTime: $time\nName: $name\nEmail: $email";

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully';
    } else {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

    // You can also redirect the user to a "Thank You" page.
    header("Location: thank_you.html");
}
?>
