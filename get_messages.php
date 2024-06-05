<?php
$room_id = $_GET['room_id'];

$conn = new mysqli("localhost", "root", "", "chat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT user, message, timestamp FROM messages WHERE room_id = ?");
$stmt->bind_param("i", $room_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}
echo json_encode(array_reverse($messages));

$stmt->close();
$conn->close();
?>
