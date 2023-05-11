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
        include('../control/register.php');
    ?>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="rg_form" method="post" >
        
        <h3>Register</h3>

        <label for="username">Name</label>
        <input type="text" placeholder="First Name" id="rg_name" name="rg_name" required>
        <?php echo $f_NameErr; //first name error message ?>

        <label for="username">Last Name</label>
        <input type="text" placeholder="Last Name" id="rg_last" name="rg_last" required>
        <?php echo $l_NameErr; //last name error message ?>

        <label for="password">Email</label>
        <input type="text" placeholder="Email" id="rg_email" name="rg_email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="rg_pass1" name="rg_pass1" required>
        <?php echo $_passwordErr; // Password error message ?>

        <button type="submit" id="bt_register" name="bt_register">Register</button>
        <button type="button" name="bt_register" id="bt_register" onclick="window.location.href='../login.php'">Back</button>

        </form>
    </body>
</html>

