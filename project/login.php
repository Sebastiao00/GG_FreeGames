<?php
  include './control/log1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Glassmorphism login Form Tutorial in html css</title>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/login/login.css">
</head>

<body>

  <?php echo $wrongPwdErr; ?>
  <?php echo $accountNotExistErr; ?>
  <?php echo $email_empty_err; ?>
  <?php echo $pass_empty_err; ?>

  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="POST">
    <h3>Login </h3>

    <label for="email">Email</label>
    <input type="text" placeholder="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" placeholder="Password" name="password" required>
    <button id="bt_login" name="bt_login">Log In</button>
    <p></p>
    <button onclick="location.href='./pages/register.php'; return false;">Register</button>
  </form>
</body>
</html>