<?php
session_start();
include '../config/mindpal.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    header("Location: ../public/signin.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get user id from session (ensure it's set on login)

// Fetch messages from the database
$query = "SELECT gm.*, u.name, r.message AS replied_message FROM group_messages gm
          LEFT JOIN users u ON gm.sender_id = u.id
          LEFT JOIN group_messages r ON gm.reply_to_message_id = r.id
          ORDER BY gm.created_at ASC";
$result = mysqli_query($conn, $query);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

echo json_encode($messages);
exit();
?>
