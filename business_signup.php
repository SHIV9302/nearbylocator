<?php
session_start(); // Start the session

// Include the database connection
include 'db.php'; // Ensure your database connection is included

// Get the posted data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$business_name = $_POST['business_name'];
$business_type = $_POST['business_type'];
$business_location = $_POST['business_location'];
$opening_hours = $_POST['opening_hours'];
$closing_hours = $_POST['closing_hours'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO users (username, password, user_type, business_name, business_type, business_location, email_id, opening_hours, closing_hours) 
VALUES ('$username', '$hashed_password', 'business_owner', '$business_name', '$business_type', '$business_location', '$email', '$opening_hours', '$closing_hours')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: login.html"); // Redirect to login page after successful signup
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
