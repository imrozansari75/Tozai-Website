<?php
// Database credentials
$host = "localhost";  // Database host (usually 'localhost')
$db_name = "tozai";  // Replace with your actual database name
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password

// Create a connection
$connect = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


