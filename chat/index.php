<?php
session_start();
include '../config/mindpal.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save the current URL 
    header("Location: ../public/signin.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get user id from session (ensure it's set on login)
$username = $_SESSION['username']; // Fetch the username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal</title>
    <style>
        /* Base Styles */
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        }* {
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
        /* Chat Container */
        .chat-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: white;
            max-width: 800px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: black;
        }

        .messages {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            max-height: 400px;
        }

        .message {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 15px;
        }

        .message.sent {
            align-items: flex-end;
        }

        .message.received {
            align-items: flex-start;
        }

        .message .message-content {
            padding: 10px;
            border-radius: 5px;
            max-width: 60%;
            word-wrap: break-word;
        }

        .message .message-content.sent {
            background: #7177ea; /* Sent messages are green */
            color: white;
        }

        .message .message-content.received {
            background: #87ceeb; /* Received messages are blue */
        }

        .message .username {
            font-weight: bold;
            color: #333;
        }

        .message .logo-letter {
            display: inline-block;
            background-color: #7177ea;
            color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            font-size: 16px;
        }

        .reply-indicator {
            font-size: 12px;
            color: gray;
            margin-bottom: 5px;
        }

        /* Input Area */
        .input-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            position: relative;
        }

        .input-container textarea {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
            font-size: 14px;
            color: #333;
        }

        .input-container button {
            padding: 10px;
            background: #7177ea;
            width: fit-content;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Send Icon */
        .send-icon {
            font-size: 20px;
        }

        /* Reply Preview */
        #reply-preview {
            display: none;
            margin-bottom: 10px;
            padding: 10px;
            background: #f1f1f1;
            border-radius: 5px;
            font-size: 14px;
            position: absolute;
            bottom: 60px;
        }

        #cancel-reply {
            font-size: 12px;
            background: none;
            border: none;
            color: #007BFF;
            cursor: pointer;
        }

        #cancel-reply:hover {
            text-decoration: underline;
        }

        /* Mobile Styles */
        @media  (max-width: 768px) {
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

            .chat-container {
                padding: 15px;
            }

            .input-container {
                flex-direction: column;
            }

            .input-container textarea {
                width: 100%;
                margin-bottom: 10px;
            }

            .input-container button {
                width: 100%;
            }

            /* Adjusting button and text area on mobile */
            .input-container button {
                padding: 12px 0;
            }

            .send-icon {
                font-size: 22px;
            }
            .d-flex{
                display: flex !important;
                justify-content: space-between;
                gap: 3cm;
                padding: 0;
            }
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
        <nav class="nav">
            <ul>
                <li>
                    <a href="../dashboard/dashboard.php">dashboard</a>
                </li>
                <li><a href="../about.php">About Us</a></li
                <li><a href="../public/Contact.php>Contact Us</a></li>
                <li><a href="../public/faqs.php">FAQs</a></li>
            </ul>
        </div>
        </nav>
    </header>

    <div class="chat-container">
        <h2>Chat with Others</h2>
        <div id="reply-preview">
            <strong>Replying to:</strong>
            <div id="reply-preview-text"></div>
            <button type="button" id="cancel-reply">Cancel</button>
        </div>
        <div id="messages" class="messages"></div>

        <form id="message-form" class="input-container">
            <textarea name="message" rows="3" placeholder="Type your message..." required></textarea>
            <button type="submit"><i class="send-icon">Send</i></button> <!-- Paper airplane icon -->
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let replyingToMessageId = null;

            // Toggle Theme
            $('#theme-toggle').on('click', function() {
                $('body').toggleClass('dark-theme');
                const theme = $('body').hasClass('dark-theme') ? 'Dark' : 'Light';
                $('#theme-toggle').text(`Switch to ${theme} Mode`);
            });

            // Toggle Navigation Menu for Mobile
            $('#nav-toggle').on('click', function() {
                $('.nav-links').toggleClass('active');
            });

            // Fetch messages every 3 seconds using AJAX
            function fetchMessages() {
                $.ajax({
                    url: 'fetch_messages.php', // Request the fetch messages file
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#messages').empty(); // Clear existing messages
                        response.forEach(function(message) {
                            const messageClass = (message.sender_id == <?php echo $user_id; ?>) ? 'sent' : 'received';
                            const replyIndicator = message.replied_message ? `<div class="reply-indicator">Replying to: ${message.replied_message}</div>` : '';
                            const userLogo = (message.name && message.name.length > 0) ? message.name.substring(0, 2).toUpperCase() : 'XX'; // Default to 'XX' if name is null or empty

                            
                            $('#messages').append(`
                                <div class="message ${messageClass}" data-message-id="${message.id}">
                                    <div class="username">
                                        <span class="logo-letter">${userLogo}</span> ${message.name}
                                    </div>
                                    ${replyIndicator}
                                    <div class="message-content ${messageClass}">${message.message}</div>
                                    <button class="reply-btn" data-message-id="${message.id}">Reply</button>
                                </div>
                            `);
                        });
                    }
                });
            }

            // Handle reply button clicks
            $('#messages').on('click', '.reply-btn', function() {
                const messageId = $(this).data('message-id');
                const messageText = $(this).closest('.message').find('.message-content').text();
                replyingToMessageId = messageId;
                $('#reply-preview').show();
                $('#reply-preview-text').text(messageText);
            });

            // Cancel reply
            $('#cancel-reply').on('click', function() {
                replyingToMessageId = null;
                $('#reply-preview').hide();
            });

            // Handle message form submission
            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                const message = $('textarea[name="message"]').val();

                $.ajax({
                    url: 'send_message.php', // Send message request
                    method: 'POST',
                    data: {
                        message: message,
                        reply_to: replyingToMessageId
                    },
                    success: function() {
                        fetchMessages();
                        $('textarea[name="message"]').val('');
                        $('#reply-preview').hide();
                        replyingToMessageId = null;
                    }
                });
            });

            // Initial message fetch
            fetchMessages();
        });
    </script>

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

        // $(document).ready(function() {
        //     let replyingToMessageId = null;

        //     // Toggle Theme
        //     $('#theme-toggle').on('click', function() {
        //         $('body').toggleClass('dark-theme');
        //         const theme = $('body').hasClass('dark-theme') ? 'Dark' : 'Light';
        //         $('#theme-toggle').text(`Switch to ${theme} Mode`);
        //     });

        //     // Toggle Navigation Menu for Mobile
        //     $('#nav-toggle').on('click', function() {
        //         $('.nav-links').toggleClass('active');
        //     });

        //     // Fetch messages every 3 seconds using AJAX
        //     function fetchMessages() {
        //         $.ajax({
        //             url: 'fetch_messages.php', // Request the fetch messages file
        //             method: 'GET',
        //             dataType: 'json',
        //             success: function(response) {
        //                 $('#messages').empty(); // Clear existing messages
        //                 response.forEach(function(message) {
        //                     const messageClass = (message.sender_id == <?php //echo $user_id; ?>) ? 'sent' : 'received';
        //                     const replyIndicator = message.replied_message ? `<div class="reply-indicator">Replying to: ${message.replied_message}</div>` : '';
        //                     const userLogo = (message.name && message.name.length > 0) ? message.name.substring(0, 2).toUpperCase() : 'XX'; // Default to 'XX' if name is null or empty

                            
        //                     $('#messages').append(`
        //                         <div class="message ${messageClass}" data-message-id="${message.id}">
        //                             <div class="username">
        //                                 <span class="logo-letter">${userLogo}</span> ${message.name}
        //                             </div>
        //                             ${replyIndicator}
        //                             <div class="message-content ${messageClass}">${message.message}</div>
        //                             <button class="reply-btn" data-message-id="${message.id}">Reply</button>
        //                         </div>
        //                     `);
        //                 });
        //             }
        //         });
        //     }

        //     // Handle reply button clicks
        //     $('#messages').on('click', '.reply-btn', function() {
        //         const messageId = $(this).data('message-id');
        //         const messageText = $(this).closest('.message').find('.message-content').text();
        //         replyingToMessageId = messageId;
        //         $('#reply-preview').show();
        //         $('#reply-preview-text').text(messageText);
        //     });

        //     // Cancel reply
        //     $('#cancel-reply').on('click', function() {
        //         replyingToMessageId = null;
        //         $('#reply-preview').hide();
        //     });

        //     // Handle message form submission
        //     $('#message-form').on('submit', function(e) {
        //         e.preventDefault();
        //         const message = $('textarea[name="message"]').val();

        //         $.ajax({
        //             url: 'send_message.php', // Send message request
        //             method: 'POST',
        //             data: {
        //                 message: message,
        //                 reply_to: replyingToMessageId
        //             },
        //             success: function() {
        //                 fetchMessages();
        //                 $('textarea[name="message"]').val('');
        //                 $('#reply-preview').hide();
        //                 replyingToMessageId = null;
        //             }
        //         });
        //     });

        //     // Initial message fetch
        //     fetchMessages();
        // });
    </script>
</body>
</html>
