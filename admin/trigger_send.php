<?php
session_start();
include 'config.php';

// Check if the user is an admin
if (!isset($_SESSION['admin_id'])) {
    echo "Unauthorized access!";
    exit();
}

// Run the message-sending script
$output = shell_exec("php send_messages.php 2>&1");
echo "Scheduled messages have been sent!";
?>
