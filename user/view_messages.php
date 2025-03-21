
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch scheduled messages for the logged-in user
$sql = "SELECT * FROM messages WHERE user_id = ? ORDER BY send_date ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduled Messages</title>
    <link rel="stylesheet" href="styles/messages.css">
</head>
<body class="bg-gradient">
    <div class="container">
        <h2>Your Scheduled Messages</h2>
        <table>
            <thead>
                <tr>
                    <th>Recipient</th>
                    <th>Message</th>
                    <th>Send Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['recipient_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo htmlspecialchars($row['send_date']); ?></td>
                    <td>
                        <a href="edit_message.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                        <a href="delete_message.php?id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn-back">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>