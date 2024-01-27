<?php

$configs = include('config.php');

$servername = $configs['servername'];
$username = $configs['username'];
$password = $configs['password'];
$database = $configs['database'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?> 