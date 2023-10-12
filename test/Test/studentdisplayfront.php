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
            <th>Full name</th>
            <th>Phone no</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php include 'studentdisplayback.php'; ?>
    </table>
    <script src="script.js"></script>
</body>

</html>
