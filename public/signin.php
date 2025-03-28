<?php
// Include the database connection
include '../config/mindpal.php';
ini_set('session.cookie_lifetime', 86400);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare and execute query to check for the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];  // Store user ID in session
            $_SESSION['username'] = $user['name']; // Store username
            $_SESSION['role'] = $user['role'];     // Store role if needed

            // Check if there's a redirect URL
            if (isset($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']);  // Clear redirect URL from session
                header("Location: $redirect_url"); // Redirect to the stored URL
            } else {
                // Redirect to the default dashboard if no redirect URL is set
                header("Location: /Mindpal/dashboard/dashboard.php");
            }
            exit();
        } else {
            // Invalid credentials
            echo "<script>alert('Invalid username or password!');</script>";
        }
    } else {
        // Username not found
        echo "<script>alert('Invalid username or password!');</script>";
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
                <li><a href="../index.php">Home</a></li>
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
        <p><a href="../change_pass.php">Forgot your password?</a></p>
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
