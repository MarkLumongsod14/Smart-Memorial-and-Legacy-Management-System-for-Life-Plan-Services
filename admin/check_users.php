<?php
require 'config.php';

$pdo->query("UPDATE users SET status='deceased' WHERE status='active' AND last_check_in < NOW() - INTERVAL 30 DAY");
?>
