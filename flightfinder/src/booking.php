<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user']['id'];
    $flightId = $_POST['flight_id'];
    $passengerCount = $_POST['passenger_count'];
    $totalPrice = $_POST['total_price'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, flight_id, passenger_count, total_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $userId, $flightId, $passengerCount, $totalPrice);
    $stmt->execute();
}
?>