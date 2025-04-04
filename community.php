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
    <title>MindPal Community</title>
    <link rel="stylesheet" href="styles.css">
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing:border-box;
} 
        /* General Reset */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    text-align: center;
}

/* Navigation */
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
/* Hero Section */
.hero {
    padding: 40px;
    font-size: 24px;
    font-weight: bold;
}

/* Topics Section */
.topics {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    padding: 20px;
    width: 300px;
    margin: auto;
}

.topic-card {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: left;
}

/* Conversation Section */
.conversation {
    background: #f0f0ff;
    padding: 30px;
    margin-top: 20px;
    border-radius: 8px;
}

.conversation h2 {
    color: #5A5AD1;
}

.discussion-btn {
    padding: 12px 20px;
    background: #5A5AD1;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

/* Comment Section */
.comment-box {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background: white;
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.comment-box input {
    width: 80%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.send-btn {
    padding: 10px 15px;
    background: #5A5AD1;
    color: white;
    border: none;
    font-size: 14px;
    cursor: pointer;
    margin-left: 10px;
    border-radius: 5px;
}

/* Comments */
.comment {
    background: white;
    padding: 15px;
    margin: 10px auto;
    width: 300px;
    text-align: left;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
   <header>
        <div class="logo">
            <img src="./assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
            <button class="menu-toggle">☰</button>
            <button class="close-menu">✖</button>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="./dashboard/dashboard.php">Dashboard</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./public/contact.php">Contact Us</a></li>
                <li><a href="./public/faqs.php">Profile</a></li>
            </ul>
           <div class="profile">
            <a href="./dashboard/user_profile.php">
                <img src="./assets/images/icon_pal.png" alt="User Profile">
    <?php echo $_SESSION['username'] ?? '$user'; ?></p>
            </a>
        </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Stronger Together: Building Better Communities Through Networking and Support</h1>
        </section>
        <section class="conversation">
            <h2>Join the Conversation</h2>
            <p>Share your insights and connect with like-minded individuals. Your thoughts matter!</p>
            <button class="discussion-btn">Start a Discussion</button>
        </section>

        <section class="comments">
            <div class="comment-box">
                <input type="text" placeholder="What do you think about this?">
                <button class="send-btn">Send</button>
            </div>
            <div class="comment">
                <strong>Andrew - Oct 10, 2023</strong>
                <p>This is a great way to address the issue. Nevertheless, I think certain aspects could be enhanced to enrich the user experience even more.</p>
            </div>
            <div class="comment">
                <strong>Sarah - Oct 10, 2023</strong>
                <p>I'm curious about the integration of chatbot interactions into the broader customer support system.</p>
            </div>
            <div class="comment">
                <strong>John - Oct 9, 2023</strong>
                <p>Benjamin, I share your concerns about the potential for biased training data shaping the chatbot’s responses. To mitigate this, it's crucial to implement a robust update mechanism that continually curates and expands the chatbot’s knowledge base.</p>
            </div>
        </section>
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
