<?php
// Inclui o arquivo que contém a conexão com o banco de dados
include("./db/database.php");

global $wrongPwdErr, $accountNotExistErr, $email_empty_err ,$pass_empty_err;

// Verifica se o formulário foi submetido
if (isset($_POST['bt_login'])) {

    $email_signin = $_POST['email'];
    $password_signin = $_POST['password'];

    // Limpa os dados
    $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
    $pswd = password_hash($password_signin, PASSWORD_DEFAULT);

    // Query se o e-mail existe no banco de dados
    $sql = "SELECT * FROM utilizadores WHERE ut_email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email_signin);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($query);

    // Se a consulta falhar, mostra o erro
    if (!$query) {
        die("SQL query failed: " . mysqli_error($conn));
    }

    if (!empty($email_signin) && !empty($password_signin)) {
        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password_signin)) {
            $wrongPwdErr = '<div class="alert alert-danger">
                       A senha deve ter entre 6 e 20 caracteres de comprimento, contém pelo menos um caractere especial, minúsculo, maiúsculo e um dígito.
                    </div>';
        }
        // Verifica se o email existe
        if ($rowCount <= 0) {
            $accountNotExistErr = '<div class="alert alert-danger">
                        A conta de usuário não existe.
                    </div>';
        } else {
            // Recupera os dados do usuário e armazena na sessão
            $row = mysqli_fetch_assoc($query);
            $id = $row['ut_id'];
            $email = $row['ut_email'];
            $firstname = $row['ut_first'];
            $lastname = $row['ut_last'];
            $pass_word = $row['ut_pass'];
            $number = $row['ut_admin'];

            // Verifica a senha
            $password = password_verify($password_signin, $pass_word);
        }
        if ($email_signin == $email && $password) {

            $_SESSION['ut_id'] = $id;
            $_SESSION['ut_email'] = $email;
            $_SESSION['ut_first'] = $firstname;
            $_SESSION['email'] = $email;
            $_SESSION['ut_pass'] = $pass_word;
            $_SESSION['ut_admin'] = $number;

            header("Location: ../index.php");
            exit();

        }
    } else {
        if (empty($email_signin)) {
            $email_empty_err = "<div class='alert alert-danger email_alert'>
                      O e-mail não foi fornecido.
                    </div>";
        }

        if (empty($password_signin)) {
            $pass_empty_err = "<div class='alert alert-danger email_alert'>
                          A senha não foi fornecida.
                        </div>";
        }
    }
}

?>