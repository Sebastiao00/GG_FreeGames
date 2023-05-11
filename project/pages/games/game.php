<?php
    include('./../../db/database.php');

    if (!isset($_SESSION)) {
        session_start();
    }
    //Verificacao se algum utilizador esta logado 
    if (!isset($_SESSION["user_admin"])) {
        header("Location: ./../../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/game.css">"
    <script src="./../../javascript/game.js" defer></script>
    <title>Super Mario Jumper </title>
</head>

<body class="boddy">
    <div class="game-board">
        <img src="./../../images/game/nuvens.png" class="clouds">
        <img src="./../../images/game/nuvens.png" class="clouds2">
        <img src="./../../images/game/nuvens.png" class="clouds3">
        <img src="./../../images/game/nuvens.png" class="clouds4">
        <img src="./../../images/game/mario.webp" class="mario">
        <img src="./../../images/game/tubo.png" class="pipe">
        <div class="score">
            <?php
                include('./../../control/games/mario.php');
            ?>
        </div>
    </div>
</body>
</html>