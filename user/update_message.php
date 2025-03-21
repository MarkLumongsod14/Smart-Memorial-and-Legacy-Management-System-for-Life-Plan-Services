<?php
session_start();
include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$message_id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$recipient_email = $_POST['recipient_email'];
$message = $_POST['message'];
$send_date = $_POST['send_date'];

// Update the message (only if it belongs to the logged-in user)
$sql = "UPDATE messages SET recipient_email = ?, message = ?, send_date = ? WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $recipient_email, $message, $send_date, $message_id, $user_id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: view_messages.php");
    exit();
} else {
    $stmt->close();
    $conn->close();
    die("Error updating message: " . $stmt->error);
}
?>