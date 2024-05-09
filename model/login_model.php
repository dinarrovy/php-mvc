<?php
require_once"../../config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location:../index.php");
        exit;
    } else {
        // Authentication failed
        $error = "Username or password incorrect!";
    }

    // Close connection
    mysqli_close($conn);
}
?>