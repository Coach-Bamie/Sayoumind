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

// Handle new message send
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
    $reply_to_message_id = isset($_POST['reply_to_message_id']) ? $_POST['reply_to_message_id'] : null;

    // Insert message into database
    $query = "INSERT INTO group_messages (sender_id, message, reply_to_message_id) VALUES ('$user_id', '$message', '$reply_to_message_id')";
    $yamo = mysqli_query($conn, $query); // Insert message into database
     
     if($yamo){
       echo" <script> console.log('Message Sent') </script>";
     }  else {
        echo "error: ";
     }

    // Respond back with a success message
    echo json_encode(['status' => 'success']);
    exit();
}
?>