<?php
ini_set('session.cookie_lifetime', 86400);
require '../config/mindpal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    $question = $conn->real_escape_string($_POST['question']);
    $answer = $conn->real_escape_string($_POST['answer']); 
    $role = 'user';

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $hashed_answer = password_hash($answer, PASSWORD_BCRYPT); // Hash answer for security

        $check_query = "SELECT * FROM users WHERE name='$username'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exists!');</script>";
        } else {
            $insert_query = "INSERT INTO users (name, password, role, question, answer) VALUES ('$username', '$hashed_password', '$role', '$question', '$hashed_answer')";

            if ($conn->query($insert_query) === TRUE) {
                echo "<script>alert('Registration successful!'); window.location.href = '../public/signin.php';</script>";
            } else {
                echo "<script>alert('Error: " . addslashes($conn->error) . "');</script>";
            }
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal - Sign Up</title>
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing:border-box;
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

        /* Sign-Up Page */
        .signup-container {
            width: 80%;
            margin: 50px auto;
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .signup-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .signup-container p {
            font-size: 14px;
            color: gray;
        }

        .input-group {
            margin: 15px 10px;
        }

        .input-group input {
            width: 150px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .input-group select {
            height: 40px;
            width: 170px;
            border: 1px solid lightgray;
            margin: 10px 0px;
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

        .button:hover {
            background: #554AE3;
        }

        .signup-container a {
            color: #635BFF;
            text-decoration: none;
            font-weight: bold;
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="../public/contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <!-- Sign-Up Form -->
    <main class="signup-container">
        <h2>SIGN UP</h2>
        <p>Enter your details to create an account</p>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="😎 Username" required>
            </div>
            <div class="input-group">
                <select name="question" required>
                <option value="">Select a security question</option>
                <option value="What is your pet's name?">What is your pet's name?</option>
                <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                <option value="What city were you born in?">What city were you born in?</option>
                </select>
                <input type="text" name="answer" placeholder="Your answer" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="🔒 Password" required>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" placeholder="🔒 Confirm Password" required>
            </div>
            <button type="submit" class="button">Sign up</button>
        </form>
        <p>Already have an account? <a href="../public/signin.php">Log in</a></p>
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
