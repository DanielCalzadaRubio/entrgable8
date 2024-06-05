<?php
$user = $_GET['user'];
$room_id = $_GET['room_id'];

$conn = new mysqli("localhost", "root", "", "chat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM admins WHERE user = ? AND room_id = ?");
$stmt->bind_param("si", $user, $room_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$isAdmin = $result['count'] > 0;

echo json_encode(['isAdmin' => $isAdmin]);

$stmt->close();
$conn->close();
?>
