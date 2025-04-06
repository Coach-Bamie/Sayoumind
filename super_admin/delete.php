<?php
include '../config/mindpal.php';

if (isset($_POST['id'])) {
    $adminId = $_POST['id'];

    // Prepare and execute the deletion query
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $adminId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'failure';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'No admin ID provided.';
}
?>
