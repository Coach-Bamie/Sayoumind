<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    header("Location: ../public/signin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal Dashboard</title>
    <style>
        /* Base Styles (for Desktop) */
        
        /* Dashboard Styles */
        /* General Styling */
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

/* Dashboard Styles */
.dashboard {
    text-align: center;
    padding: 40px 20px;
}

.dashboard h1 {
    font-size: 28px;
    color: #333;
}

.welcome {
    font-size: 22px;
    font-weight: bold;
}

.subtext {
    font-size: 16px;
    color: gray;
    font-style: italic;
    margin-bottom: 20px;
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-top: 20px;
}

.btn-action {
    display: block;
    width: 300px;
    background: #add8e6;
    color: black;
    padding: 15px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease-in-out;
}

.btn-action:hover {
    background: #87ceeb;
}

/* Profile Icon */
.profile img {
    margin-left: 50px;
    width: 40px;
    cursor: pointer;
    height: 40px;
    border-radius: 50%;
}

/* Active Link */
nav ul li a.active {
    font-weight: bold;
    text-decoration: underline;
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
    <!-- Dashboard Content -->
    <main class="dashboard">
        <h1>Your MindPal Dashboard</h1>
        <p class="welcome">Welcome, <?php echo $_SESSION['username'] ?? 'Guest'; ?></p>
        <p class="subtext">Stay safe, stay anonymous</p>

        <div class="quick-actions">
            <a href="../dashboard/chat.php" class="btn-action">Start Chat</a>
            <a href="../hotline.php" class="btn-action">Call Hotlines</a>
            <a href="../community.php" class="btn-action">Community Support</a>
        </div>
    </main>
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
