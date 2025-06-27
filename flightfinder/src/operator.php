<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flightOperator = $_POST['flight_operator'];
    $flightId = $_POST['flight_id'];
    $departureCity = $_POST['departure_city'];
    $destinationCity = $_POST['destination_city'];
    $totalSeats = $_POST['total_seats'];
    $basePrice = $_POST['base_price'];

    $stmt = $conn->prepare("INSERT INTO operators (flight_operator, flight_id, departure_city, destination_city, total_seats, base_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $flightOperator, $flightId, $departureCity, $destinationCity, $totalSeats, $basePrice);
    $stmt->execute();
}
?>