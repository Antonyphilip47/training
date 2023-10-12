<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form values

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone_no = $_POST["phone_no"];
    $email = $_POST["email"];
    $id = $_POST["stud_id"];

    $servername = "localhost";
    $username = "root";
    $password = "ceymox123";
    $dbname = "Student";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM students WHERE email=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists in the database.";
    } else {

        $stmt->close();
        
        $insertSql = "INSERT INTO students (first_name, last_name, gender, address, phoneno, email) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);

        $insertStmt->bind_param("ssssss", $first_name, $last_name, $gender, $address, $phone_no, $email);

        if ($insertStmt->execute()) {
            // echo "New record inserted successfully.";
            echo "<script>alert('New record inserted successfully.');
            document.location = 'Studentform.php';
            </script>";
        } else {
            echo "Error: " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $conn->close();
}
?>
