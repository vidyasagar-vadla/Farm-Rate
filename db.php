<?php
$host = 'localhost';  // Replace with your host name or IP address
$dbname = 'id22187732_agriculturedb1';  // Replace with your database name
$username = 'id22187732_root';  // Replace with your database username
$password = 'K@kL[T680N7Vhlm5';  // Replace with your database password

$dsn = "mysql:host=$host;dbname=$dbname";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Enable error handling
    PDO::ATTR_EMULATE_PREPARES   => false,  // Disable emulated prepared statements
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Set default fetch mode to associative array
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());  // Handle connection errors
}
?>
