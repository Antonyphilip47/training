// Get all delete buttons with class "delete-button"
var deleteButtons = document.querySelectorAll(".delete-button");

// Add click event listener to each delete button
deleteButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        // Get the ID from the data-id attribute of the clicked button
        var id = button.getAttribute("data-id");

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Set up the callback function
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, display the response
                document.getElementById("result").innerHTML = xhr.responseText;
            } else {
                // Request failed
                document.getElementById("result").innerHTML = "Error: " + xhr.status;
            }
        };

        // Prepare the form data to be sent
        var formData = "id=" + encodeURIComponent(id);

        // Send the request
        xhr.send(formData);
    });
});
