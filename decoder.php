<?php

$jsonData = file_get_contents('booking_data.json');

$bookings = json_decode($jsonData, true);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($bookings as $booking) {
    $participation_id = $booking['participation_id'];
    $employee_name = $booking['employee_name'];
    $employee_mail = $booking['employee_mail'];
    $event_id = $booking['event_id'];
    $event_name = $booking['event_name'];
    $participation_fee = $booking['participation_fee'];
    $event_date = $booking['event_date'];
    $version = isset($booking['version']) ? $booking['version'] : '';

    $sql = "INSERT INTO bookings (participation_id, employee_name, employee_mail, event_id, event_name, participation_fee, event_date, version)
            VALUES ('$participation_id', '$employee_name', '$employee_mail', '$event_id', '$event_name', '$participation_fee', '$event_date', '$version')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking inserted successfully";
    } else {
        echo "Error inserting booking: " . $conn->error;
    }
}

$conn->close();

?>
