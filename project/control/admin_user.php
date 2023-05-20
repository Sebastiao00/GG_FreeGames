<?php
// Include the database connection file
include("../../db/database.php");
 
// Retrieve form data
if(isset($_POST["editar"])){


    $user_id = $_SESSION['user_id'];
    echo $user_id;



}
?>