<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];

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

    // SQL query to insert data into the students table
    $sql = "INSERT INTO students (first_name, last_name, dob, gender, email)
            VALUES ('$first_name', '$last_name', '$date_of_birth', '$gender', '$email')";

    // Perform the SQL query
    if ($conn->query($sql) === TRUE) {
        header("Location: studentdisplayfront.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
