<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uname = $_POST["username"];
    $pass = $_POST["password"];

    //database connection

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

    //check to see duplicate username 

    // SQL query to retrieve records from the students table
    $sql = "SELECT * FROM users WHERE username = '$uname'";
    $result = $conn->query($sql);

    // Display records in the table
    if ($result->num_rows > 0) {
        echo "Username already exists in the database.";
    } else {

            // SQL query to insert data into the students table
        $sql = "INSERT INTO users (username, password)
        VALUES ('$uname', '$pass')";

        // Perform the SQL query
        if ($conn->query($sql) === TRUE) {
            header("Location: loginform.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }


    // Close the database connection
    $conn->close();
}

?>