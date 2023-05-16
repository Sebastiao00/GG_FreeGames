<?php 
//DataBase
include "db/database.php";
include('control/login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
  <meta charset="UTF-8">
  <title>SEBASTUMBAS PAP</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/login/login.css">
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  
  <form method="POST" id="loginform" name="loginform">
    <h3>Login </h3>
    
    <label for="email">Email</label>
    <input type="text" placeholder="email" id="email"  name="email" required>
    
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password" required>
    <button type="submit" name="bt_login" id="bt_login">Log In</button>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "invalid_email"): ?>
        <p class="error-message">Invalid email format</p>
    <?php elseif(isset($_GET["error"]) && $_GET["error"] == "user_not_found"): ?>
        <p class="error-message">User does not exist</p>
    <?php elseif(isset($_GET["error"]) && $_GET["error"] == "incorrect_password"): ?>
        <p class="error-message">Incorrect password</p>
    <?php endif; ?>

    <button type="button" name="bt_register" id="bt_register" onclick="window.location.href='./pages/register.php'">Register</button>
  </form>
</body>
</html>
