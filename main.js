$(document).ready(function() {
    var currentRoomId;

    function loadRooms() {
        $.get('get_rooms.php', function(data) {
            var rooms = JSON.parse(data);
            $('#rooms-list').html('');
            for (var i in rooms) {
                $('#rooms-list').append('<div class="room" data-id="' + rooms[i].id + '">' + rooms[i].name + '</div>');
            }

            $('.room').click(function() {
                currentRoomId = $(this).data('id');
                $('#room-selection').hide();
                $('#chat-container').show();
                loadMessages();
            });
        });
    }

    function loadMessages() {
        if (!currentRoomId) return;
        $.get('get_messages.php', {room_id: currentRoomId}, function(data) {
            $('#chat-box').html('');
            var messages = JSON.parse(data);
            for (var i in messages) {
                $('#chat-box').append('<p><strong>' + messages[i].user + ':</strong> ' + messages[i].message + '</p>');
            }
        });
    }

    setInterval(loadMessages, 2000);

    $('#chat-form').submit(function(e) {
        e.preventDefault();
        var user = $('#username').val();
        var message = $('#message').val();
        if (user.trim() === "" || message.trim() === "") {
            alert("Both username and message are required!");
            return;
        }
        $.post('send_message.php', {user: user, message: message, room_id: currentRoomId}, function() {
            $('#message').val('');
            loadMessages();
        });
    });

    $('#create-room').click(function() {
        var roomName = $('#room-name').val();
        if (roomName.trim() === "") {
            alert("Room name is required!");
            return;
        }
        $.post('create_room.php', {room_name: roomName}, function() {
            loadRooms();
        });
    });

    loadRooms();
});
