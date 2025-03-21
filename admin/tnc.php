<?php
session_start();
include 'config.php'; // Include your database configuration if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Life Plan Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/faq_styles.css">
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

    <!-- Terms and Conditions Section -->
    <div class="container faq-container">
        <h1 class="text-center mb-4">Terms and Conditions</h1>
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#termsContent" aria-expanded="true" aria-controls="termsContent">
                        <i class="fas fa-file-contract"></i> Terms of Use
                    </button>
                </h2>
            </div>
            <div id="termsContent" class="collapse show">
                <div class="card-body">
                    <h3>1. Acceptance of Terms</h3>
                    <p>By accessing or using Life Plan Services, you agree to comply with and be bound by these Terms and Conditions. If you do not agree, please do not use our services.</p>

                    <h3>2. Eligibility</h3>
                    <p>You must be at least 18 years old or have legal capacity to use our services. By using our platform, you confirm that you meet these requirements.</p>

                    <h3>3. User Responsibilities</h3>
                    <p>You are responsible for maintaining the confidentiality of your account and password. You agree to notify us immediately of any unauthorized access or breach of security.</p>

                    <h3>4. Intellectual Property</h3>
                    <p>All content on this platform, including text, graphics, logos, and software, is the property of Life Plan Services and is protected by intellectual property laws.</p>

                    <h3>5. Limitation of Liability</h3>
                    <p>Life Plan Services is not liable for any indirect, incidental, or consequential damages arising from your use of our platform.</p>

                    <h3>6. Changes to Terms</h3>
                    <p>We reserve the right to modify these Terms at any time. Your continued use of the platform constitutes acceptance of the updated Terms.</p>

                    <h3>7. Governing Law</h3>
                    <p>These Terms are governed by the laws of [Your Country/State]. Any disputes will be resolved in the courts of [Your Jurisdiction].</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page_footer text-center text-md-left py-5">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_text">
                        <a href="homepage.php" class="logo d-flex align-items-center mb-3">
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