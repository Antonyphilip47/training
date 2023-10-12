<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginform.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <script src="jquery-latest.js"></script> -->
        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Home Page</title>
        <style></style>
        <script>

            function logout() {
                $.ajax({
                    url: 'logout.php', // PHP script for session destruction and redirect
                    type: 'POST',
                    success: function() {
                        window.location = 'loginform.php'; // Redirect to login page after session is destroyed
                    }
                });
            }
        </script>
    </head>
    <body>
        <h1>Home page</h1>
        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
        <button onclick="logout()">Logout</button>
    </body>
</html>