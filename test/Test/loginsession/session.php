<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form values

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
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = $conn->query($sql);

    // Display records in the table
    if ($result->num_rows > 0) {
        session_start();

        $_SESSION['username'] = $uname; 
        $_SESSION['password'] = $pass; 
    
    
        header('Location: homepage.php');

    } else {

        echo "No user found";

    }


    // Close the database connection
    $conn->close();

    //session




}



?>