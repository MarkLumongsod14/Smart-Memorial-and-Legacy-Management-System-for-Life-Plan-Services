<?php
require 'vendor/autoload.php';
include 'config.php';

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

// ✅ Ensure only admins can trigger this action
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    die("Unauthorized access.");
}

// ✅ Set up Brevo API
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key', BREVO_API_KEY);
$apiInstance = new TransactionalEmailsApi(new Client(), $config);

// ✅ Fetch only pending messages from users
$sql = "SELECT * FROM messages WHERE send_date <= NOW() AND status = 'pending' AND user_id IS NOT NULL";
$result = $conn->query($sql);

$sentCount = 0;

while ($row = $result->fetch_assoc()) {
    $message_id = $row['id'];
    $toEmail = $row['recipient_email'];
    $toName = isset($row['recipient_name']) ? $row['recipient_name'] : 'User';
    $subject = isset($row['subject']) ? $row['subject'] : 'No Subject';
    $content = $row['message'];

    $sendSmtpEmail = new SendSmtpEmail([
        'to' => [['email' => $toEmail, 'name' => $toName]],
        'sender' => ['email' => 'mark.adrian.lumongsod@gmail.com', 'name' => 'Life Plan Services'], // Update this!
        'subject' => $subject,
        'htmlContent' => "<html><body>$content</body></html>"
    ]);

    try {
        $apiInstance->sendTransacEmail($sendSmtpEmail);

        // ✅ Update message status
        $update_sql = "UPDATE messages SET status = 'sent' WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("i", $message_id);
        $stmt->execute();
        $stmt->close();

        $sentCount++;
    } catch (Exception $e) {
        echo "❌ Error sending email to $toEmail: " . $e->getMessage() . "<br>";
    }
}

$conn->close();

// ✅ Redirect back to admin dashboard with a success message
header("Location: admin_dashboard.php?success=$sentCount");
exit();
?>
