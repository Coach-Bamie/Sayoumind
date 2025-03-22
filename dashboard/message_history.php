<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat History</title>
    
  <style>
                * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }

          body {
              font-family: Arial, sans-serif;
              background-color: #f7f7f7;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
          }

          .chat-container {
              width: 100%;
              max-width: 600px;
              background-color: white;
              border-radius: 10px;
              box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
              padding: 20px;
          }

          .chat-box {
              display: flex;
              flex-direction: column;
              gap: 15px;
          }

          .message {
              max-width: 75%;
              padding: 10px 15px;
              border-radius: 10px;
              position: relative;
              font-size: 14px;
              line-height: 1.5;
          }

          .sender {
              align-self: flex-start;
              background-color: #e0f7fa;
              color: #00796b;
          }

          .receiver {
              align-self: flex-end;
              background-color: #ffe0b2;
              color: #ef6c00;
          }

          .time {
              font-size: 12px;
              color: #888;
              position: absolute;
              bottom: -18px;
              right: 10px;
          }

          .message::after {
              content: '';
              position: absolute;
              bottom: 0;
              width: 0;
              height: 0;
          }

          .sender::after {
              left: -10px;
              border-right: 10px solid #e0f7fa;
              border-top: 10px solid transparent;
              border-bottom: 10px solid transparent;
          }

          .receiver::after {
              right: -10px;
              border-left: 10px solid #ffe0b2;
              border-top: 10px solid transparent;
              border-bottom: 10px solid transparent;
          }

  </style>

</head>
<body>
    <div class="chat-container">
        <div class="chat-box">
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "mindpal_db";

            
            $conn = new mysqli($servername, $username, $password, $dbname);

           
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT sender, message, timestamp FROM chat_messages ORDER BY timestamp ASC";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sender = $row['sender'];
                    $message = $row['message'];
                    $time = date('g:i A', strtotime($row['timestamp']));
                    
                    
                    if ($sender === 'sender') {
                        echo "
                        <div class='message sender'>
                            <p>$message</p>
                            <span class='time'>$time</span>
                        </div>";
                    } else {
                        echo "
                        <div class='message receiver'>
                            <p>$message</p>
                            <span class='time'>$time</span>
                        </div>";
                    }
                }
            } else {
                echo "<p>No messages found</p>";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
