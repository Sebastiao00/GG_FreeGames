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


// Login System
// Verifica se o formulário foi submetido
if (isset($_POST['bt_login'])) {

    $email_signin = $_POST['email'];
    $password_signin = $_POST['password'];

    // clean data 
    $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
    $pswd = mysqli_real_escape_string($conn, $password_signin);

    // Query if email exists in db
    $sql = "SELECT * From utilizadores WHERE ut_email = '{$email_signin}' ";
    $query = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($query);

    // If query fails, show the reason 
    if (!$query) {
        die("SQL query failed: " . mysqli_error($conn));
    }

    if (!empty($email_signin) && !empty($password_signin)) {
        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pswd)) {
            $wrongPwdErr = '<div class="alert alert-danger">
                       La contrasenya ha de tenir entre 6 i 20 xarcters de llarg, conté almenys un chacter especial, minúscula, majúscules i un dígit.
                    </div>';
        }
        // Check if email exist
        if ($rowCount <= 0) {
            $accountNotExistErr = '<div class="alert alert-danger">
                        El compte d usuari no existeix.
                    </div>';
        } else {
            // Fetch user data and store in php session
            while ($row = mysqli_fetch_array($query)) {
                $id = $row['ut_id'];
                $email = $row['ut_email'];
                $firstname = $row['ut_first'];
                $lastname = $row['ut_last'];
                $pass_word = $row['ut_pass'];
                $number = $row['ut_admin'];
            }

            // Verify password
            $password = password_verify($password_signin, $pass_word);
        }
       if($email_signin == $email && $password_signin == $password ) {

            $_SESSION['ut_id'] = $id;
            $_SESSION['ut_email'] = $email;
            $_SESSION['ut_first'] = $firstname;
            $_SESSION['email'] = $email;
            $_SESSION['ut_pass'] = $pass_word;
            $_SESSION['ut_admin'] = $number;
            
        header("Location:./index.php");
                          
        }
    } else {
        if (empty($email_signin)) {
            $email_empty_err = "<div class='alert alert-danger email_alert'>
                      No s'ha proporcionat el correu electrònic.
                    </div>";
        }

        if (empty($password_signin)) {
            $pass_empty_err = "<div class='alert alert-danger email_alert'>
                          No s'ha proporcionat la contrasenya.
                        </div>";
        }
    }
}
?>
