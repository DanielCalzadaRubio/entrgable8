CREATE DATABASE chat_db;
USE chat_db;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50),
    message TEXT,
    room_id INT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

CREATE TABLE admins (
    user VARCHAR(50),
    room_id INT,
    PRIMARY KEY (user, room_id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);
