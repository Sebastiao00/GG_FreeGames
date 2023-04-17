<?php

// Enable us to use Headers
ob_start();

// Set sessions
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "", "project");

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

