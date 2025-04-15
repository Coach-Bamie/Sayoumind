<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - Your Campus Support Companion</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
        /* General Styles */
body {
    overflow-x: hidden;
    font-family: Arial, sans-serif;
    width: 100%;
    height: 100vh;
    text-align: center;
    background-color: #ffffff;
}

header {
            display: flex;
            width: 100%;
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
        @media (max-width: 768px) {
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
                margin-left: 150px;
            }
        }

/* Auth Buttons */
.auth-buttons {
    display: flex;
    gap: 10px;
}

.btn-light, .btn-dark {
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
}

.btn-light {
    background: transparent;
    border: 1px solid #6c63ff;
    color: #6c63ff;
}

.btn-dark {
    background: #6c63ff;
    color: white;
    border: none;
}

/* Hero Section */
.hero {
    padding: 80px 20px;
    color: #333;
}

.hero h1 {
    font-size: 36px;
}

.hero p {
    font-size: 20px;
    color: #555;
}

.hero img {
    width: 60%;
    margin-top: 20px;
}

.btn-primary {
    display: inline-block;
    background: #6c63ff;
    color: white;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 10px;
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
                <li><a href="#">Home</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./public/faqs.php">FAQs</a></li>
            </ul>
            <div class="auth-buttons">
            <a href="./public/signup.php" class="btn-light">Sign Up</a>
            <a href="./public/signin.php" class="btn-dark">Login</a>
        </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="hero">
        <h1>Welcome to MindPal</h1>
        <img src="./assets/images/mindpal_cover.jpg" alt="Illustration">
        <p>Your Trusted Companion</p>
        <a href="../public/signin.php" class="btn-primary">Get Started</a>
    </main>

    <!-- Footer -->
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
            <a href="../about.php">About Us</a>
            <a href="../public/contact.php">Contact Us</a>
            <a href="../public/faqs.php">FAQs</a>
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
