<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get user data from session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<?php include('../includes/header.php'); ?>

<!-- Dashboard Section -->
<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Dashboard</h1>
    
    <!-- Welcome Message -->
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h3>Welcome, <?php echo $username; ?>!</h3>
            <p class="lead">You are logged in as <strong><?php echo $role; ?></strong>.</p>
            
            <hr>
            
            <!-- Role-based Features Section -->
            <?php if ($role == 'admin'): ?>
                <div class="alert alert-success">
                    <h5>Admin Features</h5>
                    <ul>
                        <li>Manage users</li>
                        <li>View system reports</li>
                        <li>Manage settings</li>
                    </ul>
                </div>
            <?php elseif ($role == 'staff'): ?>
                <div class="alert alert-info">
                    <h5>Staff Features</h5>
                    <ul>
                        <li>View patient records</li>
                        <li>Manage appointments</li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    <h5>Guest Features</h5>
                    <ul>
                        <li>View general information</li>
                    </ul>
                </div>
            <?php endif; ?>

            <hr>

            <!-- Circle Statistics -->
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="rounded-circle bg-info text-white p-4" style="font-size: 2rem;">
                        150
                    </div>
                    <h5>Total Appointment</h5>
                </div>
                <div class="col-md-3 text-center">
                    <div class="rounded-circle bg-success text-white p-4" style="font-size: 2rem;">
                        75
                    </div>
                    <h5>Active Sessions</h5>
                </div>
                <div class="col-md-3 text-center">
                    <div class="rounded-circle bg-warning text-white p-4" style="font-size: 2rem;">
                        5
                    </div>
                    <h5>Pending Appoinment</h5>
                </div>
            </div>

            <hr>

            <!-- Example Table -->
            <h4>Recent User Activity</h4>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>john_doe</td>
                        <td>Admin</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>jane_smith</td>
                        <td>Staff</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>mike_jones</td>
                        <td>Staff</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>lucy_king</td>
                        <td>Admin</td>
                        <td>Active</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- Logout Button -->
            <div class="text-center">
               
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<?php include('../includes/footer.php'); ?>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom CSS -->
<style>
    /* Optional: Style for Dashboard sections */
    .alert {
        margin-top: 20px;
    }
    .btn-lg {
        margin-top: 20px;
    }

    /* Circle styling */
    .rounded-circle {
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 2rem;
    }

    /* Styling the Table */
    .table th, .table td {
        text-align: center;
    }

    .table-dark {
        background-color: #343a40;
        color: white;
    }

    /* Ensure the table has nice spacing */
    .table-bordered {
        margin-top: 20px;
    }

    /* Adjust the width of the circle stats */
    .col-md-3 {
        margin-bottom: 30px;
    }
</style>
