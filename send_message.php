<?php
$user = $_POST['user'];
$message = $_POST['message'];
$room_id = $_POST['room_id'];

$conn = new mysqli("localhost", "root", "", "chat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO messages (user, message, room_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $user, $message, $room_id);
$stmt->execute();
$stmt->close();
$conn->close();
?>
