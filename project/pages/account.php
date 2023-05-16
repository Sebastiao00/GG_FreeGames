<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login/account.css">
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
    <script>
    function mudarTema() {
        document.body.classList.toggle("dark");
    }
    </script>
    <?php

                
        // Include the database connection file
        include("../db/database.php");

        if (!isset($_SESSION)) {
        session_start();

        $user_first = $_SESSION['user_first'];
        $user_last = $_SESSION['user_last'];
        $user_email = $_SESSION['user_email'];

        }
        //Verificacao se algum utilizador esta logado 
        if (!isset($_SESSION["user_admin"])) {
        header("Location: ../login.php");
        }
        if($_SESSION["user_admin"] == 0){
        include_once('./navbar.php'); 
        }
        else {
        include_once('./admin_navbar.php'); 
        }

        include('../control/account.php');
    ?>
</head>

<body>
    <div class="container">
        <header class="perfil">
            <img class="perfil-foto" src="../images/pages/account/photo.gif" />
            <div class="titulo">
            <?php echo "<h1>$user_first $user_last</h1>" ?>
                <h3> Estudante de Ciência da Computação </h3>
            </div>
            <div class="tema">
                <button onclick="mudarTema()"> Alterar Tema </button>
            </div>
        </header>
        <main class="projetos">
            <form  method="post" class="form_acc" action="">
                <label for="email">Email</label>
                <input type="text" placeholder="email" id="email" name="email" value="<?php echo "$user_email" ?>" disabled>
                
                <label for="password">First Name</label>
                <input type="text" placeholder="Password" id="first" name="first" value="<?php echo "$user_first" ?>" required>
                <?php echo $f_NameErr; //first name error message ?>
                
                <label for="password">Last Name</label>
                <input type="text" placeholder="Password" id="last" name="last" value="<?php echo "$user_last" ?>" required>
                <?php echo $l_NameErr; //last name error message ?>
                
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="pass1" name="pass1" required>
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="pass2" name="pass2" required>
                <?php echo $_passwordErr; // Password error message ?>
                <?php if(isset($_GET["error"]) && $_GET["error"] == "incorrect_password"): ?>
                <p class="error-message">Incorrect password</p>
                <?php endif; ?>
                <button type="submit" class="button_update" name="bt_update" id="bt_update">Update</button>
                <button type="submit" class="button_update" name="bt_logout" id="bt_logout" formnovalidate>Logout</button>
            </form>
    </div>
</body>

</html>