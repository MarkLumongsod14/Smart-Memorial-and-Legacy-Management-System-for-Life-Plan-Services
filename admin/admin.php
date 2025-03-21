<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deadmans_switch";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the 'uploads' directory exists
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

// Handle Add/Edit/Delete
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];

    if ($action === "add") {
        $name = $_POST['name'];
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];
        $status = $_POST['status'];
        $details = $_POST['details'];

        // Handle File Upload
        $imgPath = "";
        if (!empty($_FILES['img']['name'])) {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["img"]["name"]);
            $targetFile = $targetDir . time() . "_" . $fileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                    $imgPath = $targetFile;
                }
            }
        }

        // Insert into database
        $sql = "INSERT INTO graves (name, latitude, longitude, status, img, details)
                VALUES ('$name', '$lat', '$lng', '$status', '$imgPath', '$details')";
        $conn->query($sql);

        // ✅ Redirect to prevent duplicate insert on reload
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if ($action === "delete") {
        $id = $_POST['id'];

        // Get image path to delete file
        $result = $conn->query("SELECT img FROM graves WHERE id = $id");
        $row = $result->fetch_assoc();
        if (!empty($row['img']) && file_exists($row['img'])) {
            unlink($row['img']);
        }

        $conn->query("DELETE FROM graves WHERE id = $id");

        // ✅ Redirect
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if ($action === "edit") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];
        $status = $_POST['status'];
        $details = $_POST['details'];

        // Handle file upload
        if (!empty($_FILES['img']['name'])) {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["img"]["name"]);
            $targetFile = $targetDir . time() . "_" . $fileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                    $imgPath = $targetFile;

                    // Delete old image
                    $result = $conn->query("SELECT img FROM graves WHERE id = $id");
                    $row = $result->fetch_assoc();
                    if (!empty($row['img']) && file_exists($row['img'])) {
                        unlink($row['img']);
                    }

                    $conn->query("UPDATE graves SET img='$imgPath' WHERE id=$id");
                }
            }
        }

        // Update record
        $sql = "UPDATE graves SET 
                name='$name', latitude='$lat', longitude='$lng', 
                status='$status', details='$details' WHERE id=$id";
        $conn->query($sql);

        // ✅ Redirect
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
// Fetch all records
$result = $conn->query("SELECT * FROM graves");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Graves</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #3F3D9A;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #5755d9;
            border-radius: 5px;
        }
        
        /* Main Content */
        .content {
            margin-left: 260px;
            padding: 20px;
        }

        /* Dashboard Cards */
        .card-box {
            background-color: #5A54E3;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }

        /* Table Styling */
        table {
            width: 100%;
            margin-top: 20px;
        }
        th {
            background-color: #5A54E3;
            color: white;
        }

        /* Buttons */
        .btn-primary {
            background-color: #5A54E3;
            border: none;
        }
        .btn-danger {
            background-color: #D9534F;
        }

        /* Map Styling */
        #map {
            height: 80vh;
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>


    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin.php"><i class="fas fa-file-alt"></i> Graves & Sitemap</a></li>
            <li><a href="admin_dashboard.php"><i class="fas fa-chart-bar"></i> Lost Letters</a></li>
            <li><a href="users.php" class=""><i class="fas fa-users"></i> User Management</a></li>
            <li><a href="admin_lifeplan.php"><i class="fas fa-user"></i> Life Plan Management</a></li>
            <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Grave Management</h2>
        <div id="map"></div>
        <div id="coordinates">Click on the map to get coordinates.</div>

        <!-- Add Form -->
    <form method="POST" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="action" value="add">
        <input type="text" name="name" placeholder="Grave Name" required class="form-control mb-2">
        <input type="text" id="latitude" name="latitude" placeholder="Latitude" required class="form-control mb-2">
        <input type="text" id="longitude" name="longitude" placeholder="Longitude" required class="form-control mb-2">
        <select name="status" class="form-control mb-2">
            <option value="occupied">Occupied</option>
            <option value="vacant">Vacant</option>
            <option value="reserved">Reserved</option>
        </select>
        <input type="file" name="img" class="form-control mb-2">
        <textarea name="details" placeholder="Details" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Add Grave</button>
    </form>

        <h3>Existing Graves</h3>
        <table class="mt-4">
            <tr>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Status</th>
                <th>Image</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['latitude'] ?></td>
            <td><?= $row['longitude'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <?php if (!empty($row['img'])): ?>
                    <img src="<?= $row['img'] ?>" width="50">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
            <td><?= $row['details'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
        </table>
    </div>
    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Grave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" id="edit-id">

                    <label>Name:</label>
                    <input type="text" name="name" id="edit-name" class="form-control mb-2" required>

                    <label>Latitude:</label>
                    <input type="text" name="latitude" id="edit-latitude" class="form-control mb-2" required>

                    <label>Longitude:</label>
                    <input type="text" name="longitude" id="edit-longitude" class="form-control mb-2" required>

                    <label>Status:</label>
                    <select name="status" id="edit-status" class="form-control mb-2">
                        <option value="occupied">Occupied</option>
                        <option value="vacant">Vacant</option>
                        <option value="reserved">Reserved</option>
                    </select>

                    <label>Image:</label>
                    <input type="file" name="img" class="form-control mb-2">
                    
                    <img id="edit-preview" src="" width="50" class="mb-2" style="display: none;">

                    <label>Details:</label>
                    <textarea name="details" id="edit-details" class="form-control mb-2"></textarea>

                    <button type="submit" class="btn btn-primary">Update Grave</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map', {
            crs: L.CRS.Simple,
            minZoom: -1
        });

        var imageBounds = [[0, 0], [1351, 1536]]; // Replace with actual map image dimensions
        var image = L.imageOverlay('sitemap.jpg', imageBounds).addTo(map);
        map.fitBounds(imageBounds);

        // Display coordinates on click
        map.on('click', function (e) {
            var lat = Math.round(e.latlng.lat);
            var lng = Math.round(e.latlng.lng);
            document.getElementById('coordinates').innerHTML = `Latitude: ${lat}, Longitude: ${lng}`;
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });

        // Fetch existing grave markers
        fetch('fetch_graves.php')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    addMarker(location.latitude, location.longitude, location.name, location.img, location.details);
                });
            });

        function addMarker(lat, lng, name, img, details) {
            var popupContent = img 
                ? `<img src="${img}" alt="${name} Image" style="width:100px;height:auto;"><br>${name}<br>${details}` 
                : `${name}<br>${details}`;

            L.marker([lat, lng]).addTo(map)
                .bindPopup(popupContent);
        }

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-name').value = this.dataset.name;
                document.getElementById('edit-latitude').value = this.dataset.lat;
                document.getElementById('edit-longitude').value = this.dataset.lng;
                document.getElementById('edit-status').value = this.dataset.status;
                document.getElementById('edit-img').value = this.dataset.img;
                document.getElementById('edit-details').value = this.dataset.details;
                new bootstrap.Modal(document.getElementById('editModal')).show();
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>