

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit student</title>
    <style>
                form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        input[type=radio]{
            /* width: 0%; */
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=text]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=email]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=button]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }
    </style>
        <script>
            function validation(){
                firstname = document.getElementById("first_name").value;
                lastname = document.getElementById("last_name").value;
                address = document.getElementById("address").value;
                phone_no = document.getElementById("phone_no").value;
                email = document.getElementById("email").value;

                var regname = /^[A-Za-z]+$/;
                var regphone = /^[789]\d{9}$/;

                //fields validation
                if(firstname == "" || lastname == "" || address == "" || phone_no == "" || email == "" ){
                    alert("enter all fields");
                    return false;

                }

                //name validation
                if(!regname.test(firstname)||!regname.test(lastname)||firstname.length<3||lastname.length<3){
                    alert("enter name properly");
                    return false;
                }

                //address validation
                if(address.length>100){
                    alert("reduce address field");
                    return false;
                }

                //phone validation
                if(!regphone.test(phone_no)){
                    alert("enter phone number properly");
                    return false;
                }

                //submit form
                document.getElementById("myForm").submit();

            }
        </script>
</head>

<body>
    <h1>Edit user</h1>
    <?php
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "ceymox123";
        $dbname = "Student";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $checkSql = "SELECT * FROM students WHERE stud_id = $id";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            while ($row = $checkResult->fetch_assoc()) {
                $fullname = $row['first_name'] . ' ' . $row['last_name'];
                echo "
                <form id='myForm' method='post' action='UpdateTest.php'>
                    <label for='first_name'>First Name:</label>
                    <input type='hidden' id='stud_id' name='stud_id' value='{$row['stud_id']}'>
                    <input type='text' id='first_name' name='firstname' value='{$row['first_name']}' required>
                    <br>

                    <label for='last_name'>Last Name:</label>
                    <input type='text' id='last_name' name='lastname' value='{$row['last_name']}' required>
                    <br>

                    <label for='address'>Address</label>
                    <input type='text' id='address' name='address' value='{$row['address']}' required>
                    <br>

                    <label for='phone_no'>Phone</label>
                    <input type='text' id='phone_no' name='phone_no' value='{$row['phoneno']}' required>
                    <br>

                    <label for='email'>Email</label>
                    <input type='email' id='email' name='email' value='{$row['email']}' required>
                    <br>

                    <input type='button' onclick='validation()' value='Submit Form'>
                </form>
                ";
            }
        } else {

        }

        $conn->close();

    ?>

</body>

</html>

