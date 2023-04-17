<?php

// Inclui o arquivo que contém a conexão com o banco de dados
include("../db/database.php");

// Rigister System
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Coleta as informações do formulário
    $f_Name = trim($_POST["f_Name"]);
    $l_Name = trim($_POST["l_Name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);

    // Verifica se todos os campos foram preenchidos
    if (empty($f_Name) || empty($l_Name) || empty($email) || empty($password)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Verifica se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Endereço de email inválido.";
        exit;
    }

    // Verifica se a senha tem pelo menos 8 caracteres
    if (strlen($password) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres.";
        exit;
    }

    // Verifica se o email já está em uso
    $sql = "SELECT * FROM utilizadores WHERE ut_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Este email já está em uso.";
        exit;
    }

    // Hash a senha antes de inseri-la no banco de dados
    $passhash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare a query SQL usando prepared statements
    $sql = "INSERT INTO utilizadores (ut_first, ut_last, ut_email, ut_pass) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $f_Name, $l_Name, $email, $passhash);

    // Execute a consulta preparada
    if ($stmt->execute()) {
        // Inicie a sessão do usuário
        session_start();

        // Defina as variáveis de sessão
        $_SESSION["ut_id"] = $stmt->insert_id;
        $_SESSION["ut_email"] = $email;
        $_SESSION["ut_first"] = $f_Name;
        $_SESSION["ut_last"] = $l_Name;

        // Redirecione o usuário para a página de destino
        header("Location: index.php");
        exit;
    } else {
        // Exiba uma mensagem de erro
        echo "Erro ao registrar usuário: " . $stmt->error;
        exit;
    }

    // Feche a consulta preparada e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}

// Login System
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Coleta as informações do formulário
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);

    // Validação de formulário
    if (empty($email) || empty($password)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }
}
?>
