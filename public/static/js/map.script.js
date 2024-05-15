// Create the map instance and set initial properties
var map = L.map('map', {
    center: [0, 0],  // Set initial center of the map
    zoom: 2,         // Set initial zoom level
    maxZoom: 30      // Maximum zoom level when zooming in
});

alert("Hello!");
// Define the base tile layer with OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'  // Attribution is important for OpenStreetMap
}).addTo(map);

// Function to handle location found event
function onLocationFound(e) {
    var radius = e.accuracy / 2;  // Define a radius based on the location accuracy
    L.marker(e.latlng).addTo(map).bindPopup("You are here").openPopup();  // Add a marker and popup
    L.circle(e.latlng, radius).addTo(map);  // Draw a circle around the location
}

// Function to handle location error event
function onLocationError(e) {
    alert('Error: ' + e.message);  // Alert the user to the location error
}

// Bind the location found and error functions to the map
map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

// Start the location service
map.locate({
    setView: true,   // Automatically set the view to the detected location
    maxZoom: 16      // Adjusted maxZoom for better viewing when location is found
});
