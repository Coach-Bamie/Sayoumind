<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    header("Location: ../public/signin.php");
}


include '../config/mindpal.php';

$user_id = $_SESSION['user_id']; 

// Function to fetch all unique senders where receiver_id is the session user_id
function getMessageSenders($conn, $user_id) {
    $sql = "SELECT DISTINCT users.name, users.id FROM messages 
            JOIN users ON messages.sender_id = users.id 
            WHERE messages.receiver_id = '$user_id' ORDER BY messages.created_at DESC";
    $result = $conn->query($sql);
    
    $senders = [];
    while ($row = $result->fetch_assoc()) {
        $senders[] = $row;
    }
    return $senders;
}

// Fetch senders
$senders = getMessageSenders($conn, $user_id);
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <style>
    * {
            margin: 0;
            padding: 0;box-sizing: border-box;
        }
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
    margin-left: 50px;
    width: 40px;
    cursor: pointer;
    height: 40px;
    border-radius: 50%;
}

.profile a {
    text-decoration: none;
    color: black;
}

.h1 {
  text-align: center;
  padding-top: 20px;
  padding-bottom: 20px;
}
        .chat-container {
            width: 100%;
            max-width: 400px;
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }
        .chat {
            display: flex;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #333;
            transition: background 0.3s ease;
        }
        .chat:hover {
            background-color:rgb(103, 102, 102);
            cursor: pointer;
        }
        .chat:last-child {
            border-bottom: none;
        }
        .chat img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid #636ae8;
        }
        .chat-info {
            flex-grow: 1;
        }
        .chat-info h4 {
            margin: 0;
            font-size: 16px;
            color: black;
        }
        .chat-info p {
            margin: 5px 0 0;
            color: black;
            font-weight: 400;
            font-size: 14px;
        }
        .time {
            font-size: 12px;
            color: #888;
        }
        .unread {
            background-color: #636ae8;
            color: white;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 12px;
            margin-left: 10px;
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
                <li><a href="./admin_dashboard.php" class="active">Dashboard</a></li>
                <li><a href="../dashboard/message_history.php">History</a></li>
                <li>
                    <a href="../about.php">About</a>
                </li>
                <li><a href="../dashboard/logout.php">Log-out</a></li>
            </ul>
            <div class="profile">
            <a href="../dashboard/user_profile.php">
                <img src="../assets/images/icon_pal.png" alt="User Profile">
    <?php echo $_SESSION['username'] ?? '$user'; ?></p>
            </a>
        </div>
        </nav>
    </header>
    <h1 class="h1">Admin ChatList</h1>
    <div class="chat-container">
        <div class="chat" id="chat">
            <img src="../assets/images/icon_pal.png" alt="User 1">
            <div class="card-body sender-list chat-info">
                        <?php if (!empty($senders)): ?>
                            <?php foreach ($senders as $sender): ?>
                                <a href='../dashboard/chatroom.php?receiver_id=<?php echo $sender['id']; ?>'>
                                    <?php echo htmlspecialchars($sender['name']); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">No messages received.</p>
                        <?php endif; ?>
                    </div>
            <span class="time">10:26 AM</span>
            <span class="unread">1</span>
        </div>
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

       
    </script>
</body>
</html>