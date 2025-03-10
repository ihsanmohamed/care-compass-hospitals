<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="index.php">Care Compass Hospitals</a>
        
        <!-- Navbar Toggler (for mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Welcome Section -->
<div class="container my-5 pt-5">
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-lg-6 col-md-8">
            <h1 class="display-3 text-primary fw-bold mb-4 animated fadeIn">Welcome to Care Compass Hospitals</h1>
            <p class="lead mb-4 text-muted animated fadeIn delay-1s">Your health, our priority. We provide top-quality healthcare services with the latest technology and compassionate care. We are dedicated to serving our community with professionalism and kindness.</p>
            
            <!-- Get Started Button -->
            <a href="login.php" class="btn btn-lg btn-success px-5 py-3 rounded-pill shadow-lg animated fadeIn delay-2s">Get Started</a>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php include('../includes/footer.php'); ?>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom CSS to position footer at the bottom and enhance the layout -->
<style>
    /* Ensures the footer is always at the bottom of the page */
    html, body {
        height: 100%;
        margin: 0;
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
        padding: 0px 0;
    }

    /* Background Image for the whole page */
    body {
        background: url('../assets/images/aHR0cHM6Ly9iLnN0YWJsZWNvZy5jb20vMGZjODNhZmItNDZkYi00YzY2LTlkYzktNWY3NzlhNTM0YTI5LmpwZWc.webp') no-repeat center center fixed;
        background-size: cover;
        color: white;
        position: relative;
    }

    /* Overlay for a darker background */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Dark overlay */
        z-index: 1;
    }

    /* Styling for the heading */
    .display-3 {
        font-weight: 700;
        color: #0d6efd;
        z-index: 2;
    }

    /* Shadow effect on the Get Started button */
    .btn-success {
        background-color: #28a745;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-success:active {
        background-color: #1e7e34;
    }

    /* Animation for fade-in effect */
    .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .fadeIn {
        animation-name: fadeIn;
    }

    .fadeIn.delay-1s {
        animation-delay: 1s;
    }

    .fadeIn.delay-2s {
        animation-delay: 2s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Responsive and stylish text for mobile view */
    @media (max-width: 767px) {
        .display-3 {
            font-size: 2.5rem;
        }
        
        .lead {
            font-size: 1.1rem;
        }
    }
</style>


