<?php
$conn = new mysqli("localhost", "root", "", "chat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name FROM rooms");

$rooms = array();
while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
}
echo json_encode($rooms);

$conn->close();
?>
