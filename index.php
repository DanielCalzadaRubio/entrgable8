<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="room-selection">
        <input type="text" id="room-name" placeholder="Room name">
        <button id="create-room">Create Room</button>
        <div id="rooms-list"></div>
    </div>
    <div id="chat-container" style="display:none;">
        <div id="chat-box"></div>
        <form id="chat-form">
            <input type="text" id="username" placeholder="Your name">
            <textarea id="message" placeholder="Type your message"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
