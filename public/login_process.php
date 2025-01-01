<?php
// Include the database connection file
require_once '../config/dbconnect.php';

// Start the session to track login status
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL Injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Query to fetch the user based on the email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to the dashboard or another page
            header("Location: appoinment-list.php");
            exit();
        } else {
            // Password is incorrect
            $_SESSION['error'] = "Invalid password. Please try again.";
            header("Location: login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "No account found with that email.";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>
