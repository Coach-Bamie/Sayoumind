<? 
// Reset Password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];

    // Check if the old password matches the current password
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$oldPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the password
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Password changed successfully!');</script>";
        } else {
            echo "<script>alert('Error changing password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect. Please try again.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - MindPal</title>
    <style>
        /* General Styling */
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
            margin-right: 0px;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .close-menu {
            display: none;
            margin-right: 0px;
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

/* Container */
.container {
    display: block;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

p {
    color: gray;
    margin-bottom: 20px;
}

/* Input Fields */
.input-group {
    position: relative;
    margin-bottom: 15px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

/* Button */
.button {
    width: 100%;
    background-color: #5a5ae6;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.button:hover {
    background-color: #4747d1;
}

/* Login Link */
.login-link {
    margin-top: 15px;
}

.login-link a {
    color: blue;
    text-decoration: none;
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
                <li><a href="./public/index.php">Home</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./public/faqs.php">FAQs</a></li>
            </ul>
    </header>
    <div class="container">
        <h1>Change Password</h1>
        <p>Do you forget your password?</p>

        <form id="passwordForm">
            <div class="input-group">
                <input type="password" id="oldPassword" placeholder="Old Password">
                <span class="toggle-password" onclick="togglePassword('oldPassword')">👁️</span>
            </div>

            <div class="input-group">
                <input type="password" id="newPassword" placeholder="New Password">
                <span class="toggle-password" onclick="togglePassword('newPassword')">👁️</span>
            </div>

            <button type="submit" class="button">Confirmed Change</button>
        </form>

        <p class="login-link">I remember my password... <a href="./public/signin.php">Log in</a></p>
    </div>

    

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
        // Function to toggle password visibility
        function togglePassword(id) {
            let input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }

    </script>
</body>
</html>
