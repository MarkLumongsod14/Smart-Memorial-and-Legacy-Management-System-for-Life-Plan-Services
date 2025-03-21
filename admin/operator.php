<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $stmt = $pdo->prepare("UPDATE users SET status='deceased' WHERE email = ?");
    $stmt->execute([$email]);
    echo "User marked as deceased.";
}
?>

<form method="post">
    <input type="email" name="email" placeholder="User Email" required>
    <button type="submit">Mark as Deceased</button>
</form>
