// Initialize the map on the "map" div
var map = L.map("map").setView([0, 0], 1); // Set a basic view with world view

// Add an OpenStreetMap tile layer
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


function getOfficeLocation() {
  $.ajax({
    method: "GET",
    url: "/get-location",
    success: function(res) {
      const officeGeoLocation = JSON.parse(res);
      locateUser(officeGeoLocation.lat, officeGeoLocation.long);
    },
  });
}
getOfficeLocation();

// Function to locate the user and show markers
function locateUser(fixedLat, fixedLong) {
  if (navigator.geolocation) {
    const watchId = navigator.geolocation.watchPosition(
      function(position) { // Changed to standard function for compatibility
        const userLat = position.coords.latitude;
        const userLng = position.coords.longitude;
        console.log("Latitude:", userLat);
        console.log("Longitude:", userLng);
        // You can now use userLat and userLng to do whatever you need

        // alert(userLat+" "+userLng);

        // Update the view of the map to the current location with an appropriate zoom level
        map.setView([userLat, userLng], 16);

        // Add a marker to the map at the current location
        var userMarker = L.marker([userLat, userLng], {})
          .addTo(map)
          .bindPopup("Your Location"); // Custom popup message

        // Add a fixed marker to the map
        var fixedMarker = L.marker([fixedLat, fixedLong], {})
          .addTo(map)
          .bindPopup("Office Location"); // Custom popup message
        var circle = L.circle([fixedLat, fixedLong], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.1,
            radius: 20
        }).addTo(map);
        

        // Optionally, fit the map bounds to the markers
        var group = L.featureGroup([userMarker, fixedMarker]);
        map.fitBounds(group.getBounds());
      },
      function(error) { // Changed to standard function for compatibility
        console.error("Error getting location:", error.message);
        // Handle errors here
      }
    );
  } else {
    alert("Geolocation is not supported by your browser");
  }
}
