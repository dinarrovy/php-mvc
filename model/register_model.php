<?php
require_once 'config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You should ideally perform validation and sanitation of user inputs here

    // Check if the email is already registered
    $check_query = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Insert user into database
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$nama', '$email', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful, redirect to login page
            header("Location:../view/auth_page/login.php");
            exit;
        } else {
            $error = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>