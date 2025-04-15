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
    <title>MindPal - Contact Us</title>
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
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

        .profile img {
        margin-left: 10px;
        width: 40px;
        cursor: pointer;
        height: 40px;
        border-radius: 50%;
    }

    .profile a {
        text-decoration: none;
        color: black;
    }

        /* Contact Us Page */
.contact-container {
    text-align: center;
    margin: 40px auto;
    width: 50%;
}

.contact-container h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.contact-container p {
    font-size: 14px;
    color: gray;
    margin-bottom: 20px;
}

.contact-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}

.contact-box h3 {
    font-size: 20px;
    margin-bottom: 15px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form label {
    font-size: 14px;
    text-align: left;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid lightgray;
    border-radius: 5px;
    font-size: 14px;
}

textarea {
    height: 100px;
    resize: none;
}

.submit-btn {
    background: blue;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.submit-btn:hover {
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
                <li><a href="../about.php">About Us</a></li>
                <li><a href="./faqs.php">FAQs</a></li>
            </ul>
             <div class="profile">
            <a href="../dashboard/user_profile.php">
                <img src="../assets/images/icon_pal.png" alt="User Profile">
                    <?php echo $_SESSION['username'] ?? '$user'; ?></p>
            </a>
        </div>
        </nav>
    </header>
    <!-- Contact Us Section -->
    <main class="contact-container">
        <h2>Need Assistance?</h2>
        <p>Our support is always there for you. Reach out with your questions and we'll respond.</p>
        
        <div class="contact-box">
            <h3>Contact Us</h3>
            <form>
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="you@email.com" required>
                
                <label for="message">Question</label>
                <textarea id="message" placeholder="Enter question or feedback" required></textarea>
                
                <button type="submit" class="submit-btn">Submit</button>
            </form>
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
