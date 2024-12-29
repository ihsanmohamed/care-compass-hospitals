<?php
session_start();
include('../includes/dbconnect.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple query to check user credentials (assuming you have a users table)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        // User found, start session and redirect
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        // User not found, show error message
        echo "<p>Invalid username or password.</p>";
    }
}
?>
