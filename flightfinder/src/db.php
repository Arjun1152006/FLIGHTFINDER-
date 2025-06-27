<?php
// htdocs/flightfinder/Server/db.php

$host = 'localhost';
$username = 'root';
$password = ''; // default for XAMPP is empty
$dbname = 'user_system';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>