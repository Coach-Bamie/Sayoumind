<?php
include '../config/mindpal.php'; // Database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['Uname'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    // Basic Validation
    if (empty($name) || empty($password) || empty($department) || $department == 'Select department') {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Assign a role based on the department (you can modify this logic if needed)
    switch ($department) {
        case 'Security':
            $role = 'security';
            break;
        case 'Counsellor':
            $role = 'guidance';
            break;
        case 'Medical':
            $role = 'medical';
            break;
        default:
            $role = 'user';
            break;
    }

    $check_query = "SELECT * FROM users WHERE name='$name'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exists!');
            window.location.href='super_admin_admins.php';
            </script>";
           
        }else{
            // Prepare SQL query to insert new admin
            $sql = "INSERT INTO users (name, password, role) VALUES (?, ?, ?)";

            // Prepare statement
            if ($stmt = $conn->prepare($sql)) {
                // Bind parameters
                $stmt->bind_param("sss", $name, $hashedPassword, $role);

                // Execute the query
                if ($stmt->execute()) {
                    echo"<script>alert('Admin Added succesfully!');
                    window.location.href='super_admin_admins.php';
                    </script>";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing the statement.";
            }

            // Close the database connection
            $conn->close();
        }
}
?>
