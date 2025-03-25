<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - About Us</title>
    <style>
        /* About Us Page */

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

            .about-text .one {
            display: grid;
            margin: 50px 0px;
            grid-template-columns: 1fr;
            border-radius: 20px;
            }
                .one .text p {
                display: block;
            }

            .about-text .text {
                display: block;
            }
        }

            .show-menu {
                display: flex;
            }

.about-container {
    width: 80%;
    margin: auto;
    text-align: center;
}

.about-container h2 {
    font-size: 28px;
    margin: 30px 0;
}

.about-text {
    width: 100%;
    background-color: whitesmoke;
}

.about-text .one {
    display: grid;
    margin: 50px 10px;
    grid-template-columns: 1fr 1fr;
    border-radius: 20px;
}

.about-text .one .img {
    border-radius: 50px;
    cursor: pointer;
}

.about-text .one p {
    font-size: 20px;
    font-style: italic;
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

.team-member img {
    width: 100%;
    border-radius: 10px;
}

/* Footer */
footer {
    background: black;
    color: white;
    padding: 20px;
    text-align: center;
}

.footer-content {
    margin-bottom: 10px;
}

.footer-content input {
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: none;
}

.footer-content button {
    border-radius: 10px;
    height: 35px;
    cursor: pointer;
}

.footer-content button:hover {
    background-color: black;
    color: white;
    border: 1px solid red;
}

.footer-links a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
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
        <p>At MindPal, we strive to push the boundaries of cognitive enhancement through innovative technology and personalized solutions.</p>
            <div class="about-text">
                <div class="one">
                    <div class="text">
                        <h3>Innovation</h3>
                    <p>
                        Our pioneering research integrates advanced AI algorithms with neuroscience, creating tools that enhance well-being and productivity.
                    </p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/iInnovation.jpeg" alt="">
                    </div>
                </div>

                <div class="one">
                     <div class="img">
                        <img src="./assets/images/Customer-Centric.jpeg" alt="">
                    </div>
                    <div class="text">
                        <h3>Customer-Centric</h3>
                <p>We are committed to empowering our clients by providing tailored solutions that foster growth and innovation.</p>
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
                    <div class="img">
                        <img src="./assets/images/Integrity.jpeg" alt="">
                    </div>
                    <div class="text">
                       <h3>Integrity</h3>
                <p>MindPal's built on values of transparency and honesty, ensuring our clients receive clear insights and ethical solutions.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Team Section -->
        <h2>Meet the Team</h2>
        <div class="team-container">
            <div class="team-member">
                <img src="./assets/images/Iliyasu.png" alt="Team Member 1">
                <p><strong>Iliyasu Abdurrazaq Iliyasu</strong><br>Project Manager <br />/Front-End-Dev </p>
            </div>
            <div class="team-member">
                <img src="./assets/images/yamor.png" alt="Team Member 2">
                <p><strong>Jamilu Yusuf Musa (Yamo JR)</strong><br>Back End Dev</p>
            </div>
            <div class="team-member">
                <img src="./assets/images/khadijah.png" alt="Team Member 3">
                <p><strong>Khadija Ibrahim</strong><br>UI Designer</p>
            </div>
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
            <h3>MindPal</h3>
            <p>Subscribe to our newsletter</p>
            <input type="email" placeholder="📩 Input your email">
            <button>Subscribe</button>
        </div>
        <div class="footer-links">
            <a href="#">About Us</a>
            <a href="./public/contact.php">Contact Us</a>
            <a href="./public/faqs.php">FAQs</a>
        </div>
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
