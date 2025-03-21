// Initialize the map with image dimensions as bounds
var map = L.map('map', {
    crs: L.CRS.Simple,
    minZoom: -1
});

var imageBounds = [[0, 0], [1351, 1536]]; // Replace with actual image dimensions
var image = L.imageOverlay('sitemap.jpg', imageBounds).addTo(map);

map.fitBounds(imageBounds);

// Fetch graves from database
fetch('fetch_graves.php')
    .then(response => response.json())
    .then(locations => {
        locations.forEach(location => {
            addMarker(location.latitude, location.longitude, location.name, location.img, location.details);
        });
    })
    .catch(error => console.error('Error fetching graves:', error));

// Function to add markers with popups
function addMarker(lat, lng, name, img, details) {
    var popupContent = img 
        ? `<img src="${img}" alt="${name} Image" style="width:100px;height:auto;"><br>${name}<br>${details}` 
        : `${name}<br>${details}`;
    
    L.marker([lat, lng]).addTo(map)
        .bindPopup(popupContent);
}

// Function to handle search and display location
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

// Show clicked coordinates (for debugging)
map.on('click', function (e) {
    var coord = e.latlng;
    var lat = Math.round(coord.lat);
    var lng = Math.round(coord.lng);
    console.log(`Clicked at: lat=${lat}, lng=${lng}`);
});
