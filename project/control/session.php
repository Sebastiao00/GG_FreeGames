<?php

if (!isset($_SESSION)) {

    session_start();
    global $user_first, $user_last, $user_email, $user_id;
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
    $user_first = $_SESSION['user_first'];
    $user_last = $_SESSION['user_last'];

}
//Verificacao se algum utilizador esta logado 
if (!isset($_SESSION["user_admin"])) {
    header("Location: ../login.php");
}
if ($_SESSION["user_admin"] == 0) {
    include_once('./navbar.php');
} else {
    include_once('./admin_navbar.php');
}

?>