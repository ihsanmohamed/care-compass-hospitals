<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <!-- Heading Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary mb-4">About Care Compass Hospitals</h1>
        <p class="lead">At Care Compass Hospitals, we are dedicated to providing high-quality healthcare services to individuals and families. With state-of-the-art technology and compassionate care, we ensure that every patient receives the best possible treatment.</p>
    </div>

    <!-- Our Mission Section -->
    <section class="mb-5">
        <h2 class="text-primary">Our Mission</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>Our mission is to provide comprehensive healthcare that meets the needs of our community. We are committed to offering advanced treatments, providing compassionate care, and ensuring the well-being of all our patients.</p>
            </div>
            <div class="col-md-6">
                <img src="../assets/images/mission-image.jpg" class="img-fluid rounded" alt="Our Mission Image">
            </div>
        </div>
    </section>

    <!-- Our Vision Section -->
    <section class="mb-5">
        <h2 class="text-primary">Our Vision</h2>
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <p>To be a leading healthcare provider that sets the standard for excellence in patient care, innovative treatments, and medical research. We envision a future where our hospitals continue to be recognized for exceptional care, dedication to patient satisfaction, and a commitment to improving lives.</p>
            </div>
            <div class="col-md-6 order-md-1">
                <img src="../assets/images/vision-image.jpg" class="img-fluid rounded" alt="Our Vision Image">
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="mb-5">
        <h2 class="text-primary">Our Values</h2>
        <p>At Care Compass Hospitals, we are guided by the following core values:</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-heartbeat fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Compassion</h5>
                        <p class="card-text">We approach every patient with empathy and kindness, making their well-being our top priority.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-trophy fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Excellence</h5>
                        <p class="card-text">We strive for the highest standards in medical care, patient safety, and satisfaction.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-lg">
                    <div class="card-body">
                        <i class="fas fa-flask fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Innovation</h5>
                        <p class="card-text">We embrace the latest medical technologies and treatments to provide cutting-edge healthcare.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Doctors Section -->
    <section class="mb-5">
        <h2 class="text-primary">Meet Our Doctors</h2>
        <p class="mb-4">Our team of highly skilled and experienced doctors is here to provide the best care possible. From general practitioners to specialists, our medical staff works together to ensure a comprehensive approach to healthcare.</p>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Doctor 1 -->
            <div class="col">
                <div class="card shadow-sm border-light rounded">
                    <img src="../assets/images/doctor1.jpg" class="card-img-top" alt="Dr. John Doe">
                    <div class="card-body">
                        <h5 class="card-title">Dr. John Doe</h5>
                        <p class="card-text"><strong>Specialty:</strong> Cardiology</p>
                        <p class="card-text">Dr. John Doe is a renowned cardiologist with over 20 years of experience in treating heart conditions. He is dedicated to providing exceptional care to all his patients.</p>
                    </div>
                </div>
            </div>
            <!-- Doctor 2 -->
            <div class="col">
                <div class="card shadow-sm border-light rounded">
                    <img src="../assets/images/doctor2.jpg" class="card-img-top" alt="Dr. Jane Smith">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Jane Smith</h5>
                        <p class="card-text"><strong>Specialty:</strong> Orthopedics</p>
                        <p class="card-text">Dr. Jane Smith specializes in orthopedic surgeries and rehabilitation. With her expertise, she helps patients recover from musculoskeletal injuries and surgeries.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="services.php" class="btn btn-primary btn-lg">Learn More About Our Doctors</a>
        </div>
    </section>
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

    /* Bootstrap utility classes for spacing and color */
    .text-primary {
        color: #007bff !important;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Styling the doctor's profile images */
    .card-img-top {
        object-fit: cover;
        height: 200px;
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .list-group-item {
        font-size: 1rem;
    }

    /* Custom Styling for Icons in Values Section */
    .card-body i {
        color: #007bff;
        margin-bottom: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .card-body {
            font-size: 0.9rem;
        }

        .card-title {
            font-size: 1.125rem;
        }

        .lead {
            font-size: 1.1rem;
        }
    }
</style>

<!-- Include Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
