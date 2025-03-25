<?php
$host = "localhost"; 
$dbname = "mind"; 
$username = "root";
$password = "";


    
    $conn = new mysqli($host, $username, $password,  $dbname) ;
    if ($conn->connect_error) {
        die("COnnection Error". $conn->connect_error);
    }
?>