<?php

// Enable us to use Headers
ob_start();

// Set sessions
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
