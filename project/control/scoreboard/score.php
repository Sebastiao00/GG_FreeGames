<?php
// Include the database connection file
include("../../db/database.php");

global $f_NameErr, $_passwordErr, $l_NameErr;
$f_NameErr = $_passwordErr = $l_NameErr = "";

global $id, $email, $first, $last, $password1, $password2;
$id = $email = $first = $last = $password1 = $password2 = ""; 

// Retrieve form data
if(isset($_POST["bt_mario"])){


    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM utilizadores;";
    $result = $conn->query($sql);


    while ($row = $result->fetch_assoc()) {
        echo '
            <tr class="align-middle">
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_id"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_email"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_first"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_last"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_admin"] . '</span></td>
                <td class="d-table-cell"><button class="btn p-0 visualisebtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ficha Técnica"><span class="text-500 fas fa-file-alt">             
                <button class="btn p-0 editbtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="editar"><span class="text-500 fas fa-edit"></span></button>
                <button class="btn p-0 deletebtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Desativar"><span class="text-500 fas fa-user-alt-slash"></span></button>
                </td>';

    }
}

if (isset($_POST["bt_logout"])) {
    // Finally, destroy the session.
    session_destroy();
    header("Location: ./../login.php");
    exit();
}
?>