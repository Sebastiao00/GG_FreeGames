<?php
// Database connection
include('../db/database.php');

// Set sessions
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['bt_rigister'])) {

    $rg_name = $_POST['rg_name'];
    $rg_last = $_POST['rg_last'];
    $rg_email = $_POST['rg_email'];
    $rg_pass1 = $_POST['rg_pass1'];

    // check if email already exist
    $email_check_query = mysqli_query($connection, "SELECT * FROM utilizadores WHERE ut_email = '{$rg_email}' ");
    $rowCount = mysqli_num_rows($email_check_query);

    // perform validation
    $f_NameErr = null;
    $l_NameErr = null;
    $_emailErr = null;
    $_passwordErr = null;

    if (!preg_match("/^[a-zA-Z ]*$/", $rg_name)) {
        $f_NameErr = '<div class="alert alert-danger">
                           Only letters and white space allowed.
                        </div>';
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $rg_last)) {
        $l_NameErr = '<div class="alert alert-danger">
                           Only letters and white space allowed.
                        </div>';
    }

    if (!filter_var($rg_email, FILTER_VALIDATE_EMAIL)) {
        $_emailErr = '<div class="alert alert-danger">
                            Invalid email format.
                        </div>';
    }

    if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $rg_pass1)) {
        $_passwordErr = '<div class="alert alert-danger">
                           Password must be between 6 and 20 characters long, contain at least one special character, lowercase, uppercase and a digit.
                        </div>';
    }

    // Password hash
    $password_hash = password_hash($rg_pass1, PASSWORD_BCRYPT);

    // Store the data in db, if all the preg_match condition met
    if (empty($f_NameErr) && empty($l_NameErr) && empty($_emailErr) && empty($_passwordErr)) {

        $sql2 = "INSERT INTO utilizadores (ut_email, ut_first, ut_last, ut_pass, ut_admin)
                VALUES ('$rg_email', '$rg_name', '$rg_last', '$password_hash', 0)";

        $result2 = mysqli_query($connection, $sql2);

        if ($result2) {
            $success_insert = "<div class='alert alert-success'>
            Successfully inserted! Click on the 'Check changes' button to see the changes made in the table.
            </div>";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($connection);
        }
    } else {
        print("erro");
    }
}

?>