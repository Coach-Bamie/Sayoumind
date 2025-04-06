<?php
include '../config/mindpal.php'; // Database connection

// Check if the ID is passed
if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // Delete the user from the users table
    $sql = "DELETE FROM users WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the user ID
        $stmt->bind_param("i", $userId);

        // Execute the query
        if ($stmt->execute()) {
            echo 'success'; 
        } else {
            echo 'error'; 
        }

        
        $stmt->close();
    } else {
        echo 'error'; 
    }
}

// Close the database connection
$conn->close();
?>
