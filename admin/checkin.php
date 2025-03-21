<?php
require 'config.php';
session_start();

if (isset($_SESSION["user_id"])) {
    $stmt = $pdo->prepare("UPDATE users SET last_check_in = NOW() WHERE id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
}

header("Location: dashboard.php");
?>
