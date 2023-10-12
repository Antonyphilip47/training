<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "ceymox123";
$dbname = "Student";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve records from the students table
$sql = "SELECT * FROM subject";
$result = $conn->query($sql);

// Display records in the table
if ($result->num_rows > 0) {
    echo "<select name='subject' id='subject'>"; // Start the select element
    while ($row = $result->fetch_assoc()) {

        $id = $row['subj_id'];
        $name = $row['subjName'];

        echo "<option value='$id'>$name</option>"; // Create an option element for each row in the database
    }
    echo "</select>"; // End the select element
} else {
    echo "<select name='subject' id='subject'></select>";
}

// Close the database connection
$conn->close();
?>
