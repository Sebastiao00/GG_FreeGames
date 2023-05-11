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

    <!--Include Navbar -->
    <?php include('./navbar.php'); ?></head>
<body>
      <?php
/*
      include('../db/database.php');

      if (!isset($_SESSION)) {
        session_start();
      }
      //Verificacao se algum utilizador esta logado 
      if (!isset($_SESSION["id"])) {
        header("Location:../pages/index.php");
      }
      // Verificacao se admin
      if (!isset($_SESSION["number1"]) || $_SESSION["number1"] == 0) {
        header("Location: ../login.php");
      }
      */
      ?>

  <div class="container">
    <header class="perfil">
      <img class="perfil-foto" src="../images/pages/account/photo.gif" />
      <div class="titulo">
        <h1> Camila Vitória Costa </h1>
        <h3> Estudante de Ciência da Computação </h3>
      </div>
      <div class="tema">
        <button onclick="mudarTema()"> Alterar Tema </button>
      </div>
    </header>
    <main class="projetos">
      <ul class="projetos-titulo"> Projetos | Imersão Dev </ul>
      <form class="redes-sociais" action="">
        <button class="redes-sociais" name="bt_logout" id="bt_logout">Logout</button>
      </form>
  </div>
</body>
</html>