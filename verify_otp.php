<?php
session_start(); // Start the session

header('Content-Type: application/json'); // Set content type to JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['otp'])) {
        $enteredOTP = $input['otp'];
        $actualOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;

        if ( $enteredOTP === $actualOTP) {
            echo json_encode(['success' => true, 'message' => 'OTP verified successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid OTP! Please try again.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'OTP not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
