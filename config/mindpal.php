<?php
$host = ""; 
$dbname = ""; 
$username = "";
$password = "";  
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Error". $conn->connect_error);
    }
?>
