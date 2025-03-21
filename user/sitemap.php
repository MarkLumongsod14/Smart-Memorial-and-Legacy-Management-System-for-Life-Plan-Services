<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Map</title>
    
    <!-- Leaflet CSS for Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="styles/sitemap_styles.css" />
    <link rel="stylesheet" href="styles/sidebar.css"/>

    
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gradient">
    <!-- Toggle Button -->
<button class="toggle-btn" id="toggleBtn">☰</button>

<!-- Floating Sidebar -->
<div class="sidebar" id="sidebar">
    <a href="homepage.php">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="lifeplans.php">
        <i class="fas fa-heart"></i>
        <span>Life Plans</span>
    </a>
    <a href="profile.php">
        <i class="fas fa-user-alt"></i>
        <span>Profile</span>
    </a>
    <a href="sitemap.php">
        <i class="fas fa-map"></i>
        <span>Sitemap</span>
    </a>
    <a href="gravemap.php">
        <i class="fas fa-map-marker-alt"></i>
        <span>Gravemap</span>
    </a>
    <a href="dashboard.php">
        <i class="fas fa-envelope"></i>
        <span>Lost Letter</span>
    </a>
    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</div>

   <!-- Main Content -->
<div class="main-container">
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" id="searchBar" placeholder="Search for a location...">
        <button id="searchButton"><i class="fas fa-search"></i></button>
    </div>

    <!-- Sitemap Layout (2 Columns: Map & Information Cards) -->
    <div class="sitemap-container">
        <!-- Left Section: Cemetery Map -->
        <div class="left-section">
            <div id="map"></div>
        </div>

        <!-- Right Section: Guidelines & Emergency Contacts -->
        <div class="right-section">
            <!-- Cemetery Visiting Hours -->
            <div class="info-box">
                <h3><i class="fas fa-clock"></i> Cemetery Visiting Hours</h3>
                <p><strong>Open:</strong> 8:00 AM - 6:00 PM (Daily)</p>
                <p>Status: <span id="open-status" class="status-open">Open</span></p>
            </div>

            <!-- Rules & Regulations -->
            <div class="rules-box">
                <h3><i class="fas fa-exclamation-triangle"></i> Rules & Regulations</h3>
                <ul>
                    <li><i class="fas fa-ban"></i> No littering.</li>
                    <li><i class="fas fa-volume-mute"></i> No loud music.</li>
                    <li><i class="fas fa-paint-brush"></i> No vandalism.</li>
                    <li><i class="fas fa-hand-holding-heart"></i> Respect the graves.</li>
                </ul>
            </div>

            <!-- How to Reserve a Grave Slot -->
            <div class="reservation-guide">
                <h3><i class="fas fa-map-pin"></i> How to Reserve a Grave Slot</h3>
                <ol>
                    <li><i class="fas fa-file-alt"></i> Visit the cemetery office or website.</li>
                    <li><i class="fas fa-map-marked-alt"></i> Choose a slot from the <a href="gravemap.php">Grave Map</a>.</li>
                    <li><i class="fas fa-credit-card"></i> Submit documents & payment.</li>
                    <li><i class="fas fa-check-circle"></i> Receive confirmation.</li>
                </ol>
            </div>

            <!-- Emergency Contacts -->
            <div class="emergency-box">
                <h3><i class="fas fa-exclamation-circle"></i> Emergency Contacts</h3>
                <p><i class="fas fa-phone"></i> <strong>Security Office:</strong> <a href="tel:+1234567890">+123 456 7890</a></p>
                <p><i class="fas fa-tools"></i> <strong>Maintenance:</strong> <a href="tel:+0987654321">+098 765 4321</a></p>
                <p><i class="fas fa-envelope"></i> <strong>Customer Service:</strong> <a href="mailto:support@cemetery.com">support@cemetery.com</a></p>
            </div>
        </div>
    </div>
</div>
   
   
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine"></script>
    <script>
var map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -1
});

var imageBounds = [[0, 0], [1351, 1536]];
var image = L.imageOverlay('sitemap.jpg', imageBounds).addTo(map);
map.fitBounds(imageBounds);

var locations = []; // Store fetched locations

// Function to add markers dynamically
function addMarker(lat, lng, name, img, details) {
    var popupContent = img
        ? `<img src="${img}" alt="${name}" style="width:100px;height:auto;"><br><strong>${name}</strong><br>${details}`
        : `<strong>${name}</strong><br>${details}`;
    
    L.marker([lat, lng]).addTo(map)
        .bindPopup(popupContent);
}

// Fetch locations from the database
fetch('fetch_locations.php')
    .then(response => response.json())
    .then(data => {
        locations = data; // Store the locations globally
        locations.forEach(location => {
            addMarker(location.latitude, location.longitude, location.name, location.img, location.details);
        });
    })
    .catch(error => console.error('Error fetching locations:', error));

// 🔍 Search Function
document.getElementById('searchBar').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        var searchText = event.target.value.toLowerCase().trim();
        
        var foundLocation = locations.find(location => 
            location.name.toLowerCase().includes(searchText) // Supports partial matches
        );

        if (foundLocation) {
            map.setView([foundLocation.latitude, foundLocation.longitude], 1); // Adjust zoom if needed

            var popupContent = foundLocation.img
                ? `<img src="${foundLocation.img}" alt="${foundLocation.name}" style="width:100px;height:auto;"><br><strong>${foundLocation.name}</strong><br>${foundLocation.details}`
                : `<strong>${foundLocation.name}</strong><br>${foundLocation.details}`;

            L.popup()
                .setLatLng([foundLocation.latitude, foundLocation.longitude])
                .setContent(popupContent)
                .openOn(map);
        } else {
            alert('Location not found!');
        }
    }
});
  // Sidebar Toggle Script
  document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });



</script>

</body>
</html>
