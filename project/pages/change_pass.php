<!DOCTYPE html>
<html lang="en" >
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>pass</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login/login.css">
</head>
<body>

    <?php

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
    ?>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="ch-form">
        <h3>Change Password </h3>

        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="ch_email" resquest>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="ch_pass1" resquest>

        <label for="password">Password Comfirm</label>
        <input type="password" placeholder="Password" id="ch_pass2" resquest>

        <button>Confirm Change</button>
    </form>
</body>
</html>
