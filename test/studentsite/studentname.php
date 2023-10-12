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
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Display records in the table
if ($result->num_rows > 0) {
    echo "<select name='student' id='student'>"; // Start the select element
    while ($row = $result->fetch_assoc()) {

        $id = $row['stud_id'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];

        $fullname = $firstname.' '.$lastname;

        echo "<option value='$id'>$fullname</option>"; // Create an option element for each row in the database
    }
    echo "</select>"; // End the select element
} else {
    echo "<select name='student' id='student'></select>";
}

// Close the database connection
$conn->close();
?>
