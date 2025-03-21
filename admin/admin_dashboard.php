<?php
session_start();
include 'config.php';

// ✅ Ensure only admins can access
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    die("Unauthorized access.");
}

// ✅ Fetch all scheduled messages
$sql = "SELECT * FROM messages WHERE status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>ADMIN DASHBOARD</h2>
        <ul>
        <li><a href="admin.php"><i class="fas fa-file-alt"></i> Graves & Sitemap</a></li>
    <li><a href="admin_dashboard.php"><i class="fas fa-chart-bar"></i> Lost Letters</a></li>
    <li><a href="users.php"><i class="fas fa-building"></i> User Management</a></li>
    <li><a href="admin_lifeplan.php"><i class="fas fa-user"></i> Life Plan Management</a></li>
    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">


        <!-- Scheduled Messages Table -->
        <div class="recent-articles">
            <h2>Scheduled Messages</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Recipient Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['recipient_email']); ?></td>
                            <td><?php echo htmlspecialchars($row['subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo $row['send_date']; ?></td>
                            <td class="status pending"><?php echo $row['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Actions Section -->
        <div class="actions">
            <h3>Actions</h3>
            <form action="admin_send_messages.php" method="POST">
                <button type="submit">Send All Pending Messages</button>
            </form>
            <a href="admin_send_sms.php" class="button">Send All Pending SMS</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
