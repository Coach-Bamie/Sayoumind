<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MindPal</title>
   <style>
/* Header */
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

    /* Admin Login Page */
.admin-login-container {
    width: 40%;
    margin: 80px auto;
    text-align: center;
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.admin-login-container h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.admin-login-container p {
    font-size: 14px;
    color: #666;
}

.admin-login-container form {
    display: flex;
    flex-direction: column;
}

.admin-login-container input,
.admin-login-container select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-btn {
    width: 100%;
    padding: 12px;
    background: #635BFF;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.login-btn:hover {
    background: #554AE3;
}

   </style>
</head>
<body>

    <!-- Admin Login Container -->

    <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal logo">
            <span>MindPal</span>
        </div>
        <nav>
        </nav>
    </header>

    <div class="admin-login-container">
        <h2>Admin Login</h2>
        <p>Enter your credentials to access the admin panel.</p>

        <form action="admin-dashboard.html" method="POST">
            <input type="text" placeholder="Username" required>
            
            <select required>
                <option value="" disabled selected>Choose department</option>
                <option value="admin">Security</option>
                <option value="moderator">Medical</option>
                <option value="superadmin">Counseling</option>
            </select>

            <input type="password" placeholder="Password" required>

            <button type="submit" class="login-btn">🔑 Log In</button>
        </form>
    </div>

</body>
</html>
