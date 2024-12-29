<?php
// Database connection settings for XAMPP
$host = 'localhost';
$username = 'root';
$password = ''; // No password for XAMPP by default
$dbname = 'care_compass'; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);

        // Execute the query and check if the insertion was successful
        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: Could not create account.');</script>";
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h1 class="text-center text-primary">Create an Account</h1>

    <!-- Sign-Up Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="signup.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Sign Up</button>
            </form>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="login.php" class="text-decoration-none">Sign in here</a></p>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Ensures the footer is always at the bottom of the page */
    html, body {
        height: 100%;
    }
    .container {
        min-height: 80vh; /* Ensures content takes up at least 80% of the height */
    }
    footer {
        position: relative;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
    }
</style>
