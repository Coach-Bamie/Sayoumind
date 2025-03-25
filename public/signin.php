<?php
// Include the database connection
include '../config/mindpal.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to get user info
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->execute([$username]);
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful, start session
            $_SESSION['username'] = $user['name'];
            echo "Login successful! Welcome " . $_SESSION['username'];
        } else {
            echo "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - Login</title>
    <style>
        /* Login Page */
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
        .login-container {
            width: 40%;
            margin: 50px auto;
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .login-container p {
            font-size: 14px;
            color: gray;
        }

        .input-group {
            margin: 15px 0;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .button {
            width: 100%;
            padding: 12px;
            background: #635BFF;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-container a {
            color: #635BFF;
            text-decoration: none;
            font-weight: bold;
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
                <li><a href="../public/index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <!-- Login Form -->
    <main class="login-container">
        <h2>Login</h2>
        <p>Enter your username and password to log in to your account</p>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="👤 Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="🔒 Password" required>
            </div>
            <button class="button" type="submit">🔓 Log In</button>
        </form>
        <p><a href="Change-pass.html">Forgot your password?</a></p>
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
