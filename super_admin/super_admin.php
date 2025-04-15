<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    header("Location: ../public/signin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal Dashboard</title>
    <style>
        /* Base Styles (for Desktop) */
        
        /* Dashboard Styles */
        /* General Styling */
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

/* Dashboard Styles */
.dashboard {
    text-align: center;
    padding: 40px 20px;
}

.dashboard h1 {
    font-size: 28px;
    color: #333;
}

.welcome {
    font-size: 22px;
    font-weight: bold;
}

.subtext {
    font-size: 16px;
    color: gray;
    font-style: italic;
    margin-bottom: 20px;
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-top: 20px;
}

.btn-action {
    display: block;
    width: 300px;
    background: #add8e6;
    color: black;
    padding: 15px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease-in-out;
}

.btn-action:hover {
    background: #87ceeb;
}

/* Profile Icon */
    </style>
</head>
<body>
   <header>
        <div class="logo">
            <img src="../assets/images/mindpal_logo.png" alt="MindPal Logo">
            <span>MindPal</span>
        </div>
    </header>
    <!-- Dashboard Content -->
    <main class="dashboard">
        <h1>Super Admin MindPal Dashboard</h1>
        <p>Monitor, track, add, remove, diactive user and admin</p>
        <p class="welcome">Welcome, <?php echo $_SESSION['username'] ?? 'Guest'; ?></p>
        <div class="quick-actions">
            <a href="./super_admin_users.php" class="btn-action">Users</a>
            <a href="./super_admin_admins.php" class="btn-action">Admins</a>
        </div>
    </main>
</body>

</html>
