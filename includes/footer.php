<!-- footer.php -->
<footer class="site-footer">
    <div class="footer-container">
        <!-- Company Info Section -->
        <div class="footer-info">
            <p>&copy; 2024 Care Compass Hospitals. All rights reserved.</p>
        </div>

        <!-- Footer Links Section -->
        <div class="footer-links">
            <a href="privacy.php" class="footer-link">Privacy Policy</a> | 
            <a href="terms.php" class="footer-link">Terms of Service</a>
        </div>
<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Social Media Section -->
<div class="footer-social">
    <a href="#" class="social-link" aria-label="Facebook" target="_blank">
        <i class="bi bi-facebook fs-3"></i>
    </a>
    <a href="#" class="social-link" aria-label="Twitter" target="_blank">
        <i class="bi bi-twitter fs-3"></i>
    </a>
    <a href="#" class="social-link" aria-label="Instagram" target="_blank">
        <i class="bi bi-instagram fs-3"></i>
    </a>
</div>

    </div>
</footer>

<!-- Link to external JS -->
<script src="../assets/js/main.js"></script>
</body>
</html>

<style>
/* Footer Styles */
.site-footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.footer-info,
.footer-links,
.footer-social {
    margin: 10px 0;
}

.footer-info p {
    font-size: 14px;
}

.footer-links a,
.footer-social a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

.footer-links a:hover,
.footer-social a:hover {
    color: #00b4d8;
}

/* Footer Links */
.footer-links a {
    font-size: 14px;
}

.footer-links a:hover {
    text-decoration: underline;
}

/* Social Media Icons */
.footer-social {
    display: flex;
    justify-content: center;
}

.footer-social a {
    margin: 0 15px;
    transition: transform 0.3s ease;
}

.footer-social a:hover {
    transform: scale(1.1);
}

.footer-social img {
    width: 30px;
    height: 30px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-info,
    .footer-links,
    .footer-social {
        margin-bottom: 10px;
    }

    .footer-links a {
        display: block;
        margin: 5px 0;
    }

    .footer-social a {
        margin: 5px 0;
    }
}
</style>
