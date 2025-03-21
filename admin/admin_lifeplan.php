<?php
session_start();
include "config.php";

// ✅ Ensure only admins can access
if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != 1) {
    die("Access Denied!");
}

// ✅ Fetch purchases
$result = $conn->query("SELECT users.name, users.email, purchases.plan_name, purchases.payment_method, purchases.created_at 
                        FROM purchases 
                        JOIN users ON purchases.user_id = users.id 
                        ORDER BY purchases.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Purchases</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin.php"><i class="fas fa-file-alt"></i> Graves & Sitemap</a></li>
            <li><a href="admin_dashboard.php"><i class="fas fa-chart-bar"></i> Lost Letters</a></li>
            <li><a href="users.php" class=""><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="admin_lifeplan.php"><i class="fas fa-user"></i> Life Plan Management</a></li>
            <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">


        <!-- Page Title -->
        <div class="dashboard-section">
            <h2>User Purchases</h2>
        </div>

        <!-- Purchases Table -->
        <div class="recent-articles">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Selected Plan</th>
                        <th>Payment Method</th>
                        <th>Date Purchased</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["name"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["plan_name"]) ?></td>
                            <td><?= htmlspecialchars(ucwords(str_replace("_", " ", $row["payment_method"]))) ?></td>
                            <td><?= $row["created_at"] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

<?php $conn->close(); ?>
