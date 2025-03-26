<?php
$host = "localhost"; 
$dbname = "mind_db"; 
$username = "root";
$password = "";  
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Error". $conn->connect_error);
    }
?>