<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - MindPal</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    text-align: center;
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
            margin-left: 150px;
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

.container {
    width: 60%;
    margin: 50px auto;
}

h2 {
    font-size: 22px;
    font-weight: bold;
}

.subtitle {
    font-style: italic;
    color: #666;
    margin-bottom: 20px;
}

.chat-box {
    background: #e5e5e5;
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    height: 50VH;
    margin: 0 auto;
}

.message {
    display: flex;
    align-items: center;
    margin: 10px 0;
}

.user {
    justify-content: flex-start;
}

.admin {
    justify-content: flex-end;
}

.message p {
    background: white;
    padding: 10px;
    border-radius: 5px;
    margin: 0 10px;
    max-width: 70%;
}

.icon {
    font-size: 20px;
}

.response-box {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.response-box input {
    width: 60%;
    height: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.response-box button {
    background: #4f54fc;
    color: white;
    border: none;
    height: 40px;
    padding: 10px 15px;
    margin-left: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.response-box button:hover {
    background: #3e42e0;
}

    </style>
</head>
<body>

    <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
            <button class="menu-toggle">☰</button>
        <button class="close-menu">✖</button>
        </div>
        <nav>
            <ul>
                <li><a href="../dashboard/message_history.php">History</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Admin Panel FUD MindPal</h2>
        <p class="subtitle">Veiw And Respond To Anonymous Messags Securly</p>

        <div class="chat-box">
            <div class="message user">
                <span class="icon">👤</span>
                <p>Good afternoon, please I feel unsafe,</p>
            </div>
            <div class="message admin">
                <p>Express your feelings, we’re here to guide you</p>
                <span class="icon">👤</span>
            </div>
        </div>

        <div class="response-box">
            <input type="text" placeholder="Type your response">
            <button>Send Response</button>
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
