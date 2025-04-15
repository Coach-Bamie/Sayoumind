<?php
// Include database connection
include '../config/mindpal.php'; // Your database connection file

// Fetch users where role is 'user'
$sql = "SELECT id, name, role FROM users WHERE role = 'user'";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Return the users data as JSON
// echo json_encode($users);

// Close the connection
$conn->close();
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
        /* Base Styles (for Desktop) */
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
        .userlist {
            width: 100%;
            height: 500px;
            overflow-y: scroll;
            background-color: #ddd;
            margin-top: 50px;
            border-radius: 50px;
            display: block;
        }

        .userlist .admins {
            display: grid;
            grid-template-columns: 50px 1fr 100px;
            width: 100%;
            height: 70px;
            background: #ffffff;
            margin: 40px 20px;
            border-radius: 20px;
        }

        .userlist .admins .image {
            margin: auto 10px;
        }

        .userlist .admins .image img {
            height: 50px;
        }

        .userlist .admins .name {
            margin: auto auto;
            display: flex;
            align-items: center;
            padding-left: 20px;
        }

        .userlist .admins .remove {
            display: flex;
            align-items: center;
            padding-left: 10px;
        }

        .userlist .admins .remove button {
            background: #ddd;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            border-radius: 10px;
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
        <p>MindPal Users List</p>
        <div class="userlist">
        <?php
            if (empty($users)) {
                echo "<p>No admins found.</p>";
            } else {
                foreach ($users as $user) {
                    echo '
                    <div class="admins" data-id="' . $user['id'] . '">
                        <div class="image">
                            <img src="../assets/images/icon_pal.png" alt="">
                        </div>
                        <div class="name">
                            <h3>' . htmlspecialchars($user['name']) . '</h3>
                        </div>
                        <div class="remove">
                            <button class="remove_btn">Remove</button>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </main>

    <script>
        // Fetch users from the backend
        fetch('fetch_users.php')
            .then(response => response.json())
            .then(users => {
                let userListHTML = '';
                
                users.forEach((user, index) => {
                    const { id, name, role } = user;
                    const userHTML = `
                        <div class="user" data-id="${id}">
                            <div class="image">
                                <img src="../assets/images/icon_pal.png" alt="">
                            </div>
                            <div class="name">
                                <h3>${name}</h3>
                                <p>Role: ${role}</p>
                            </div>
                            <div class="remove">
                                <button class="remove_btn" data-id="${id}">Remove</button>
                            </div>
                        </div>
                    `;
                    userListHTML += userHTML;
                });

                // Insert the HTML into the page
                document.querySelector('.userlist').innerHTML = userListHTML;

                // Add remove functionality
                document.querySelectorAll('.remove_btn').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const userId = event.target.getAttribute('data-id');
                        removeUser(userId, event.target.closest('.user'));
                    });
                });
            })
            .catch(error => console.error('Error fetching users:', error));

        // Function to remove the user
        function removeUser(userId, userElement) {
            fetch('remove_user.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${userId}`
            })
            .then(response => response.text())
            .then(result => {
                if (result === 'success') {
                    userElement.remove(); // Remove the user from the list in UI
                } else {
                    alert('Error removing user');
                }
            })
            .catch(error => console.error('Error removing user:', error));
        }
    </script>
</body>
</html>
