<!DOCTYPE html>
<html lang="en">
    <head>
            <!-- <script src="jquery-latest.js"></script> -->
            <!-- Remember to include jQuery :) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

            <!-- jQuery Modal -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
            <title>Login Form</title>
            <style></style>
            <script></script>
    </head>
    <body>
        <h1>Login Form</h1>
        <form id="myForm" method="post" action="cookie.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <span id="username"></span>
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <span id="password"></span>
            <br>

            <input type="submit" value="Submit">

            <!-- <input type="button" id="submitbutton" onclick="validation()" value="Submit Form"> -->

        </form>
    </body>
</html>