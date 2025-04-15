<?php
include '../config/mindpal.php';

// Fetch users with roles other than 'user' or 'admin'
function getAdminList($conn) {
    $sql = "SELECT name, role, id FROM users WHERE role NOT IN ('user', 'admin')";
    $result = $conn->query($sql);

    $admins = [];
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
    return $admins;
}

$adminList = getAdminList($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindPal Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
            /* General Styles */
    body {
        font-family: Arial, sans-serif;
        width: 100%;
        height: 100vh;
        text-align: center;
        background-color: #ffffff;
    }
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

        .dashboard {
            text-align: center;
            padding: 40px 20px;
        }

        .dashboard h1 {
            font-size: 28px;
            color: #333;
        }

        .adminlist {
            width: 100%;
            height: 500px;
            overflow-y: scroll;
            background-color: #ddd;
            margin-top: 50px;
            border-radius: 50px;
            display: block;
        }

        .adminlist .admins {
            display: grid;
            grid-template-columns: 50px 1fr 1fr 100px;
            width: 100%;
            height: 70px;
            background: #ffffff;
            margin: 40px 10px;
            border-radius: 20px;
        }

        .adminlist .admins .image {
            margin: auto 10px;
        }

        .adminlist .admins .image img {
            height: 50px;
        }

        .adminlist .admins .name {
            margin-left: 10px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            padding: auto;
        }

        .adminlist .admins .remove {
            display: flex;
            align-items: center;
            padding-left: 10px;
        }

        .adminlist .admins .remove button {
            background: #ddd;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            border-radius: 10px;
        }

        .add_admin {
            width: 100%;
            height: 400px;
            background-color: #ddd;
            margin-top: 50px;
            padding-top: 50px;
            border-radius: 50px;
            display: block;
        }

        form {
            display: block;
            margin: 50px 50px;
        }

        form input {
            width: 100%;
            height: 50px;
            display: block;
            margin: 30px auto;
            border-radius: 15px;
            padding-left: 10px;
        }

        select {
            height: 50px;
            width: 100%;
            border-radius: 10px;
        }

        form button {
            width: 100%;
            height: 50px;
            margin: 30px auto;
            border-radius: 15px;
            cursor: pointer;
            font-weight: 800;
            font-size: large;
        }
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
        <p>MindPal Admins List</p>
        <div class="adminlist list">
            <?php
            if (empty($adminList)) {
                echo "<p>No admins found.</p>";
            } else {
                foreach ($adminList as $admin) {
                    echo '
                    <div class="admins" data-id="' . $admin['id'] . '">
                        <div class="image">
                            <img src="../assets/images/icon_pal.png" alt="">
                        </div>
                        <div class="name">
                            <h3>' . htmlspecialchars($admin['name']) . '</h3>
                        </div>
                        <div class="department">
                            <h4>' . htmlspecialchars($admin['role']) . '</h4>
                        </div>
                        <div class="remove">
                            <button class="remove_btn">Remove</button>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
        <hr>
        <h1>Add Admins Here</h1>
        <div class="add_admin">
            <form action="add_admin.php" method="POST">
                <input type="text" name="Uname" id="name" required placeholder="Admin user Name" class="name">
                <input type="password" name="password" id="password" required placeholder="Password">
                <select name="department" id="department" class="department">
                    <option value="Security">Select department</option>
                    <option value="Security">Security</option>
                    <option value="Counsellor">Counsellor</option>
                    <option value="medical">Medical</option>
                </select>
                <button type="submit" class="add_btn">Add</button>
            </form>
        </div>
    </main>

    <script>
        document.querySelectorAll('.remove_btn').forEach((removeButton) => {
            removeButton.addEventListener('click', function() {
                const adminDiv = this.closest('.admins');
                const adminId = adminDiv.getAttribute('data-id');
                // Make an AJAX request to delete the admin
                fetch('delete_admin.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + adminId
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        adminDiv.remove(); // Remove admin from the list
                    } else {
                        alert('Failed to remove admin.');
                    }
                });
            });
        });
    </script>
</body>
</html>
