<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from AJAX request
$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statement to prevent SQL injection
$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($hashed_password);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    // Verify password
    if (password_verify($password, $hashed_password)) {
        echo "valid"; // Success, redirect to dashboard
    } else {
        echo "invalid"; // Incorrect password
    }
} else {
    echo "invalid"; // Username not found
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
