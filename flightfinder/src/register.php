<?php
// htdocs/flightfinder/Server/register.php

session_start();

require 'db.php'; // make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are sent
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure hashing

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: ../public/register.html"); // Redirect after success
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Email or password not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>