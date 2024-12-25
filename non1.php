<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password is empty
$dbname = "agriculturedb1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$platformname = $_POST['platformname'];
$cropselection = $_POST['cropselection'];
$price = $_POST['price'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO crops (platformname, cropselection, price) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $platformname, $cropselection, $price);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to success page
    header("Location: thankyou.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
