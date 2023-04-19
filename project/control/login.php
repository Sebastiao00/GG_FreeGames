<?php

// Inclui o arquivo que contém a conexão com o banco de dados
include("../db/database.php");

// Insert
global $success_insert, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
global $result, $sql;


// Rigister System
// Verifica se o formulário foi submetido
if (isset($_POST['bt_rigister'])) {

    // Coleta as informações do formulário
    $admin_nr = 0;
    $f_Name = $_POST["rg_name"];
    $l_Name = $_POST["rg_last"];
    $email = filter_var($_POST["rg_email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["rg_pass1"];

    // perform validation
    if (!preg_match("/^[a-zA-Z ]*$/", $f_Name)) {
        $f_NameErr = '<div class="alert alert-danger">
                           Només es permeten lletres i espais en blanc.
                        </div>';
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $l_Name)) {
        $l_NameErr = '<div class="alert alert-danger">
                           Només es permeten lletres i espais en blanc.
                        </div>';
    }

    // Verifica se o endereço de email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Endereço de email inválido.";
        exit;
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
    if (empty($f_NameErr) && empty($l_NameErr) && empty($_emailErr) && empty($_mobileErr) && empty($_passwordErr)) {

        $sql = "INSERT INTO utilizadores ( ut_email, ut_first, ut_last, ut_pass, ut_admin)
                          VALUES ('$email', '$f_Name', '$l_Name', '$password_hash', '0')";
        $result = $conn->query($sql);

        
        if ($result) {
            $success_insert = "<div class='alert alert-success'>
            Insertado con éxito! Haga clic en el botón 'Verificar cambios' para ver los cambios realizados en la tabla.
            </div>";
            header("Location: index.php");
        } else {
            echo "Erro: " . $sql . "<br>";
        }
    }
}

?>
