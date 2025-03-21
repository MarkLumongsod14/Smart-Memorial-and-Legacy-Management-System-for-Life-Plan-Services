<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Plan Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/homepage_styles.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/sidebar.css"> <!-- Add sidebar CSS -->
</head>
<body class="bg-gradient">

<!-- Toggle Button -->
<button class="toggle-btn" id="toggleBtn">☰</button>

<!-- Floating Sidebar -->
<div class="sidebar" id="sidebar">
    <a href="homepage.php">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="lifeplans.php">
        <i class="fas fa-heart"></i>
        <span>Life Plans</span>
    </a>
    <a href="profile.php">
        <i class="fas fa-user-alt"></i>
        <span>Profile</span>
    </a>
    <a href="sitemap.php">
        <i class="fas fa-map"></i>
        <span>Sitemap</span>
    </a>
    <a href="gravemap.php">
        <i class="fas fa-map-marker-alt"></i>
        <span>Gravemap</span>
    </a>
    <a href="dashboard.php">
        <i class="fas fa-envelope"></i>
        <span>Lost Letter</span>
    </a>
    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</div>

    <!-- Hero Section -->
    <header class="hero-section text-white text-center" style="background-image: url('images/sky.jpg');">
        <div class="overlay"></div>
        <div class="hero-content container">
            <!-- Toggle Button -->
            <h1 class="display-4 font-weight-bold mb-4">SECURE TOMORROW, TODAY</h1>
            <p class="lead mb-5">Plan ahead and give your loved ones peace of mind.</p>
            <a class="btn btn-light btn-lg px-5 py-3 shadow" href="lifeplans.php">Explore Plans</a>
        </div>
    </header>

    <!-- Main Content -->
    <section class="main-content py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image on the Left -->
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <div class="image-container">
                        <img src="images/family.jpg" alt="Life Plan Services" class="img-fluid rounded shadow-lg">
                    </div>
                </div>

                <!-- Paragraph on the Right -->
                <div class="col-12 col-lg-6 pl-lg-5">
                    <h3 class="special-heading font-weight-bold mb-4">
                        <span class="color-main">Secure Your Future,</span> Protect Your Loved Ones
                    </h3>
                    <p class="text-muted mb-4">
                        Life is unpredictable, but your loved ones' future doesn’t have to be. Our comprehensive life plan services are designed to provide you and your family with the security and peace of mind you deserve. From personalized financial planning to compassionate end-of-life arrangements, we tailor our services to meet your unique needs. Let us help you safeguard your family’s tomorrow, so you can focus on enjoying today.
                    </p>
                    <div class="text-center text-lg-left">
                        <a class="btn btn-primary btn-lg px-5 py-3 shadow" href="lifeplans.php">
                            Explore Our Services <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title mb-4">Our Features</h2>
            <p class="section-subtitle mb-5">Providing peace of mind with our comprehensive services.</p>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow rounded">
                        <div class="item-media rounded-10 mb-3">
                            <img src="images/life.jpg" alt="Secure Life Plans" class="img-fluid rounded" style="height: 200px; width: 100%; object-fit: cover;">
                        </div>
                        <h3>Secure Life Plans</h3>
                        <p>Choose the right life plan for you and your loved ones.</p>
                        <a href="lifeplans.php" class="btn btn-outline-primary">View Plans</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow rounded">
                        <div class="item-media rounded-10 mb-3">
                            <img src="images/grave.jpg" alt="Grave" class="img-fluid rounded" style="height: 200px; width: 100%; object-fit: cover;">
                        </div>
                        <h3>Locate Graves</h3>
                        <p>Help you seamlessly search and visit your loved ones.</p>
                        <a href="sitemap.php" class="btn btn-outline-primary">Get Help</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow rounded">
                        <div class="item-media rounded-10 mb-3">
                            <img src="images/writing.jpg" alt="Lost Letters" class="img-fluid rounded" style="height: 200px; width: 100%; object-fit: cover;">
                        </div>
                        <h3>Lost Letters</h3>
                        <p>Leave heartfelt messages for your loved ones.</p>
                        <a href="dashboard.php" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works py-5 ">
        <div class="container text-center">
            <h2 class="section-title mb-4">How It Works</h2>
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <i class="fas fa-search fa-3x text-primary mb-3"></i>
                    <h4>Choose a Plan</h4>
                    <p>Explore various life plan options suited for your needs.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-file-signature fa-3x text-primary mb-3"></i>
                    <h4>Sign Up</h4>
                    <p>Register online and complete your application in minutes.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                    <h4>Peace of Mind</h4>
                    <p>Secure your future and protect your loved ones with ease.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image on the Left -->
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <div class="image-container">
                        <img src="https://prycegardens.com/images/img-02.png" alt="Pryce Gardens" class="img-fluid rounded shadow-lg">
                    </div>
                </div>

                <!-- Content on the Right -->
                <div class="col-12 col-lg-6">
                    <h3 class="special-heading mb-4">
                        <span class="color-main">Experience</span> the Difference
                    </h3>
                    <p class="text-muted mb-4">
                        Having established itself long ago as Mindanao's prestigious funeral garden, Pryce Gardens Memorial Parks is truly a place like no other.
                    </p>

                    <!-- Media Item 1 -->
                    <div class="media mb-4">
                        <div class="icon-styled color-main fs-40 mr-4">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-0">Plan Ahead - Protects Your Family</h5>
                            <p class="text-muted">
                                Spare your loved ones from anxiety and trouble at a time of grief. Give them peace of mind, security, and protection from emotional overspending—easing their pain, and offering them your gift of love and care.
                            </p>
                        </div>
                    </div>

                    <!-- Media Item 2 -->
                    <div class="media mb-4">
                        <div class="icon-styled color-main fs-40 mr-4">
                            <i class="fas fa-heart fa-2x"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-0">Protects Your Wishes</h5>
                            <p class="text-muted">
                                By making this decision today, your family knows what you want, and have the means to meet your desire. You will also have the satisfaction of knowing everything is in place.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5 ">
        <div class="container text-center">
            <h2 class="section-title mb-4">What Our Clients Say</h2>
            <p class="section-subtitle mb-5">Hear from our satisfied clients about their experiences.</p>
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="testimonial-card p-4">
                            <blockquote class="blockquote">
                                <p class="mb-4">"This service gave my family peace of mind. Highly recommended!"</p>
                                <footer class="blockquote-footer">Jane Doe</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="testimonial-card p-4 ">
                            <blockquote class="blockquote">
                                <p class="mb-4">"The claim process was smooth and stress-free. Thank you!"</p>
                                <footer class="blockquote-footer">John Smith</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="page_footer text-center text-md-left bg-white py-5">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_text">
                        <a href="homepage.php" class="logo d-flex align-items-center mb-3">
                            <img src="images/logo.png" alt="Life Plan Services Logo" class="img-fluid">
                            <h4 class="logo-text color-main ml-2">Life Plan Services</h4>
                        </a>
                       
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_working_hours">
                        <h3 class="mb-4">Office Hours</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Monday - Friday</span>
                                    <span class="text-muted">8AM - 5PM</span>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Saturday</span>
                                    <span class="text-muted">9AM - 1PM</span>
                                </div>
                            </li>
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

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_links">
                        <h3 class="mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="faq.php" class="text-muted">FAQ</a></li>
                            <li class="mb-2"><a href="privacy.php" class="text-muted">Privacy Policy</a></li>
                            <li class="mb-2"><a href="tnc.php" class="text-muted">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Sidebar Toggle Script
        document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });

        // Testimonial Carousel Script
        var myCarousel = document.querySelector('#testimonialCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000, // Auto-slide every 5 seconds
            wrap: true // Infinite loop
        });
    </script>
</body>
</html>