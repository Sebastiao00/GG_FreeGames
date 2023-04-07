<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title> Rigister </title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login/login.css">
    <?php
      include('./db/database.php');
      include('./control/login.php');
    ?>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="rg_form" method="post">
        <h3>Rigister </h3>

        <label for="username">Name</label>
        <input type="text" placeholder="Username" id="rg_name" resquest>

        <label for="username">Last Name</label>
        <input type="text" placeholder="Username" id="rg_last" resquest>

        <label for="password">Email</label>
        <input type="text" placeholder="Email" id="rg_email" resquest>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="rg_pass1">

        <label for="password">Confirm Password </label>
        <input type="password" placeholder="Password" id="rg_pass2">

        <button id="bt_rigister">Rigister</button>
    </form>
</body>
</html>

