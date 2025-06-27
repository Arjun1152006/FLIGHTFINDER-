<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (login($email, $password)) {
        header("Location: ../public/admin.html");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>