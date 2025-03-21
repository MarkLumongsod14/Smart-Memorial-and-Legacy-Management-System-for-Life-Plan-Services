<?php
session_start();
include "config.php"; // Ensure your database connection is here

// Get JSON data from JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// Validate inputs
if (!isset($_SESSION["user_id"]) || empty($data["plan"]) || empty($data["payment"])) {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit();
}

$user_id = $_SESSION["user_id"];
$plan = $data["plan"];
$payment_method = $data["payment"];

// Insert into database
$stmt = $conn->prepare("INSERT INTO purchases (user_id, plan_name, payment_method) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $plan, $payment_method);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Database error"]);
}

$stmt->close();
$conn->close();
?>
