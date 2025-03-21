<?php
session_start();
include 'config.php'; // Include your database configuration if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Life Plan Services</title>
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

    <!-- FAQ Section -->
    <div class="container faq-container">
        <h1 class="text-center mb-4">Frequently Asked Questions (FAQ)</h1>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ Item 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-question-circle"></i> What is Life Plan Services?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Life Plan Services is a platform that helps you secure your future and protect your loved ones by creating and managing life plans, including messages, documents, and financial arrangements.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fas fa-question-circle"></i> How do I create a life plan?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        To create a life plan, log in to your account, go to the "Create Message" section, and follow the steps to compose your message, schedule delivery, and add recipients.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fas fa-question-circle"></i> Can I edit or delete a scheduled message?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, you can edit or delete a scheduled message before it is sent. Go to the "View Messages" section, select the message, and choose the appropriate action.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="fas fa-question-circle"></i> How secure is my data?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Your data is encrypted and stored securely. We use industry-standard security measures to protect your information.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="fas fa-question-circle"></i> What happens if I forget to check in?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        If you fail to check in within the specified period, your scheduled messages will be automatically delivered to the designated recipients.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page_footer text-center text-md-left bg py-5">
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