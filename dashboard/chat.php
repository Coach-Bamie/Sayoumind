<?php
ini_set('session.cookie_lifetime', 86400); // 24 hours
session_start(); 


include '../config/mindpal.php'; 

// Ensure $conn is defined as a PDO connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL
    header("Location: ../public/signin.php");  // Redirect to login page if not logged in
    exit();
}

// Get logged-in user's ID
$sender_id = $_SESSION['user_id'];

// Define department receiver IDs
$departments = [
    'Guidance' => 1, // Example: Guidance department has receiver_id 1
    'Security' => 2, // Example: Security department has receiver_id 2
    'Clinic' => 3    // Example: Clinic department has receiver_id 3
];

// Initialize variables
$selected_department = '';
$receiver_id = 0;
$messages = [];

// Handle department selection and message sending
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // If a department is selected
    if (isset($_POST['department'])) {
        $selected_department = $_POST['department'];
        $receiver_id = $departments[$selected_department];

        // If a message is sent
        if (!empty($_POST['message'])) {
            $message = $_POST['message'];

            // Insert the new message into the database
            $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
            $stmt->execute([$sender_id, $receiver_id, $message]);
        }
    }
}

// Fetch messages for the selected department
if ($receiver_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY created_at ASC");
    $stmt->execute([$sender_id, $receiver_id, $receiver_id, $sender_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        /* Navigation */
        nav {
            display: flex;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }

        /* Hamburger Menu */
        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .close-menu {
            display: none;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            position: absolute;
            top: 15px;
            right: 10%;
        }

        /* Responsive Navigation */
        @media screen and (max-width: 768px) {
            nav {
                display: none;
                flex-direction: column;
                background: white;
                position: absolute;
                top: 60px;
                right: 10%;
                width: 200px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin-bottom: 15px;
            }

            .menu-toggle {
                display: block;
            }
        }
                .profile img {
            width: 40px;
            cursor: pointer;
            height: 40px;
            border-radius: 50%;
        }
        /* Chat Page */
        .chat-container {
            width: 80%;
            margin: 40px auto;
            text-align: center;
        }

        /* Back Button */
        .back-button a {
            font-size: 30px;
            text-decoration: none;
            color: black;
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

        /* Typing Status */
        .typing-status {
            font-style: italic;
            color: gray;
            margin-bottom: 10px;
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

        .Guidance, .security, .clinic {
            display: none;
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
        </div>
        <button class="menu-toggle">☰</button>
        <button class="close-menu">✖</button>
        <nav>
            <ul>
                <li><a href="../dashboard/dashboard.php" class="active">Dashboard</a></li>
                <li><a href="../dashboard/message_history.php">History</a></li>
                <li><a href="../community.php">Community</a></li>
            </ul>
            <div class="profile">
            <a href="../dashboard/user_profile.php">
                <img src="../assets/images/icon_pal.png" alt="User Profile">
                    <?php echo $_SESSION['username'] ?? 'Guest'; ?></p>
            </a>
        </div>
        </nav>
    </header>
    <!-- Chat Section -->
    <main class="chat-container">
        <div class="back-button">
            <a href="dashboard.html">←</a>
        </div>
    <div class="chat-container">
        <h2>Select a Department to Chat With</h2>
        <form method="POST" action="">
            
            <div class="department-buttons">
                <button type="submit" name="department" value="Guidance" class="dept-btn guide">Guidance & Counseling</button>
                <button type="submit" name="department" value="Security" class="dept-btn sec">Security</button>
                <button type="submit" name="department" value="Clinic" class="dept-btn cli">Medical</button>
            </div>
        </form>

        <!-- Chat Box -->
        <?php if ($selected_department): ?>
            <h3>Chatting with <?php echo $selected_department; ?> Department</h3>

            <div class="chat-box">
                <?php foreach ($messages as $message): ?>
                    <div class="chat-message">
                        <p><?php echo htmlspecialchars($message['message']); ?></p>
                        <span class="timestamp"><?php echo date('h:i A', strtotime($message['created_at'])); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <form method="POST" action="">
                <div class="chat-input">
                    <input type="hidden" name="department" value="<?php echo $selected_department; ?>">
                    <input type="text" name="message" placeholder="Type a new message..." required>
                    <button type="submit" class="send-btn">Send</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
    <script>
       // Hamburger Menu Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const closeMenu = document.querySelector('.close-menu');
        const nav = document.querySelector('nav');

        menuToggle.addEventListener('click', () => {
            nav.style.display = "flex";
            menuToggle.style.display = "none";
            closeMenu.style.display = "block";
        });

        closeMenu.addEventListener('click', () => {
            nav.style.display = "none";
            menuToggle.style.display = "block";
            closeMenu.style.display = "none";
        });

               // Close menu on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                nav.style.display = "flex";
                menuToggle.style.display = "none";
                closeMenu.style.display = "none";
            } else {
                nav.style.display = "none";
                menuToggle.style.display = "block";
            }
        });

        // Select all department buttons
        const buttons = document.querySelectorAll('.dept-btn');
        const sections = document.querySelectorAll('.Guidance, .security, .clinic');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Hide all sections first
                sections.forEach(section => section.style.display = 'none');

                // Get target chat section
                const target = button.getAttribute('data-target');
                document.querySelector('.' + target).style.display = 'block';
            });
        });
    </script>
</body>
</html>
