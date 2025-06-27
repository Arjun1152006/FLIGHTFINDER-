<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../public/login.html");
    exit();
}

// Fetch users
$usersQuery = "SELECT * FROM users";
$usersResult = $conn->query($usersQuery);

// Fetch bookings
$bookingsQuery = "SELECT * FROM bookings";
$bookingsResult = $conn->query($bookingsQuery);

// Fetch flights
$flightsQuery = "SELECT * FROM flights";
$flightsResult = $conn->query($flightsQuery);
?>