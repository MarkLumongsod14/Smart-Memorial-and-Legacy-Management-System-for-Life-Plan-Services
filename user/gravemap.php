<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with Search and Details</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css">
    <link rel="stylesheet" href="styles/gravemap_styles.css"> <!-- Your custom CSS -->
    <link rel="stylesheet" href="styles/sidebar.css"> <!-- Add the sidebar styles -->

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
</head>
<body>
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
        <i class="fa fa-sign-out"></i>
        <span>Logout</span>
    </a>
</div>


    <!-- Main Content -->
    <div class="main-container">
        
        <!-- Map Section -->
        <div id="map-container">
            <div id="map"></div>
        </div>

        <!-- Info Section -->
        <div class="info-container">
            <!-- Search Bar -->
            <input type="text" id="searchBar" class="search-bar" placeholder="Search for a location...">

            <!-- Legend Card -->
            <div class="card">
                <h3>Legend</h3>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-icon occupied"></div>
                        <span>Occupied</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-icon available"></div>
                        <span>Available</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-icon reserved"></div>
                        <span>Reserved</span>
                    </div>
                </div>
            </div>
            

            <!-- Additional Info Card -->
            <div class="card">
                <h3>Instructions</h3>
                <p>Click on a location to view details. Use the search bar to find specific graves.</p>
            </div>
        </div>

    </div>
    

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>

    <script>
        // Initialize the map with image dimensions as bounds
        var map = L.map('map', {
            crs: L.CRS.Simple,
            minZoom: -1
        });

        var imageBounds = [[0, 0], [1351, 1536]]; // Adjust based on image size
        var image = L.imageOverlay('sitemap.jpg', imageBounds).addTo(map);
        map.fitBounds(imageBounds);

        // Fetch graves from database
        fetch('fetch_graves.php')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    addMarker(location.latitude, location.longitude, location.name, location.img, location.details, location.status);
                });
            })
            .catch(error => console.error('Error fetching graves:', error));

        // Custom icons for grave status
        var icons = {
            occupied: L.icon({ iconUrl: 'occupied.png', iconSize: [32, 32], iconAnchor: [16, 32], popupAnchor: [0, -32] }),
            vacant: L.icon({ iconUrl: 'available.png', iconSize: [32, 32], iconAnchor: [16, 32], popupAnchor: [0, -32] }),
            reserved: L.icon({ iconUrl: 'reserved1.png', iconSize: [32, 32], iconAnchor: [16, 32], popupAnchor: [0, -32] })
        };

        // Function to add markers
        function addMarker(lat, lng, name, img, details, status) {
            var icon = icons[status] || icons.vacant;
            var popupContent = img
                ? `<img src="${img}" alt="${name} Image" style="width:100px;height:auto;"><br>${name}<br>${details}`
                : `${name}<br>${details}`;
            
            L.marker([lat, lng], { icon: icon }).addTo(map)
                .bindPopup(popupContent);
        }

        // Search functionality
        document.getElementById('searchBar').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                var searchText = event.target.value.toLowerCase();
                fetch('fetch_graves.php')
                    .then(response => response.json())
                    .then(locations => {
                        var foundLocation = locations.find(location => location.name.toLowerCase() === searchText);
                        if (foundLocation) {
                            map.setView([foundLocation.latitude, foundLocation.longitude], 0);
                            var popupContent = foundLocation.img 
                                ? `<img src="${foundLocation.img}" alt="${foundLocation.name} Image" style="width:100px;height:auto;"><br>${foundLocation.name}<br>${foundLocation.details}`
                                : `${foundLocation.name}<br>${foundLocation.details}`;
                            L.popup()
                                .setLatLng([foundLocation.latitude, foundLocation.longitude])
                                .setContent(popupContent)
                                .openOn(map);
                        } else {
                            alert('Location not found!');
                        }
                    });
            }
        });

        // Log coordinates when clicking on the map (for debugging)
        map.on('click', function (e) {
            var coord = e.latlng;
            console.log(`Clicked at: lat=${Math.round(coord.lat)}, lng=${Math.round(coord.lng)}`);
        });
         // Sidebar Toggle Script
 document.getElementById('toggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });

    </script>
</body>
</html>
