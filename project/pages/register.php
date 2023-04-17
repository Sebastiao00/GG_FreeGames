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
        include('../control/login.php');
    ?>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="rg_form" method="post" >
    <?php
        if (!empty($error)) {
            echo "<div class='error-message'>$error</div>";
        }
    ?>

        <h3>Register</h3>

        <label for="username">Name</label>
        <input type="text" placeholder="First Name" id="rg_name" name="ut_first" required
            value="<?php echo isset($_POST['ut_first']) ? $_POST['ut_first'] : '' ?>">

        <label for="username">Last Name</label>
        <input type="text" placeholder="Last Name" id="rg_last" name="ut_last" required
            value="<?php echo isset($_POST['ut_last']) ? $_POST['ut_last'] : '' ?>">

        <label for="password">Email</label>
        <input type="text" placeholder="Email" id="rg_email" name="ut_email" required
            value="<?php echo isset($_POST['ut_email']) ? $_POST['ut_email'] : '' ?>">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="rg_pass1" name="ut_pass" required>

        <button id="bt_rigister" type="submit" name="bt_rigister">Register</button>
        </form>
    </body>
</html>

