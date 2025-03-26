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
body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #ffffff;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ffffff;
    padding: 15px 10%;
    border-bottom: 1px solid #ddd;
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
button {
    width: 100%;
    background-color: #5a5ae6;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
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
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </nav>
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

            <button type="submit">Confirmed Change</button>
        </form>

        <p class="login-link">I remember my password... <a href="../Mindpal/public/signin.php">Log in</a></p>
    </div>

    

    <script>
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
