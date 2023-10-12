<?php
// Get ID from the AJAX request
$id = $_POST["id"];

// Perform the delete operation (Example: DELETE FROM table_name WHERE id = $id)

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


$checkSql = "SELECT * FROM studentMarks WHERE stud_id = $id";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    // If there are related records in studentMarks, delete them first
    $deleteMarksSql = "DELETE FROM studentMarks WHERE stud_id = $id";
    if ($conn->query($deleteMarksSql) === TRUE) {
        // After deleting related records in studentMarks, delete the student record
        $deleteStudentSql = "DELETE FROM students WHERE stud_id = $id";
        if ($conn->query($deleteStudentSql) === TRUE) {
            echo "Item with ID $id deleted successfully!";
        } else {
            echo "Error deleting student record: " . $conn->error;
        }
    } else {
        echo "Error deleting related studentMarks records: " . $conn->error;
    }
} else {
    // If there are no related records in studentMarks, directly delete the student record
    $deleteStudentSql = "DELETE FROM students WHERE stud_id = $id";
    if ($conn->query($deleteStudentSql) === TRUE) {
        echo "Item with ID $id deleted successfully!";
    } else {
        echo "Error deleting student record: " . $conn->error;
    }
}


// Close the database connection
$conn->close();


// Note: Remember to handle database operations securely (e.g., prepared statements) and handle errors appropriately.
?>
