
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
    $acres = $_POST['acres'] ?? null;
    $crop_type = $_POST['crop_type'] ?? null;
    $investment = $_POST['investment'] ?? null;

    $sql = "INSERT INTO farmer (user_type, name, email, state, district, mandal, acres, crop_type, investment)
            VALUES ('$user_type', '$name', '$email', '$state', '$district', '$mandal', '$acres', '$crop_type', '$investment')";

  if ($conn->query($sql) === TRUE) {
      echo "REGISTERED SUCCESSFULLY";
        
            echo '<a href="collabration.html">click here</a>';
            exit();
        }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
