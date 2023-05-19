<?php
// Include the database connection file
include("../../db/database.php");

global $f_NameErr, $_passwordErr, $l_NameErr;
$f_NameErr = $_passwordErr = $l_NameErr = "";

global $id, $email, $first, $last, $password1, $password2;
$id = $email = $first = $last = $password1 = $password2 = ""; 

// Retrieve form data
if(isset($_POST["editar"])){


    $user_id = $_SESSION['user_id'];
    echo"aasasas";



}
?>