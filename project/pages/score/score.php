<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/login/account.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <meta charset="UTF-8">
    <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
    </script>
    <script>
    function mudarTema() {
        document.body.classList.toggle("dark");
    }
    </script>
    <?php

                
        // Include the database connection file
        include("../../db/database.php");

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
        include_once('../navbar.php'); 
        }
        else {
        include_once('../admin_navbar.php'); 
        }

    ?>
</head>

<body>
    <div class="container">
        <main class="admin_projetos">
            <form method="post" class="admin_form" action="">
                <table id="tabeladerespostas" class="table table-striped table-scroll" style="width:100%">
                    <thead>
                        Classificações
                        <tr>
                            <th><button  type="submit" class="button_update" name="bt_mario" id="bt_mario"> Super Mario </button></th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Adminstração</th>
                            <th>Ações</th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Adminstração</th>
                            <th>Ações</th>
                        </tr>
                        <?php
                            include_once("../../control/scoreboard/score.php");
                        ?>
                    </thead>
                </table>
            </form>
    </div>
</body>

</html>