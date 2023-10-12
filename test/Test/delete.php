<?php
$id = $_POST["id"];

$servername = "localhost";
$username = "root";
$password = "ceymox123";
$dbname = "Student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$checkSql = "SELECT * FROM studentMarks WHERE stud_id = $id";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    $deleteMarksSql = "DELETE FROM studentMarks WHERE stud_id = $id";
    if ($conn->query($deleteMarksSql) === TRUE) {
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
    $deleteStudentSql = "DELETE FROM students WHERE stud_id = $id";
    if ($conn->query($deleteStudentSql) === TRUE) {
        echo "Item with ID $id deleted successfully!";
    } else {
        echo "Error deleting student record: " . $conn->error;
    }
}

$conn->close();

?>
