<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - Settings</title>
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
            margin-left: 150px;
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


    /* Settings Page */
.settings-container {
    width: 80%;
    margin: 40px auto;
    text-align: center;
}

.profile-info img {
    width: 50px;
    border-radius: 50%;
}

.profile-info h2 {
    font-size: 22px;
    margin: 5px 0;
}

.profile-info p {
    color: gray;
    font-size: 14px;
}

.settings-options {
    margin: 30px 0;
}

.settings-options h3 {
    font-size: 20px;
    margin-bottom: 15px;
}

.settings-options ul {
    list-style: none;
    padding: 0;
}

.settings-options li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 16px;
    padding: 8px 0;
    cursor: pointer;
}

.settings-options li:hover {
    color: blue;
}

.update-profile {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
}

.update-profile img {
    width: 40%;
    border-radius: 10px;
}

.update-text {
    width: 50%;
}

.update-text h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.update-text p {
    font-size: 14px;
    color: gray;
}

.update-btn {
    background: blue;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

.update-btn:hover {
    background: darkblue;
}

   </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
             <button class="menu-toggle">☰</button>
        <button class="close-menu">✖</button>
        </div>
        <nav>
            <ul>
                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                <li><a href="../community.php">Community</a></li>
                <li><a href="../public/contact.php">Contact Us</a></li>
            </ul>
        </div>
        </nav>
    </header>

    <!-- Settings Section -->
    <main class="settings-container">
        <div class="profile-info">
            <a href="setting.html">
                <img src="../assets/images/icon_pal.png" alt="User Profile">
            </a>
            <h2><?php echo $_SESSION['username'] ?? 'Guest'; ?></h2>
            <p>View and edit your profile</p>
        </div>

        <div class="settings-options">
            <h3>Settings</h3>
            <ul>
                <li>Account Setting</li>
                <li><i class="icon">📩</i> Enable Email Notifications</li>
                <li><i class="icon">🔒</i> Change Password</li>
                <li><i class="icon">🤝</i> Community Support</li>
            </ul>
        </div>

        <div class="update-profile">
            <img src="../assets/images/updatePro.jpg" alt="Update Profile">
            <div class="update-text">
                <h3>Update Your Profile</h3>
                <p>Keep your profile up-to-date to make the most of MindPal. Easily edit your information or save changes with a simple tap.</p>
                <button class="update-btn">Update Profile</button>
            </div>
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
