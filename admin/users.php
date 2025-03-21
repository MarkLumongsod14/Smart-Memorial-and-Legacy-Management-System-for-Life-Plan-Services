<?php
session_start();
include "auth.php";
include "config.php";

// ✅ Ensure only admins can access
if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != 1) {
    die("Unauthorized access.");
}

// ✅ Fetch all users
$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
        
        <!-- Header -->
        <div class="header">
            <input type="text" placeholder="Search Users">
            <button><i class="fas fa-search"></i></button>
            <div class="user-profile">
                <i class="fas fa-bell"></i>
                <img src="user-avatar.png" alt="User">
            </div>
        </div>

        <!-- User Management Table -->
        <div class="recent-articles">
            <h2>User Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $users->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= $row['is_admin'] ? "Admin" : "User" ?></td>
                        <td>
                            <?php if ($row['id'] != $_SESSION["user_id"]): ?>
                                <form method="POST" action="process.php" style="display:inline;">
                                    <input type="hidden" name="action" value="toggle_admin">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit">
                                        <?= $row['is_admin'] ? "Demote to User" : "Promote to Admin" ?>
                                    </button>
                                </form>
                                <form method="POST" action="process.php" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_user">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="btn-danger">Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>

<?php
$conn->close();
?>
