<?php
ini_set('session.cookie_lifetime', 86400); // 24 hours
session_start();

include '../config/mindpal.php'; // Configuration file that contains database credentials

// Ensure $conn is defined as a MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL
    header("Location: ../public/signin.php");  // Redirect to login page if not logged in
    exit();
}

// Get logged-in user's ID
$sender_id = $_SESSION['user_id'];

// Define department roles
$departments = [
    'Guidance' => 'Guidance', // Role for Guidance department
    'Security' => 'Security', // Role for Security department
    'Clinic' => 'Medical'     // Role for Clinic department
];

// Initialize variables
$selected_department = '';
$users = [];

// Fetch user details
$stmt = $conn->prepare("SELECT name, role FROM users WHERE id = ?");
$stmt->bind_param("i", $sender_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();

// Handle department selection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['department'])) {
        $selected_department = $_POST['department'];
        $role = $departments[$selected_department];

        // Fetch users based on the department role
        $stmt = $conn->prepare("SELECT id, name FROM users WHERE role = ?");
        $stmt->bind_param("s", $role);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal Chat</title>
    <style>
        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 15px 10%;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: bold;
        }

        .logo img {
            width: 40px;
            margin-right: 10px;
        }

        /* Chat Page */
        .chat-container {
            width: 80%;
            margin: 40px auto;
            text-align: center;
        }

        /* Department Selection */
        h2 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .department-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .dept-btn {
            padding: 10px 15px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .dept-btn:hover {
            background: #ddd;
        }

        /* User List */
        .user-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .user-item {
            padding: 10px;
            background: #f7f7f7;
            margin: 5px 0;
            width: 70%;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .user-item:hover {
            background: #ddd;
        }

        /* Chat Box */
        .chat-box {
            width: 70%;
            margin: 20px auto;
            padding: 15px;
            border-radius: 8px;
            background: #f7f7f7;
            text-align: left;
        }

        .chat-message {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .timestamp {
            display: block;
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }

        /* Chat Input */
        .chat-input {
            display: flex;
            gap: 5px;
            margin-top: 15px;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .send-btn {
            padding: 10px 15px;
            background: #646cff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
        </div>
        <nav>
            <ul>
                <li><a href="../dashboard/dashboard.php" class="active">Dashboard</a></li>
                <li><a href="../dashboard/message_history.php">History</a></li>
                <li><a href="../community.php">Community</a></li>
            </ul>
            <div class="profile">
                <a href="../dashboard/user_profile.php">
                    <img src="../assets/images/icon_pal.png" alt="User Profile">
                    <p><?php echo htmlspecialchars($user['name']) . ' (' . htmlspecialchars($user['role']) . ')'; ?></p>
                </a>
            </div>
        </nav>
    </header>
    <!-- Chat Section -->
    <main class="chat-container">
        <h2>Select a Department to Chat With</h2>
        <form method="POST" action="">
            <div class="department-buttons">
                <button type="submit" name="department" value="Guidance" class="dept-btn guide">Guidance & Counseling</button>
                <button type="submit" name="department" value="Security" class="dept-btn sec">Security</button>
                <button type="submit" name="department" value="Clinic" class="dept-btn cli">Medical</button>
            </div>
        </form>

        <!-- Display Users Based on Department -->
        <?php if ($selected_department && count($users) > 0): ?>
            <h3>Users in <?php echo htmlspecialchars($selected_department); ?> Department</h3>
            <div class="user-list">
                <?php foreach ($users as $user): ?>
                    <div class="user-item" onclick="window.location.href='chatroom.php?receiver_id=<?php echo $user['id']; ?>'">
                        <?php echo htmlspecialchars($user['name']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
