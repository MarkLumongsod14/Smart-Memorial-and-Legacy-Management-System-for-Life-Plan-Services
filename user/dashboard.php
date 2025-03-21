<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get user info
$sql = "SELECT name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error); // Show detailed error message
}

$stmt->bind_param("i", $user_id);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}
$stmt->close();

// Get pending messages
$sql = "SELECT COUNT(*) AS pending FROM messages WHERE user_id = ? AND sent = FALSE";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error); // Show detailed error message
}

$stmt->bind_param("i", $user_id);

$stmt->execute();
$result = $stmt->get_result();
$pending_messages = $result->fetch_assoc()['pending'];
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Letter Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="styles/dashboard_styles.css">
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
    <div class="dashboard-container container py-5">
        <div class="row">
            <!-- Left Side -->
            <div class="col-md-6">
                <!-- Logo Card -->
                <div class="card shadow mb-4 animate__animated animate__fadeInLeft">
                    <div class="card-body text-center">
                        <img src="images/lostletter.png" alt="Logo" class="logo mb-3" style="width: 300px; height: 300px;">
                        <!-- Quick Stats Below Logo -->
                        <div class="card shadow mt-4 animate__animated animate__fadeInUp">
                            <div class="card-body">
                                <h3 class="card-title">QUICK STATS</h3>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <h4 class="text-primary" id="total-messages-sent">0</h4>
                                        <p class="text-muted">Messages Sent</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h4 class="text-primary" id="total-recipients">0</h4>
                                        <p class="text-muted">Recipients</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h4 class="text-primary" id="total-drafts">0</h4>
                                        <p class="text-muted">Drafts</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6">
                <!-- Message Vault Card -->
                <div class="card shadow mb-4 animate__animated animate__fadeInRight">
                    <div class="card-body">
                        <h2 class="card-title">MESSAGE VAULT</h2>
                        <div class="vault-actions">
                            <button class="btn btn-primary btn-block mb-3" onclick="location.href='view_messages.php'">VIEW MESSAGES</button>
                            <button class="btn btn-primary btn-block mb-3" onclick="location.href='compose.html'">SCHEDULE AND SEND</button>
                            <button class="btn btn-primary btn-block" onclick="location.href='recipients.php'">MANAGE RECIPIENTS</button>
                        </div>
                    </div>
                </div>

                <!-- Pending Messages Card -->
                <div class="card shadow mb-4 animate__animated animate__fadeInRight">
                    <div class="card-body">
                        <h3 class="card-title">PENDING MESSAGES</h3>
                        <p class="card-text"><span id="pending-messages"><?php echo $pending_messages; ?></span> messages pending delivery</p>
                    </div>
                </div>

               

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="inday text-center text-md-left bg-white py-5">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="widget widget_text">
                        <a href="https://www.lifeplanservices.com" class="logo d-flex align-items-center mb-3">
                            <img src="images/logo.png" alt="Life Plan Services Logo" class="img-fluid" style="max-height: 50px;">
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
                            <li class="mb-2"><a href="https://www.lifeplanservices.com/faq" class="text-muted">FAQ</a></li>
                            <li class="mb-2"><a href="https://www.lifeplanservices.com/privacy" class="text-muted">Privacy Policy</a></li>
                            <li class="mb-2"><a href="https://www.lifeplanservices.com/terms" class="text-muted">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dynamic updates for pending messages count
    const pendingMessages = <?php echo $pending_messages; ?>;
    document.getElementById('pending-messages').textContent = pendingMessages;

    // Fetch upcoming lost letters
    function fetchUpcomingMessages() {
        fetch('upcoming_messages.php')
            .then(response => response.json())
            .then(data => {
                const notificationsList = document.getElementById('notifications-list');
                notificationsList.innerHTML = '';
                data.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'notification';
                    messageDiv.innerHTML = `
                        <strong>${message.subject}</strong><br>
                        Recipient: ${message.recipient_name}<br>
                        Scheduled: ${new Date(message.scheduled_at).toLocaleString()}
                    `;
                    notificationsList.appendChild(messageDiv);
                });
            })
            .catch(error => console.error('Error fetching upcoming messages:', error));
    }

    fetchUpcomingMessages();
    setInterval(fetchUpcomingMessages, 10000); // Auto-refresh every 10 seconds
});
function fetchQuickStats() {
    fetch('quick_stats.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('total-messages-sent').textContent = data.total_messages_sent;
            document.getElementById('total-recipients').textContent = data.total_recipients;
            document.getElementById('total-drafts').textContent = data.total_drafts;
        })
        .catch(error => console.error('Error fetching quick stats:', error));
}

fetchQuickStats();
setInterval(fetchQuickStats, 10000); // Auto-refresh every 10 seconds
 // Sidebar Toggle Script
 document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });

</script>

</body>
</html>
