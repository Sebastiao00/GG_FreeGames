<?php
// Database connection
include('../db/database.php');

$sql = "SELECT ut_id, , ut_email, ut_first, ut_last, ut_pass, ut_admin FROM utilizadores ORDER BY ut_id ASC";
$result = $connection->query($sql);

if (isset($_POST['bt_rigister'])) {

    $rg_name = $_POST['rg_name'];
    $rg_last = $_POST['rg_last'];
    $rg_email = $_POST['rg_email'];
    $rg_pass1 = $_POST['rg_pass1'];

    // check if email already exist
    $email_check_query = mysqli_query($connection, "SELECT * FROM utilizadores WHERE ut_email = '{$rg_email}' ");
    $rowCount = mysqli_num_rows($email_check_query);


    // perform validation
    if (!preg_match("/^[a-zA-Z ]*$/", $rg_name)) {
        $f_NameErr = '<div class="alert alert-danger">
                           Només es permeten lletres i espais en blanc.
                        </div>';
    }

     if (!preg_match("/^[a-zA-Z ]*$/", $rg_last)) {
        $l_NameErr = '<div class="alert alert-danger">
                           Només es permeten lletres i espais en blanc.
                        </div>';
    }
    if (!filter_var($rg_email, FILTER_VALIDATE_EMAIL)) {
        $_emailErr = '<div class="alert alert-danger">
                            El format de correu electrònic no és vàlid.
                        </div>';
    }
    if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $rg_pass1)) {
        $_passwordErr = '<div class="alert alert-danger">
                           La contrasenya ha de tenir entre 6 i 20 xarcters de llarg, conté almenys un chacter especial, minúscula, majúscules i un dígit.
                        </div>';
    }

    // Password hash
    $password_hash = password_hash($rg_pass1, PASSWORD_BCRYPT);

    // Store the data in db, if all the preg_match condition met
    if (empty($f_NameErr) && empty($l_NameErr) && empty($_emailErr) && empty($_passwordErr)) {

        $sql2 = "INSERT INTO utilizadores (ut_email, ut_first,  ut_last, ut_pass, ut_admin)
                VALUES ('$rg_email', '$rg_name','$password_hash', '$rg_last', '0')";

        $result2 = mysqli_query($connection, $sql2);

        if ($result2) {
            $success_insert = "<div class='alert alert-success'>
            Insertado con éxito! Haga clic en el botón 'Verificar cambios' para ver los cambios realizados en la tabla.
            </div>";
            //header("Location: adm-users.php");
        } else {
            echo "Erro: " . $sql2 . "<br>";
        }
    }

    
    
}
?>
            