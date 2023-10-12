<?php
$servername = "localhost";
$username = "root";
$password = "ceymox123";
$dbname = "Student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $fullname = $row['first_name'] . ' ' . $row['last_name'];
        echo "<tr>
                <td>{$row['stud_id']}</td>
                <td>{$fullname}</td>
                <td>{$row['phoneno']}</td>
                <td>{$row['address']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td><button class='delete-button' data-id='{$row['stud_id']}'>Delete</button></td>
                <td><button class='edit-button' onclick='editRow({$row['stud_id']})' data-id='{$row['stud_id']}'>Edit</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No records found</td></tr>";
}

$conn->close();
?>
