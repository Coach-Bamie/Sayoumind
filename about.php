<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayoumind - About Us</title>
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
      /* About Us Page */
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
        @media (max-width: 768px) {
            header nav {
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

            .show-menu {
                display: flex;
            }

.about-container {
    width: 100%;
    margin: auto;
    text-align: center;
}

.about-container h2 {
    font-size: 28px;
    text-align: center;
}

.about-container p {
    font-size: 25px;
    font-style: italic;
    text-align: center;
}

.about-text {
    border-radius: 10px;
    width: 100%;
    background-color: inherit;
}

.about-text .one {
    background-color: lightcyan;
    display: grid;
    margin: 100px 10px;
    grid-template-columns: 1fr;
    border-radius: 20px;
}

.about-text .one .img img {
    background: inherit;
    height: 150px;
    margin-bottom: 20px;
    border-radius: 10px;
    border: 1px solid lightpink;
    cursor: pointer;
}

.about-text .one p {
    font-size: 25px;
    font-style: italic;
    margin: 50px 50px;
}

/* Team Section */
.team-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.team-member {
    text-align: center;
    width: 180px;
}

.team-container .team-member p {
    font-size: 15px;
    font-style: italic;
    width: 100%;
}

.team-member img {
    width: 100%;
    border-radius: 10px;
}

/* Footer */
footer {
    display: grid;
    grid-template-columns: 1fr;
    background: #080808;
    padding: 20px;
    margin-top: 20px;
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
            <span>Sayoumind</span>
            <button class="menu-toggle">☰</button>
        <button class="close-menu">✖</button>
        </div>
        <nav>
            <ul>
                <li><a href="./dashboard/dashboard.php">Dashboard</a></li>
                <li><a href="./community.php">Community</a></li>
                <li><a href="./public/contact.php">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <!-- About Us Section -->
    <main class="about-container">
        <h2>About us</h2>
        <p style="font-size: 20px">At Sayoumind, we strive to push the boundaries of cognitive enhancement through innovative technology and personalized solutions.</p>
            <div class="about-text">
                <div class="one">
                    <div class="text">
                        <h2>Innovation</h2>
                    <p>
                        Our pioneering research integrates advanced AI algorithms with neuroscience, creating tools that enhance well-being and productivity.
                    </p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/iInnovation.jpeg" alt="">
                    </div>
                </div><hr>

                <div class="one">
                    <div class="text">
                        <h2>Customer-Centric</h2>
                <p>We are committed to empowering our clients by providing tailored solutions that foster growth and innovation.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/Customer-Centric.jpeg" alt="">
                    </div>
                </div>

                <div class="one">
                    <div class="text">
                    <h3>Expertise</h3>
                <p>Our team comprises seasoned experts in AI and neuroscience, dedicated to leveraging their extensive knowledge for breakthroughs.</p>

                    </div>
                    <div class="img">
                        <img src="./assets/images/Expertise.jpeg" alt="">
                    </div>
                </div>
                        
                <div class="one">
                    <div class="text">
                       <h3>Integrity</h3>
                <p>Sayoumind's built on values of transparency and honesty, ensuring our clients receive clear insights and ethical solutions.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/Integrity.jpeg" alt="">
                    </div>
                </div>

            </div>
        </div>

        <!-- Team Section -->
        <h2>Meet the Team</h2>
        <div class="team-container">
            <div class="team-member">
                <img src="./assets/images/master_craft.png" alt="Team Member 4">
                <p><strong>Moses Pius</strong><br>Back End Dev</p>
            </div>
            <div class="team-member">
                <img src="./assets/images/bamie.png" alt="Team Member 5">
                <p><strong>Ibrahim Bamidele</strong><br>Front End Dev</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="./assets/images/mindpal_logo.png" alt="MindPal Logo">
                <span>Sayoumind</span>
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
