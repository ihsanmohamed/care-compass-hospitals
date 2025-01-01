<?php
// Assuming the form sends a message to the admin or stores it in a database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Example: You might store the message in the database or send an email.
    // For now, we're just echoing the data.

    echo "<h1>Message Sent!</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Message: $message</p>";
} else {
    echo "<p>Error: Invalid request.</p>";
}
?>
