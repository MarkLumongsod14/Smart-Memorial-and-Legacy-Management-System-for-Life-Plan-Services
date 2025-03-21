<?php
session_start();
include 'config.php'; // Include your database configuration if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Life Plan Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/privacy_styles.css">
</head>
<body class="bg-gradient">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Privacy Policy Section -->
    <div class="container privacy-container">
        <h1 class="text-center mb-4">Privacy Policy</h1>
        <div class="privacy-content">
            <p>At Life Plan Services, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our services.</p>

            <h3>1. Information We Collect</h3>
            <p>We may collect the following types of information:</p>
            <ul>
                <li><strong>Personal Information:</strong> Name, email address, phone number, and other contact details.</li>
                <li><strong>Usage Data:</strong> Information about how you use our website and services.</li>
                <li><strong>Technical Data:</strong> IP address, browser type, and device information.</li>
            </ul>

            <h3>2. How We Use Your Information</h3>
            <p>We use your information for the following purposes:</p>
            <ul>
                <li>To provide and maintain our services.</li>
                <li>To improve and personalize your experience.</li>
                <li>To communicate with you about updates, promotions, and support.</li>
                <li>To comply with legal obligations.</li>
            </ul>

            <h3>3. Data Security</h3>
            <p>We implement industry-standard security measures to protect your data, including encryption and secure servers. However, no method of transmission over the internet is 100% secure.</p>

            <h3>4. Sharing Your Information</h3>
            <p>We do not sell or share your personal information with third parties except:</p>
            <ul>
                <li>With your consent.</li>
                <li>To comply with legal requirements.</li>
                <li>To protect our rights and property.</li>
            </ul>

            <h3>5. Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li>Access and update your personal information.</li>
                <li>Request deletion of your data.</li>
                <li>Opt-out of marketing communications.</li>
            </ul>

            <h3>6. Changes to This Policy</h3>
            <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and we will notify you of significant updates.</p>

            <h3>7. Contact Us</h3>
            <p>If you have any questions about this Privacy Policy, please contact us at:</p>
            <p><strong>Email:</strong> <a href="mailto:info@lifeplanservices.com">info@lifeplanservices.com</a></p>
            <p><strong>Phone:</strong> +639123456789</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page_footer text-center text-md-left py-5">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_text">
                        <a href="index.php" class="logo d-flex align-items-center mb-3">
                            <img src="images/logo.png" alt="Life Plan Services Logo" class="img-fluid" style="max-height: 50px;">
                            <h4 class="logo-text color-main ml-2">Life Plan Services</h4>
                        </a>
                        <p class="text-muted">
                            Life Plan Services helps you secure your future and protect your loved ones with comprehensive life plans tailored to your needs.
                        </p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_links">
                        <h3 class="mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="faq.php" class="text-muted">FAQ</a></li>
                            <li class="mb-2"><a href="privacy.php" class="text-muted">Privacy Policy</a></li>
                            <li class="mb-2"><a href="terms.php" class="text-muted">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_icons_list">
                        <h3 class="mb-4">Contact Us</h3>
                        <div class="media mb-3">
                            <div class="icon-styled color-main fs-14 mr-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <p class="media-body text-muted">+639123456789</p>
                        </div>
                        <div class="media mb-3">
                            <div class="icon-styled color-main fs-14 mr-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <p class="media-body text-muted">
                                <a href="mailto:info@lifeplanservices.com" class="text-muted">info@lifeplanservices.com</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_social">
                        <h3 class="mb-4">Follow Us</h3>
                        <div class="social-icons">
                            <a href="https://www.facebook.com" class="text-muted mr-3"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com" class="text-muted mr-3"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.twitter.com" class="text-muted"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>