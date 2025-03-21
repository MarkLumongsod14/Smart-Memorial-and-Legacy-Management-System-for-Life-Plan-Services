<?php
session_start();
include 'config.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch total messages sent
$sql = "SELECT total_messages_sent FROM user_stats WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$total_messages_sent = $result->fetch_assoc()['total_messages_sent'];
$stmt->close();

// Fetch total recipients
$sql = "SELECT COUNT(*) AS total_recipients FROM recipients WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$total_recipients = $result->fetch_assoc()['total_recipients'];
$stmt->close();

// Fetch total drafts
$sql = "SELECT COUNT(*) AS total_drafts FROM messages WHERE user_id = ? AND status = 'draft'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$total_drafts = $result->fetch_assoc()['total_drafts'];
$stmt->close();

// Return the stats as JSON
echo json_encode([
    'total_messages_sent' => $total_messages_sent,
    'total_recipients' => $total_recipients,
    'total_drafts' => $total_drafts
]);

$conn->close();
?>