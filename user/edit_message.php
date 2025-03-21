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

// Fetch the message to edit (only if it belongs to the logged-in user)
$sql = "SELECT * FROM messages WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $message_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$message = $result->fetch_assoc();

if (!$message) {
    die("Message not found or you do not have permission to edit this message.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Message</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Scheduled Message</h2>
        <form action="update_message.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $message['id']; ?>">
            <label for="recipient_email">Recipient Email:</label>
            <input type="email" id="recipient_email" name="recipient_email" value="<?php echo htmlspecialchars($message['recipient_email']); ?>" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php echo htmlspecialchars($message['message']); ?></textarea>
            
            <label for="send_date">Send Date:</label>
            <input type="datetime-local" id="send_date" name="send_date" value="<?php echo htmlspecialchars($message['send_date']); ?>" required>
            
            <button type="submit" class="btn-back">Update Message</button>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>