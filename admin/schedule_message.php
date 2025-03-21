<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $recipient_email = $_POST["recipient_email"];
    $message = $_POST["message"];
    $scheduled_date = $_POST["scheduled_date"];

    $stmt = $pdo->prepare("INSERT INTO messages (user_id, recipient_email, message, scheduled_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $recipient_email, $message, $scheduled_date]);

    header("Location: dashboard.php");
}
?>
