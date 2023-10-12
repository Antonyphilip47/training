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
            <style>
                form {
                    max-width: 400px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    text-align: center;
                }

                input[type=text]{
                    width: 50%;
                    margin: 8px 0;
                    padding: 14px 20px;
                }

                input[type=password]{
                    width: 50%;
                    margin: 8px 0;
                    padding: 14px 20px;
                }

                .button {
                    /* background-color: #4CAF50; */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                }

            </style>
            <script></script>
    </head>
    <body>
        <h1>Login Form</h1>
        <form id="myForm" method="post" action="session.php">
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