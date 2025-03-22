<?php
// Include the database connection
include 'mindpal_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert new message into the database
    $department = $_POST['department'];
    $message = $_POST['message'];
    $sender = $_POST['sender'];

    $stmt = $pdo->prepare("INSERT INTO messages (department, message, sender) VALUES (?, ?, ?)");
    $stmt->execute([$department, $message, $sender]);
}

// Fetch messages based on department
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $department = $_GET['department'];

    $stmt = $pdo->prepare("SELECT * FROM messages WHERE department = ? ORDER BY timestamp ASC");
    $stmt->execute([$department]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($messages);
}
