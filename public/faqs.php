<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - FAQs</title>
    <style>

        /* Header */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: #ffffff;
}

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
                margin-left: 200px;
            }
        }

        /* FAQs Page */
.faq-container {
    width: 50%;
    margin: 50px auto;
    text-align: center;
}

.faq-container h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.faq-list {
    text-align: left;
}

.faq-list details {
    background: white;
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
    cursor: pointer;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

.faq-list summary {
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

.contact-btn {
    margin-top: 20px;
    padding: 12px 20px;
    background: #635BFF;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.contact-btn:hover {
    background: #554AE3;
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
        <nav class="nav">
            <ul>
                <li><a href="../public/index.php">Home</a></li>
                <li>
                    <a href="../dashboard/dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="../about.php">About</a>
                </li>
                <li><a href="../community.php">Community</a></li>
                <li><a href="../public/contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- FAQs Section -->
    <main class="faq-container">
        <h2>FAQs</h2>
        <div class="faq-list">
            <details>
                <summary>How to use MindPal?</summary>
                <p>MindPal is a platform designed to provide support and resources...</p>
            </details>
            <details>
                <summary>How to use MindPal?</summary>
                <p>MindPal helps you connect with professionals for support...</p>
            </details>
            <details>
                <summary>How to use MindPal?</summary>
                <p>You can navigate through different sections to find...</p>
            </details>
            <details>
                <summary>How to use MindPal?</summary>
                <p>MindPal offers a variety of tools and resources to help you...</p>
            </details>
        </div>

        <button class="contact-btn">📩 For More - Contact us</button>
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
