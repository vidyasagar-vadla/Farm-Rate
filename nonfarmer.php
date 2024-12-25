<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "agriculturedb1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $state = $_POST['state'] ?? null;
    $district = $_POST['district'] ?? null;
    $mandal = $_POST['mandal'] ?? null;
    

    $sql = "INSERT INTO nonfarmer (user_type, name, email, state, district, mandal)
            VALUES ('$user_type', '$name', '$email', '$state', '$district', '$mandal')";

    if ($conn->query($sql) === TRUE) {
        
            header("Location: nonfarmer.html");
        }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
