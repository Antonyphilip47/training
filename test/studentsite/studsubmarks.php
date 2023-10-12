<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $student = $_POST["student"];
    $subject = $_POST["subject"];
    $marks = $_POST["marks"];


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
    $sql = "INSERT INTO studentMarks (stud_id, subj_id, marks)
            VALUES ('$student', '$subject', '$marks')";

    // Perform the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Value inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Enter</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th:last-child,
        td:last-child {
            text-align: center;
        }

        .delete-button {
            background-color: #ff3333;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #cc0000;
        }
        select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    input{
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    /* Optional: Style the options inside the select dropdown */
    select option {
        font-size: 14px;
        background-color: #fff;
        color: #333;
    }

    /* Optional: Style the select element when hovered */
    select:hover {
        border-color: #999;
    }

    </style>

</head>

<body>
    <h1>Student Marks Enter</h1>
    <form method="post">
    <table border="1">
        <tr>
            <th>Student</th>
            <th>Subject</th>
            <th>Marks</th>
        </tr>
        <tr>
            <td><?php include 'studentname.php'; ?></td>
            <td><?php include 'subject.php'; ?></td>
            <td><input type="number" name="marks" min="0" max="100" step="1"></td>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>

</body>

</html>
