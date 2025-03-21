<?php
require 'config.php';
session_start();

$user_id = $_SESSION["user_id"];
$stmt = $pdo->prepare("SELECT name, email, phone FROM recipients WHERE user_id = ?");
$stmt->execute([$user_id]);
$recipients = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($recipients);
?>
