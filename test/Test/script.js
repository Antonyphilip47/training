function editRow(id) {

    document.location = "getuser.php?id="+id;
    
}

var deleteButtons = document.querySelectorAll(".delete-button");

deleteButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var id = button.getAttribute("data-id");

        var xhr = new XMLHttpRequest();

        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                document.location = "studentdisplayfront.php";
            } else {
                document.getElementById("result").innerHTML = "Error: " + xhr.status;
            }
        };

        var formData = "id=" + encodeURIComponent(id);

        xhr.send(formData);
    });
});


