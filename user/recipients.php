<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "deadmans_switch");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch recipients from the database
$result = $conn->query("SELECT * FROM recipients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/recipients.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="dashboard.php" class="back-button"><i class="fas fa-arrow-left"></i> Back</a>
            <h1>Recipients</h1>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-outline-success"><i class="fas fa-search"></i></button>
            </div>
        </div>
        
        <div class="main">
            <h2>RECIPIENTS</h2>
            <div id="recipient-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="recipient">
                        <img src="images/user_icon.png" alt="Recipient Icon">
                        <div class="info">
                            <p><strong><?= htmlspecialchars($row['name']) ?></strong></p>
                            <p>Email: <?= htmlspecialchars($row['email']) ?></p>
                            <p>Contact: <?= htmlspecialchars($row['contact_number']) ?></p>
                        </div>
                        <div class="actions">
                            <a href="edit_recipient.php?id=<?= $row['id'] ?>" class="btn-action btn-edit"><i class="fas fa-edit"></i></a>
                            <a href="delete_recipient.php?id=<?= $row['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this recipient?');"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="add-recipient" onclick="showAddForm()">
                <i class="fas fa-plus-circle"></i> Add New Recipient
            </div>

            <div id="add-form">
                <input type="text" id="new-name" class="form-control" placeholder="Enter recipient name">
                <input type="email" id="new-email" class="form-control mt-2" placeholder="Enter email">
                <input type="text" id="new-contact" class="form-control mt-2" placeholder="Enter contact number">
                <button class="btn btn-primary mt-2" onclick="addRecipient()">Add</button>
            </div>
        </div>
    </div>

    <script>
        function showAddForm() {
            document.getElementById("add-form").style.display = "block";
        }

        function addRecipient() {
            var name = document.getElementById("new-name").value.trim();
            var email = document.getElementById("new-email").value.trim();
            var contact = document.getElementById("new-contact").value.trim();

            if (name === "" || email === "" || contact === "") {
                alert("Please fill in all fields.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_recipient.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&contact=" + encodeURIComponent(contact));
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
