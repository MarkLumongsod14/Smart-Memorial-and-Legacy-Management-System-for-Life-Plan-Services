<?php
require 'vendor/autoload.php'; // Load dependencies
include 'config.php'; // Database connection

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

// ✅ Brevo API Setup
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key', BREVO_API_KEY);
$apiInstance = new TransactionalEmailsApi(new Client(), $config);

// ✅ Fetch scheduled messages from the database
$sql = "SELECT * FROM messages WHERE send_date <= NOW() AND status = 'pending'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $message_id = $row['id'];
    $toEmail = $row['recipient_email'];
    $toPhone = $row['recipient_phone']; // Ensure your DB has a recipient_phone column
    $toName = $row['recipient_name'];
    $subject = $row['subject'];
    $content = $row['message'];

    // ✅ Send Email
    $sendSmtpEmail = new SendSmtpEmail([
        'to' => [['email' => $toEmail, 'name' => $toName]],
        'sender' => ['email' => 'your-email@example.com', 'name' => 'Your Name'],
        'subject' => $subject,
        'htmlContent' => "<html><body>$content</body></html>"
    ]);

    try {
        $apiInstance->sendTransacEmail($sendSmtpEmail);
        echo "Email sent to $toEmail successfully!<br>";
    } catch (Exception $e) {
        echo "Error sending email to $toEmail: " . $e->getMessage() . "<br>";
    }

    // ✅ Send SMS
    if (!empty($toPhone)) {
        $smsResponse = sendBrevoSMS($toPhone, $content);
        if ($smsResponse) {
            echo "SMS sent to $toPhone successfully!<br>";
        } else {
            echo "Error sending SMS to $toPhone.<br>";
        }
    }

    // ✅ Update message status
    $update_sql = "UPDATE messages SET status = 'sent' WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->close();
}

// ✅ Update quick stats in the database
$update_stats_sql = "UPDATE user_stats SET total_messages_sent = total_messages_sent + 1 WHERE user_id = ?";
$stmt = $conn->prepare($update_stats_sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->close();

$conn->close();

// ✅ Function to Send SMS Using Brevo API
function sendBrevoSMS($phoneNumber, $messageText)
{
    $apiKey = BREVO_SMS_API_KEY;
    $sender = "LIFEPLAN"; // Must be approved by Brevo

    $client = new Client();
    $response = $client->post('https://api.brevo.com/v3/transactionalSMS/sms', [
        'headers' => [
            'accept' => 'application/json',
            'api-key' => $apiKey,
            'content-type' => 'application/json'
        ],
        'json' => [
            'sender' => $sender,
            'recipient' => $phoneNumber,
            'content' => $messageText,
            'type' => "transactional"
        ]
    ]);

    return $response->getStatusCode() == 201;
}
?>