<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flightName = $_POST['flight_name'];
    $departureCity = $_POST['departure_city'];
    $destinationCity = $_POST['destination_city'];
    $totalSeats = $_POST['total_seats'];
    $basePrice = $_POST['base_price'];

    $stmt = $conn->prepare("INSERT INTO flights (flight_name, departure_city, destination_city, total_seats, base_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $flightName, $departureCity, $destinationCity, $totalSeats, $basePrice);
    $stmt->execute();
}
?>