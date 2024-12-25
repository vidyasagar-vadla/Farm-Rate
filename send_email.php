<?php
session_start(); // Start the session

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $otp = $_POST['otp']; // Get generated OTP from form data

    // Store the OTP in session
    $_SESSION['otp'] = $otp;

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'empoweringfarmers6656@gmail.com'; // SMTP username
        $mail->Password = 'ouwf ixfu ctiu tzzm'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('empoweringfarmers6656@gmail.com', 'empoweringfarmers');
        $mail->addAddress($email, $name); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'OTP for Verification';
        $mail->Body    = "Hello $name,<br><br>Your OTP for verification is: <strong>$otp</strong><br><br>Please enter this OTP on the verification page.";

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'OTP sent to Email successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>