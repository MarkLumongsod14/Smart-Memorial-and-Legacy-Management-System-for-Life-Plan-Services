<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "deadmans_switch");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get recipient ID from URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch recipient details
    $query = "SELECT * FROM recipients WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $recipient = $result->fetch_assoc();

    if (!$recipient) {
        die("Recipient not found.");
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];

    // Update query
    $updateQuery = "UPDATE recipients SET name=?, email=?, contact_number=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssi", $name, $email, $contact_number, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Recipient updated successfully!'); window.location.href='recipients.php';</script>";
    } else {
        echo "Error updating recipient: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipient</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/recipients.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="recipients.php" class="back-button"><i class="fas fa-arrow-left"></i> Back</a>
            <h1>Edit Recipient</h1>
        </div>
        <div class="main">
            <div class="section">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($recipient['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($recipient['email']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" value="<?= htmlspecialchars($recipient['contact_number']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="recipients.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
