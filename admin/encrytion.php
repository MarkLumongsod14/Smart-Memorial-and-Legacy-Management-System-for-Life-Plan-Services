<?php

// Encryption key (must be 32 characters long)
define('ENCRYPTION_KEY', 'your-32-character-encryption-key');

// Encrypt function
function encryptMessage($message) {
    return openssl_encrypt($message, 'AES-256-CBC', ENCRYPTION_KEY, 0, substr(ENCRYPTION_KEY, 0, 16));
}

// Decrypt function
function decryptMessage($encryptedMessage) {
    return openssl_decrypt($encryptedMessage, 'AES-256-CBC', ENCRYPTION_KEY, 0, substr(ENCRYPTION_KEY, 0, 16));
}
?>