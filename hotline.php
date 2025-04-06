<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - Hotlines</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    width: 100%;
    height: 100vh;
    text-align: center;
    background-color: #ffffff;
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
           .nav {
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

    .profile a {
            text-decoration: none;
            color: black;
        }

        /* Hotlines Page */
.hotlines-container {
    display: block;
    width: 300px;
    margin: 50px auto;
}

.hotline {
    display: inline-block;
    width: 300px;
    margin: 70px auto;
    height: 400px;
    background: white;
    border-radius: 10px;
    text-align: center;
    box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.1);
}

.hotline img {
    margin: 30px auto;
    width: 200px;
    height: 200px;
    border-radius: 5px;
    object-fit: fill;
}

.hotline h3 {
    margin: 20px auto;
    font-size: 18px;
}

.hotline p {
    color: gray;
    font-size: 15px;
}

.hotline a {
    text-decoration: none;
    color: rgb(159, 165, 241);
}
.call-btn {
    margin-top: 15px;
    background: transparent;
    border: 1px solid blue;
    color: blue;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease;
}

.call-btn:hover {
    background: blue;
    color: white;
}

/* Footer */
footer {
    display: grid;
    grid-template-columns: 1fr;
    background: #080808;
    padding: 20px;
    margin: 0;
    height: 150px;
    width: 100%;
    text-align: center;
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr;
    text-align: center;
}

.footer-content .footer-logo {
    display: flex;
    position: relative;
    margin: auto auto;
}

.footer-logo {
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
}

.footer-logo img {
    width: 30px;
    margin-right: 10px;
}

 .footer-content span {
    color: white;
}

.footer-content .newsletter {
    margin: auto;
    width: 300px;
    display: flex;
    align-items: center;
}

.newsletter input {
    padding: 10px;
    width: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.newsletter button {
    cursor: pointer;
    background: #6c63ff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    margin-left: 5px;
}


.footer-content .newsletter input {
    width: 200px;
    height: 35px;
}

.footer-nav {
    margin: auto 0px;
    margin-top: 10px;
    color: white;
}

.footer-nav a {
    margin: 0 10px;
    color: #fcf9f9;
    text-decoration: none;
    font-size: 16px;
}

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="./assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
            <button class="menu-toggle">☰</button>
        <button class="close-menu">✖</button>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="./dashboard/dashboard.php" class="active">Dashboard</a></li>
                <li><a href="./community.php">Community</a></li>
                <li><a href="./public/contact.php">Contact</a></li>
            </ul>
              <div class="profile">
            <a href="./dashboard/user_profile.php">
                <img src="./assets/images/icon_pal.png" alt="User Profile">
                    <?php echo $_SESSION['username'] ?? 'Guest'; ?></p>
            </a>
        </div>
        </nav>
    </header>

    <!-- Hotlines Section -->
    <main class="hotlines-container">
        <div class="hotline">
            <img src="./assets/images/fire service.jpeg" alt="Fire Service">
            <h3>FUD FIRE SERVICE</h3>
            <p>Available 24/7</p>
            <button class="call-btn">
                <a href="tel:+234703877789">CALL NOW</a>
            </button>
        </div>

        <div class="hotline">
            <img src="./assets/images/health.jpeg" alt="Health Director">
            <h3>HEALTH DIRECTOR</h3>
            <p>Available 24/7</p>
            <button class="call-btn"><a href="tel:+2347038537723
                ">CALL NOW</a>
            </button>
        </div>

        <div class="hotline">
            <img src="./assets/images/security.jpeg" alt="Security Supervisor">
            <h3>SECURITY PATROL SUPERVISOR</h3>
            <p>Available 24/7</p>
            <button class="call-btn"><a href="tel:+234806533284
                ">CALL NOW</a>
            </button>
        </div>

        <div class="hotline">
            <img src="./assets/images/sug.jpeg" alt="SUG President">
            <h3>SUG PRESIDENT</h3>
            <p>Available 24/7</p>
            <button class="call-btn"><a href="tel:+2348026143737">CALL NOW</a>
            </button>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="./assets/images/mindpal_logo.png" alt="MindPal Logo">
                <span>MindPal</span>
            </div>
            <div class="newsletter">
                <input type="email" placeholder="Input your email">
                <button>Subscribe</button>
            </div>
        </div>
        <nav class="footer-nav">
            <a href="./about.php">About Us</a>
            <a href="./public/contact.php">Contact Us</a>
            <a href="./public/faqs.php">FAQs</a>
        </nav>
    </footer>
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
