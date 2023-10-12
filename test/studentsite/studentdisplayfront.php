<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

    </style>
</head>

<body>
    <h1>Student Records</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>
        <?php include 'studentdisplayback.php'; ?>
    </table>
    <!-- <script src="script.js"></script> -->

    <script>

        function deleteRow(){
            alert("hello");
        }
    </script>

</body>

</html>
