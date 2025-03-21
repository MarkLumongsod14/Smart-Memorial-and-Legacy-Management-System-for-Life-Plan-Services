<?php
require 'vendor/autoload.php';
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;

// ✅ Set up Brevo API
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key','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');
$apiInstance = new TransactionalEmailsApi(new Client(), $config);

$sendSmtpEmail = new SendSmtpEmail([
    'to' => [['email' => 'maba.lumongsod.coc@phinmaed.com', 'name' => 'Mark Adrian Batawan Lumongsod']],
    'sender' => ['email' => 'mark.adrian.lumongsod@gmail.com', 'name' => 'Mark Adrian Lumongsod'],
    'subject' => 'Test Email from PHP',
    'htmlContent' => '<html><body><h1>Hello from Brevo!</h1></body></html>'
]);

try {
    $response = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($response);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
