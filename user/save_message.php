<?php
session_start();
include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $recipient = $_POST['recipient'];
    $recipient_phone = $_POST['recipient_phone'] ?? null;
    $subject = $_POST['subject'];  // ✅ Capture subject from the form
    $message = $_POST['message'];
    $send_date = $_POST['send_date'];

    // ✅ Ensure all fields match the columns in your database
    $sql = "INSERT INTO messages (user_id, recipient_email, recipient_phone, subject, message, send_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing SQL statement: " . $conn->error);
    }

    // ✅ Bind all parameters
    $stmt->bind_param("isssss", $user_id, $recipient, $recipient_phone, $subject, $message, $send_date);

    // ✅ Execute the statement
    if ($stmt->execute()) {
        echo "Message scheduled successfully! <a href='dashboard.php'>Go back</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


?>
