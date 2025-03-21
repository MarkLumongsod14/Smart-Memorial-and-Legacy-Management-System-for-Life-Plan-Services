<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Plan Services - Life Plans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/lifeplans_styles.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/footer.css">

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
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4">Our Life Plans</h1>

        <!-- Life Plan Cards -->
        <div class="row">
            <!-- Life Plan A -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/1.png" alt="Life Plan A" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan A</h5>
                        <p class="card-text">Contract Price: P100,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="A">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Life Plan B -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/2.png" alt="Life Plan B" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan B</h5>
                        <p class="card-text">Contract Price: P150,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="B">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Life Plan C -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/3.png" alt="Life Plan C" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan C</h5>
                        <p class="card-text">Contract Price: P200,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="C">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Life Plan D -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/4.png" alt="Life Plan D" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan D</h5>
                        <p class="card-text">Contract Price: P250,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="D">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Life Plan E -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/5.png" alt="Life Plan E" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan E</h5>
                        <p class="card-text">Contract Price: P300,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="E">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Life Plan F -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="images/6.png" alt="Life Plan F" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Life Plan F</h5>
                        <p class="card-text">Contract Price: P350,000</p>
                        <div class="d-flex justify-content-between">
                            <button class="view-details" data-plan="F">View Details</button>
                            <button class="buy-now">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
       




    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-lg p-5" style="max-width: 500px; width: 90%;">
            <span class="close text-gray-600 hover:text-gray-900 cursor-pointer text-2xl">&times;</span>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Checkout</h2>
            <p class="text-gray-600 mb-4">Confirm your purchase for <span id="selectedPlan" class="font-semibold text-primary"></span></p>

            <!-- Full Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                <input type="text" id="name" placeholder="Enter your name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
            </div>

            <!-- Email Address Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" placeholder="Enter your email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
            </div>

            <!-- Payment Method Dropdown -->
            <div class="mb-6">
                <label for="payment" class="block text-gray-700 font-medium mb-2">Payment Method</label>
                <select id="payment" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="cash">Cash</option>

                    <option value="credit_card">Debit/Credit Card</option>
                </select>
            </div>

            <!-- Confirm Purchase Button -->
            <button id="confirmPurchase" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary-dark transition duration-300">
                Confirm Purchase
            </button>
        </div>
    </div>

    <!-- View Details Modal -->
    <div id="viewDetailsModal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-lg p-5" style="max-width: 500px; width: 90%;">
            <span class="close text-gray-600 hover:text-gray-900 cursor-pointer text-2xl">&times;</span>
            <p class="text-gray-600 mb-4">Here are the details for <span id="selectedPlanName" class="font-semibold text-primary"></span></p>

            <!-- Plan Details -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Coverage</h3>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Memorial Services</li>
                    <li>Burial Arrangements</li>
                    <li>Financial Assistance</li>
                </ul>
            </div>

            <!-- Payment Options -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Payment Options</h3>
                <ul class="list-disc list-inside text-gray-600">
                    <li>One-Time Full Payment (5% Discount)</li>
                    <li>12-Month Installment Plan (0% Interest)</li>
                    <li>24-Month Installment Plan (2% Interest)</li>
                </ul>
            </div>

            <!-- Close Button -->
            <button id="closeDetails" class="w-full bg-gray-200 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-300 transition duration-300">
                Close
            </button>
        </div>
    </div>
    
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


  

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("checkoutModal");
            const closeModal = document.querySelector(".close");
            const confirmPurchase = document.getElementById("confirmPurchase");

            // Get all "Buy Now" buttons
            const buyButtons = document.querySelectorAll(".buy-now");
            buyButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const planCard = this.closest(".card");
                    const planName = planCard.querySelector(".card-title")?.innerText || "Unknown Plan";
                    document.getElementById("selectedPlan").innerText = planName;
                    modal.style.display = "flex";
                });
            });

            // Close modal when clicking "X"
            closeModal.addEventListener("click", function () {
                modal.style.display = "none";
            });

            // Confirm purchase (For now, just close the modal)
            confirmPurchase.addEventListener("click", function () {
                alert("Your purchase has been confirmed!");
                modal.style.display = "none";
            });

            // Close modal if clicking outside
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
        });
        document.addEventListener("DOMContentLoaded", function () {
            const viewDetailsModal = document.getElementById("viewDetailsModal");
            const closeDetailsModal = document.querySelector("#viewDetailsModal .close");
            const closeDetailsButton = document.getElementById("closeDetails");

            // Get all "View Details" buttons
            const viewDetailsButtons = document.querySelectorAll(".view-details");
            viewDetailsButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const planCard = this.closest(".card");
                    const planName = planCard.querySelector(".card-title")?.innerText || "Unknown Plan";
                    document.getElementById("selectedPlanName").innerText = planName;

                    // Show modal
                    viewDetailsModal.style.display = "flex";
                });
            });

            // Close modal when clicking "X"
            closeDetailsModal.addEventListener("click", function () {
                viewDetailsModal.style.display = "none";
            });

            // Close modal when clicking "Close" button
            closeDetailsButton.addEventListener("click", function () {
                viewDetailsModal.style.display = "none";
            });

            // Close modal if clicking outside
            window.onclick = function (event) {
                if (event.target === viewDetailsModal) {    
                    viewDetailsModal.style.display = "none";
                }
            };
        });
         // Sidebar Toggle Script
         document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>