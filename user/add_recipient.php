<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "deadmans_switch");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from AJAX request
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';

if (!empty($name) && !empty($email) && !empty($contact)) {
    $stmt = $conn->prepare("INSERT INTO recipients (name, email, contact_number) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $contact);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
