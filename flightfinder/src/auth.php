<?php
session_start();

function login($email, $password) {
    include 'db.php';
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $result->fetch_assoc();
        return true;
    }
    return false;
}

function logout() {
    session_destroy();
    header("Location: ../public/index.html");
    exit();
}
?>