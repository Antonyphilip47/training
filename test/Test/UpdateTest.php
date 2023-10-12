<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
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

    $sql = "SELECT * FROM students WHERE email=? AND NOT(stud_id = ? )";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("si",$email,$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists in the database.";
        
    } else {

        $stmt->close();

        $updateSql = "UPDATE students SET first_name = ?, last_name = ?, address = ?, phoneno = ?, email = ? WHERE stud_id = ?";
        
        $updateStmt = $conn->prepare($updateSql);

        $updateStmt->bind_param("sssssi", $first_name, $last_name, $address, $phone_no, $email,$id);



        if ($updateStmt->execute()) {

            header("Location: studentdisplayfront.php");
            exit;
            echo "Updated succesfully.";
        } else {
            echo "Error: " . $updateStmt->error;
        }

        $updateStmt->close();
    }

    $conn->close();
}
?>
