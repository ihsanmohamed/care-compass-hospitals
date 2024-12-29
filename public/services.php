<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">Our Services</h1>
        <p class="lead">We offer a full range of healthcare services to ensure your well-being.</p>
    </div>

    <!-- Services List -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- General Medicine -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-user-md fa-4x text-primary mb-3"></i>
                    <h5 class="card-title">General Medicine</h5>
                    <p class="card-text">We provide primary care and treat a wide range of health issues, focusing on preventative care and general health maintenance.</p>
                </div>
            </div>
        </div>

        <!-- Emergency Care -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-ambulance fa-4x text-danger mb-3"></i>
                    <h5 class="card-title">Emergency Care</h5>
                    <p class="card-text">Our emergency care services are available 24/7 to provide immediate care for critical injuries and health conditions.</p>
                </div>
            </div>
        </div>

        <!-- Pediatric Care -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-baby fa-4x text-warning mb-3"></i>
                    <h5 class="card-title">Pediatric Care</h5>
                    <p class="card-text">We provide compassionate care for children from infancy through adolescence, ensuring their physical and emotional well-being.</p>
                </div>
            </div>
        </div>

        <!-- Orthopedics -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-bone fa-4x text-success mb-3"></i>
                    <h5 class="card-title">Orthopedics</h5>
                    <p class="card-text">Our orthopedic specialists treat bone, joint, and muscle issues, providing rehabilitation and surgical options as necessary.</p>
                </div>
            </div>
        </div>

        <!-- Cardiology -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-heart fa-4x text-danger mb-3"></i>
                    <h5 class="card-title">Cardiology</h5>
                    <p class="card-text">We provide expert cardiac care, from preventive screenings to advanced treatments for heart conditions.</p>
                </div>
            </div>
        </div>

        <!-- Surgical Services -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <i class="fas fa-scalpel fa-4x text-info mb-3"></i>
                    <h5 class="card-title">Surgical Services</h5>
                    <p class="card-text">Our team of skilled surgeons provides a wide range of surgical services to treat various health conditions.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('../includes/footer.php'); ?>

<!-- Custom Styles -->
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

    /* Styling for the card icon and layout */
    .card-body i {
        color: #007bff;
    }

    /* Responsive design tweaks */
    @media (max-width: 767px) {
        .card-body {
            font-size: 0.9rem;
        }
        .card-title {
            font-size: 1.25rem;
        }
    }

    /* Bootstrap custom colors for icons */
    .text-primary { color: #007bff; }
    .text-danger { color: #e53e3e; }
    .text-warning { color: #f59e0b; }
    .text-success { color: #48bb78; }
    .text-info { color: #3b82f6; }
</style>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
