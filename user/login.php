<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ✅ Fetch user info
    $sql = "SELECT id, name, email, password, is_admin FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // ✅ Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin']; // ✅ Store admin flag

            // ✅ Redirect based on role
            if ($user['is_admin'] == 1) {
                header("Location: admin_dash.php    "); // Admin page
            } else {
                header("Location: homepage.php"); // Regular user page
            }
            exit();
        } else {
            echo "❌ Invalid password!";
        }
    } else {
        echo "❌ User not found!";
    }

    $stmt->close();
}
$conn->close();
?>
