<?php
$host = "127.0.0.1:3306"; 
$dbname = "u873311945_mind"; 
$username = "u873311945_mind";
$password = "Mind@fud123";  
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Error". $conn->connect_error);
    }
?>