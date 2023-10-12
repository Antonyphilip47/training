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
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['stud_id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td><button class='delete-button' onclick='deleteRow()' data-id='{$row['stud_id']}'>Delete</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}

// Close the database connection
$conn->close();
?>
