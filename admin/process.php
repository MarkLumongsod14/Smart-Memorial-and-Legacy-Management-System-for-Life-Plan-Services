<?php
include "config.php";
session_start();

if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
    die("Access Denied!");
}

if ($_POST["action"] == "toggle_admin") {
    $id = $_POST["id"];
    $query = $conn->prepare("UPDATE users SET is_admin = NOT is_admin WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    header("Location: users.php");
} elseif ($_POST["action"] == "delete_user") {
    $id = $_POST["id"];
    $query = $conn->prepare("DELETE FROM users WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    header("Location: users.php");
}
?>
