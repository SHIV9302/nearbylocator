<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
           
            header("Location: home.html");
            exit(); // echo "Login successful! Welcome!";
            // Start session, redirect to dashboard, etc.
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with this email!";
    }

//     header("Location: home.html");
//     exit();
// }
//  else
//   {
//     echo "Invalid password.";
// }
// }
//  else
//   {
// echo "No user found with that username.";
 }
    
    $stmt->close();
    $conn->close();

?>
