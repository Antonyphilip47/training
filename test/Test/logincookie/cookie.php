<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form values

    $username = $_POST["username"];
    $password = $_POST["password"];

    //cookie

    $cookie_name = "username";
    $cookie_value = $username;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $cookie_name = "password";
    $cookie_value = $password;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    header('Location: homepage.php');


}

?>