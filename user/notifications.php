<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, message FROM notifications WHERE user_id = ? AND status = 'unread' ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

// Mark notifications as read after fetching
$updateSql = "UPDATE notifications SET status = 'read' WHERE user_id = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("i", $user_id);
$updateStmt->execute();
$updateStmt->close();

$stmt->close();
$conn->close();

echo json_encode($notifications);
?>
