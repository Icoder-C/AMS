// document.addEventListener("DOMContentLoaded", function() {
//     console.log("DOM fully loaded and parsed");

//     // Attach event listeners to the form submit buttons
//     document.querySelectorAll("form").forEach(function(form) {
//         form.addEventListener("submit", function(event) {
//             event.preventDefault(); // Prevent form submission
//             console.log("Form submit intercepted");

//             if (navigator.geolocation) {
//                 console.log("Getting location...");
//                 navigator.geolocation.getCurrentPosition(function(position) {
//                     showPosition(position, form);
//                 }, showError, { timeout: 10000 });
//             } else {
//                 alert("Geolocation is not supported by this browser.");
//             }
//         });
//     });
// });

// function showPosition(position, form) {
//     var lat = position.coords.latitude;
//     var lon = position.coords.longitude;

//     console.log("Location obtained: ", lat, lon);

//     // Create and append hidden input fields for latitude and longitude in one go
//     var latInput = createHiddenInput('latitude', lat);
//     var lonInput = createHiddenInput('longitude', lon);
    
//     // Append the hidden input fields to the form
//     form.appendChild(latInput);
//     form.appendChild(lonInput);

//     console.log("Hidden inputs added to the form");

//     // Submit the form after adding the hidden inputs
//     form.submit();
// }

// function createHiddenInput(name, value) {
//     var input = document.createElement("input");
//     input.type = "hidden";
//     input.name = name;
//     input.value = value;
//     return input;
// }

// function showError(error) {
//     var message;
//     switch(error.code) {
//         case error.PERMISSION_DENIED:
//             message = "User denied the request for Geolocation.";
//             break;
//         case error.POSITION_UNAVAILABLE:
//             message = "Location information is unavailable.";
//             break;
//         case error.TIMEOUT:
//             message = "The request to get user location timed out.";
//             break;
//         case error.UNKNOWN_ERROR:
//             message = "An unknown error occurred.";
//             break;
//     }
//     alert(message);
//     console.error(message);
// }

// // JavaScript code to get user's location automatically and send it to PHP

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        document.getElementById('latitudeIn').value = position.coords.latitude;
        document.getElementById('longitudeIn').value = position.coords.longitude;

        document.getElementById('latitudeOut').value = position.coords.latitude;
        document.getElementById('longitudeOut').value = position.coords.longitude;
    }, function(error) {
        console.error('Error occurred. Error code: ' + error.code);
        // error.code can be:
        //   0: unknown error
        //   1: permission denied
        //   2: position unavailable (error response from locaton provider)
        //   3: timed out
    });
} else {
    alert('Geolocation is not supported by this browser.');
}