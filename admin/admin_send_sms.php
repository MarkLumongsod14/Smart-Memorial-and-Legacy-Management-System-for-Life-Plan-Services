<?php
require 'vendor/autoload.php';
include 'config.php';

use Brevo\Client\Api\TransactionalSMSApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendTransacSms;
use GuzzleHttp\Client;

session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    die("Unauthorized access.");
}

// ✅ Set up Brevo API
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key', BREVO_SMS_API_KEY);
$apiInstance = new TransactionalSMSApi(new Client(), $config);

// ✅ Fetch only pending SMS messages
$sql = "SELECT * FROM messages WHERE send_date <= NOW() AND status = 'pending' AND message_type = 'sms'";
$result = $conn->query($sql);

$sentCount = 0;

while ($row = $result->fetch_assoc()) {
    $message_id = $row['id'];
    $toPhone = $row['recipient_phone'];
    $messageContent = $row['message'];

    $sendSms = new SendTransacSms([
        'sender' => 'YourBrand', // Sender name (set in Brevo settings)
        'recipient' => $toPhone,
        'content' => $messageContent
    ]);

    try {
        $apiInstance->sendTransacSms($sendSms);

        // ✅ Update message status
        $update_sql = "UPDATE messages SET status = 'sent' WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("i", $message_id);
        $stmt->execute();
        $stmt->close();

        $sentCount++;
    } catch (Exception $e) {
        echo "❌ Error sending SMS to $toPhone: " . $e->getMessage() . "<br>";
    }
}

$conn->close();

// ✅ Redirect back to admin dashboard with a success message
header("Location: admin_dashboard.php?sms_sent=$sentCount");
exit();
?>
