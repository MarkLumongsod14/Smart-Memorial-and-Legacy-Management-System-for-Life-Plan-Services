<?php
session_start();
include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$message_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Delete the message (only if it belongs to the logged-in user)
$sql = "DELETE FROM messages WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $message_id, $user_id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: view_messages.php");
    exit();
} else {
    $stmt->close();
    $conn->close();
    die("Error deleting message: " . $stmt->error);
}
?>