document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // If response is set, display the modal
    if (response) {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal and unset variables
    span.onclick = function () {
        modal.style.display = "none";
        response = null;
        image = null;
        output = null;
        // Optionally, you can make an AJAX call to unset these variables on the server-side as well
    };

    // When the user clicks anywhere outside of the modal, close it and unset variables
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            response = null;
            image = null;
            output = null;
            // Optionally, you can make an AJAX call to unset these variables on the server-side as well
        }
    };
});
