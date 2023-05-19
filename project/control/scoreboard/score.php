<?php
// Include the database connection file
include("../../db/database.php");

global $f_NameErr, $_passwordErr, $l_NameErr;
$f_NameErr = $_passwordErr = $l_NameErr = "";

global $id, $email, $first, $last, $password1, $password2;
$id = $email = $first = $last = $password1 = $password2 = ""; 

// Retrieve form data
if(isset($_POST["bt_utilizadores"])){


    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM utilizadores;";
    $result = $conn->query($sql);


    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
        <th>ID</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Adminstração</th>
        </tr>
            <tr class="align-middle">
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_id"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_email"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_first"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_last"] . '</span></td>
                <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_admin"] . '</span></td>
                </td>
            </tr>';
            



    }
}


// Retrieve form data
if(isset($_POST["bt_mario"])){


    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM games order by gm_score asc ;";
    $result = $conn->query($sql);




    while ($row = $result->fetch_assoc()) {

        $id_ut = $row["id_gm_ut"];
        
        
        $sql2 = "SELECT * FROM utilizadores Where ut_id = '$id_ut';";
        $result2 = $conn->query($sql2);
        
        while ($row2 = $result2->fetch_assoc()) {

            echo '
            <tr>
            <th>ID</th>
            <th>Nome do Jogo</th>
            <th>Game Score</th>
            <th>Player</th>
            </tr>
                <tr class="align-middle">
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["id_game"] . '</span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger"> Super Mario SpeedRun</span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["gm_score"] . '</span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row2["ut_first"] .' '. $row2["ut_last"] . '</span></td>
                    </td>';
                

        }
    }
}



// Retrieve form data
if(isset($_POST["bt_memory"])){


    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM games order by gm_score_time desc ;";
    $result = $conn->query($sql);




    while ($row = $result->fetch_assoc()) {

        $id_ut = $row["id_gm_ut"];
        
        
        $sql2 = "SELECT * FROM utilizadores Where ut_id = '$id_ut';";
        $result2 = $conn->query($sql2);
        
        while ($row2 = $result2->fetch_assoc()) {

            echo '
            <tr>
            <th>ID</th>
            <th>Nome do Jogo</th>
            <th>Time</th>
            <th>Player</th>
            </tr>
                <tr class="align-middle">
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["id_game"] . '</span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger"> Memory Game - Rick and Morty  </span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["gm_score_time"] . '</span></td>
                    <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row2["ut_first"] .' '. $row2["ut_last"] . '</span></td>
                    </td>';
                

        }
    }
}


?>