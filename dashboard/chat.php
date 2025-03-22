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

        <h2>Select A Department To Chat With</h2>
        <div class="department-buttons">
            <button class="dept-btn guide" data-target="Guidance">Guidance & Counseling</button>
            <button class="dept-btn sec" data-target="security">Security</button>
            <button class="dept-btn cli" data-target="clinic">Medical</button>
        </div>

        <!-- Chat Boxes -->
        <section class="Guidance">
            <div class="chat-box">
                <div class="chat-message">
                    <p>
                        Thank you for the information. I’m ready to start the coaching. 
                        I want to focus on developing my emotional intelligence. How can we plan our sessions around that topic?
                    </p>
                    <span class="timestamp">09:02 AM</span>
                </div>

                <p class="typing-status">✎ Counselor is typing...</p>

                <div class="chat-input">
                    <input type="text" placeholder="Type a new message">
                    <button class="send-btn">Send</button>
                </div>
            </div>
        </section>
        <section class="security">
            <div class="chat-box">
                <div class="chat-message">
                    <p>
                        Can you provide more details on the security issue you are facing?
                    </p>
                    <span class="timestamp">09:15 AM</span>
                </div>

                <p class="typing-status">✎ Security officer is typing...</p>

                <div class="chat-input">
                    <input type="text" placeholder="Type a new message">
                    <button class="send-btn">Send</button>
                </div>
            </div>
        </section>
        <section class="clinic">
            <div class="chat-box">
                <div class="chat-message">
                    <p>
                        How can I assist you with your medical concerns today?
                    </p>
                    <span class="timestamp">09:30 AM</span>
                </div>

                <p class="typing-status">✎ Doctor is typing...</p>

                <div class="chat-input">
                    <input type="text" placeholder="Type a new message">
                    <button class="send-btn">Send</button>
                </div>
            </div>
        </section>
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