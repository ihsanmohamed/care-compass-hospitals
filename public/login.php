<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h1 class="text-center text-primary">Sign In to Your Account</h1>
    
    <!-- Sign In Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="login_process.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>

            <div class="text-center mt-3">
                <p>Don't have an account? <a href="signup.php" class="text-decoration-none">Sign up here</a></p>
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