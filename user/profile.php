<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Plan Services - Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/profile_styles.css">
    <link rel="stylesheet" href="styles/sidebar.css">   

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

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="flex items-center gap-4">
            <img src="proficon.png" class="profile-picture" alt="Profile Picture">
            <div class="profile-info">
                <h2>Juan Dela Cruz</h2>
                <p>Life Plan Member</p>
            </div>
        </div>
        <!-- Edit Button -->
        <button id="editProfileBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition duration-200">
            <i class="fas fa-edit"></i> Edit Profile
        </button>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <h2>Edit Profile</h2>
            <label for="fullNameInput">Full Name</label>
            <input type="text" id="fullNameInput" placeholder="Full Name">
            <label for="emailInput">Email Address</label>
            <input type="email" id="emailInput" placeholder="Email Address">
            <label for="contactInput">Contact Number</label>
            <input type="text" id="contactInput" placeholder="Contact Number">
            <button class="submit" id="saveProfileBtn">Save</button>
        </div>
    </div>

    <!-- Profile Content Wrapper -->
    <div class="profile-content-wrapper flex flex-col md:flex-row gap-6 p-6">
        <!-- Left Section: Account Information -->
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Account Information</h3>
            <table class="w-full border-collapse table-auto">
                <tr class="border-b">
                    <th class="text-left font-semibold text-gray-700 py-2">Account Number</th>
                    <td class="py-2">12333232</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left font-semibold text-gray-700 py-2">Contact Number</th>
                    <td class="py-2" id="contactNumber">0921332322</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left font-semibold text-gray-700 py-2">Email Address</th>
                    <td class="py-2" id="profileEmail">juan.delacruz@gmail.com</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left font-semibold text-gray-700 py-2">Application Status</th>
                    <td class="text-green-600 font-semibold py-2">Approved</td>
                </tr>
                <tr>
                    <th class="text-left font-semibold text-gray-700 py-2">Payment Status</th>
                    <td class="text-green-600 font-semibold py-2">Completed</td>
                </tr>
            </table>
        </div>

        <!-- Right Section: Cards (Recent Transactions & Life Plan Benefits) -->
        <div class="w-full md:w-1/2 flex flex-col gap-4">
            <!-- Enhanced Recent Transactions Card -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold mb-3"><i class="fas fa-receipt"></i> Recent Transactions</h3>
                <ul class="list-disc pl-5 text-gray-700">
                    <li><span class="font-semibold">Payment #12345</span> - ₱15,000.00 (02/15/2025) <i class="fas fa-check-circle text-green-500"></i></li>
                    <li><span class="font-semibold">Payment #12344</span> - ₱10,000.00 (01/10/2025) <i class="fas fa-check-circle text-green-500"></i></li>
                    <li><span class="font-semibold">Payment #12343</span> - ₱5,000.00 (12/05/2024) <i class="fas fa-check-circle text-green-500"></i></li>
                </ul>
            </div>

            <!-- Enhanced Life Plan Benefits Card -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold mb-3"><i class="fas fa-gift"></i> Plan Benefits</h3>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>✅ Full Memorial Service (Casket, Viewing, Ceremony)</li>
                    <li>✅ 5-Year Coverage on Memorial Services</li>
                    <li>✅ Transferable Benefits for Immediate Family</li>
                    <li>✅ Access to the Latest Digital Memorial Services</li>
                </ul>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editProfileBtn = document.getElementById("editProfileBtn");
            const editProfileModal = document.getElementById("editProfileModal");
            const closeModalBtn = document.getElementById("closeModalBtn");
            const saveProfileBtn = document.getElementById("saveProfileBtn");
            const fullNameInput = document.getElementById("fullNameInput");
            const emailInput = document.getElementById("emailInput");
            const contactInput = document.getElementById("contactInput");

            const profileName = document.querySelector(".profile-info h2");
            const profileEmail = document.getElementById("profileEmail");
            const profileContact = document.getElementById("contactNumber");

            // Open Modal
            editProfileBtn.addEventListener("click", function () {
                fullNameInput.value = profileName.textContent.trim();
                emailInput.value = profileEmail.textContent.trim();
                contactInput.value = profileContact.textContent.trim();
                editProfileModal.style.display = "flex"; // Show modal
            });

            // Close Modal
            closeModalBtn.addEventListener("click", function () {
                editProfileModal.style.display = "none"; // Hide modal
            });

            // Close modal when clicking outside
            window.addEventListener("click", function (event) {
                if (event.target === editProfileModal) {
                    editProfileModal.style.display = "none"; // Hide modal
                }
            });

            // Save Profile Changes
            saveProfileBtn.addEventListener("click", function () {
                profileName.textContent = fullNameInput.value;
                profileEmail.textContent = emailInput.value;
                profileContact.textContent = contactInput.value;
                editProfileModal.style.display = "none"; // Hide modal
            });
        });

        // Sidebar Toggle Script
        document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>