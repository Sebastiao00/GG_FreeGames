<?php 
//DataBase
include "db/database.php"; 
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
  <?php
        include('../control/login.php');
    ?>
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
    <button type="submit" id="bt_login">Log In</button>
    <button onclick="location.href='./pages/register.php'; return false;">Register</button>
  </form>
<?php
  //  <script src="control/login.js"></script>
    ?>
</body>
</html>
