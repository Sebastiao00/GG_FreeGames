<?php

$f_NameErr = null;
$_passwordErr = null;
$l_NameErr = null;



// Retrieve form data
if(isset($_POST["bt_update"])){
    if(isset($_POST["email"]) && isset($_POST["first"]) && isset($_POST["last"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])) {
        
        $id = $_POST["ut_id"];
        $email = $_POST["email"];
        $first = $_POST["first"];
        $last = $_POST["last"];
        $password1 = $_POST["pass1"];
        $password2 = $_POST["pass2"];


        echo  
        $id,
        $email,
        $first,
        $last,
        $passw,
        $password2,
        "aaa";
        exit;

        // Verify the password
        if ($password1 != $password2) {
            // Incorrect password
            $error = "Incorrect password";
        }
        else {
            $password = $password1;
        }

            // perform validation
        if (!preg_match("/^[a-zA-Z ]*$/", $first)) {
            $f_NameErr = '<div class="alert alert-danger">
                            Només es permeten lletres i espais en blanc.
                            </div>';
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $last)) {
            $l_NameErr = '<div class="alert alert-danger">
                            Només es permeten lletres i espais en blanc.
                            </div>';
        }

        //verificação da Senha
        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password)) {
            $_passwordErr = '<div class="alert alert-danger">
                            La contrasenya ha de tenir entre 6 i 20 xarcters de llarg, conté almenys un chacter especial, minúscula, majúscules i un dígit.
                            </div>';
        }

        // Password hash
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Store the data in db, if all the preg_match condition met
    if (empty($f_NameErr) && empty($l_NameErr) && empty($_passwordErr)) {

        $sql = "UPDATE utilizadores SET ut_email = '$email', ut_first = '$first', ut_last = '$last', ut_pass = '$password_hash', ut_admin = '0' WHERE ut_id = $id";
        $result = $conn->query($sql);
        
        if ($result) {
            $success_insert = "<div class='alert alert-success'>
            Update was successful
            </div>";
            header("Location: index.php");
        } else {
            echo "Erro: " . $sql . "<br>";
        }
    }

    }
}
?>