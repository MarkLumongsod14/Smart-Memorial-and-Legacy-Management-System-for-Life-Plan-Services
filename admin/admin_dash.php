<?php
session_start();
if (!isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != 1) {
    header("Location: login.php");
    exit();
}
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

    <div class="main-content">
        <div class="header">
            <input type="text" placeholder="Search">
            <button><i class="fas fa-search"></i></button>
            <div class="user-profile">
                <i class="fas fa-bell"></i>
                <img src="user-avatar.png" alt="User">
            </div>
        </div>

        <div class="dashboard-metrics">
            <div class="metric">
                <h3>60.5k</h3>
                <p>Article Views</p>
            </div>
            <div class="metric">
                <h3>150</h3>
                <p>Likes</p>
            </div>
            <div class="metric">
                <h3>320</h3>
                <p>Comments</p>
            </div>
            <div class="metric">
                <h3>70</h3>
                <p>Published</p>
            </div>
        </div>

        <div class="recent-articles">
            <h2>Recent Articles</h2>
            <table>
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Views</th>
                        <th>Comments</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Article 73</td>
                        <td>2.9k</td>
                        <td>210</td>
                        <td class="status published">Published</td>
                    </tr>
                    <tr>
                        <td>Article 72</td>
                        <td>1.5k</td>
                        <td>360</td>
                        <td class="status published">Published</td>
                    </tr>
                    <tr>
                        <td>Article 71</td>
                        <td>1.1k</td>
                        <td>150</td>
                        <td class="status published">Published</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
