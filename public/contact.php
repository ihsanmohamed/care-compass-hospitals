<?php
// Start session and check if the user is logged in (optional)
session_start();

include('../includes/navbar.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email address.";
    } else {
        // Send email (using mail() function or a library like PHPMailer)
        $to = "contact@carecompass.com";
        $subject = "Contact Form Message from $name";
        $body = "You have received a new message from the contact form.\n\nName: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";
        
        if (mail($to, $subject, $body, $headers)) {
            $success_message = "Thank you for contacting us! We will get back to you shortly.";
        } else {
            $error_message = "There was an issue sending your message. Please try again later.";
        }
    }
}
?>

<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Contact Us</h1>
    <p class="lead text-center mb-5">If you have any questions or need more information about our services, feel free to reach out to us. Our team is here to assist you.</p>
    
    <!-- Display success or error message -->
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <!-- Contact Form -->
    <form action="contact.php" method="POST">
        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <div class="mb-4">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>

    <!-- Contact Information -->
    <section class="mt-5">
        <h2 class="text-center text-primary mb-4">Our Contact Information</h2>
        <ul class="list-unstyled">
            <li><strong>Email:</strong> <a href="mailto:contact@carecompass.com">contact@carecompass.com</a></li>
            <li><strong>Phone:</strong> +1 234 567 890</li>
            <li><strong>Address:</strong> 123 Health St, City, Country</li>
        </ul>
    </section>
</div>

<?php include('../includes/footer.php'); ?>

<!-- Custom Styles -->
<style>
    /* Ensure footer is always at the bottom of the page */
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

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
    }

    /* Optional custom button styles */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
