<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'deadmans_switch');

// Check Connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Fetch graves from database
$sql = "SELECT latitude, longitude, name, img, details, status FROM graves";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "SQL error: " . $conn->error]);
    exit;
}

$graves = [];
while ($row = $result->fetch_assoc()) {
    $graves[] = $row;
}

// Return JSON
echo json_encode($graves, JSON_PRETTY_PRINT);
?>
