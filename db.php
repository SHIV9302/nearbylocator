<?php
$host = 'localhost:3307';  // Your database host (usually localhost)
$dbname = 'user_auth'; // Your database name
$username = 'root';    // Your MySQL username
$password = '';        // Your MySQL password (leave empty if no password)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
