<?php
$room_name = $_POST['room_name'];

$conn = new mysqli("localhost", "root", "", "chat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO rooms (name) VALUES (?)");
$stmt->bind_param("s", $room_name);
$stmt->execute();
$stmt->close();
$conn->close();
?>
