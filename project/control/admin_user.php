<?php
if (!isset($_SESSION)) {
    session_start();
    $user_id = $_SESSION['user_id'];
}

$sql = "SELECT * FROM utilizadores WHERE id = ?;";
$result = $conn->query($sql);

echo $result;

/*while ($row = mysqli_fetch_array($get_users)) {
    $fotosrc = '../assets/img/fotos_clientes/' . $row["CL_nif"] . '.jpg';
    if (!file_exists($fotosrc)) {
        $fotosrc = 'http://localhost/nos/assets/img/team/avatar.png';
    }

    echo '
        <tr class="align-middle">
            <td class="d-table-cell"><span class="badge rounded-pill badge-soft-danger">' . $row["ut_id"] . '</span></td>
            <td style="display:none;">' . $row["ut_email"] . '</td>
            <td style="display:none;">' . $row["ut_first"] . '</td>
            <td style="display:none;">' . $row["ut_last"] . '</td>
            <td style="display:none;">' . $row["ut_pass"] . '</td>
            <td class="d-table-cell">' . $row["ut_admin"] . '</td>
                <div>
                    <button class="btn p-0 visualisebtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ficha Técnica"><span class="text-500 fas fa-file-alt"></span></button>';
    if (isset($row["CL_datatermino"]))
        echo '<button class="btn p-0 activebtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ativar"><span class="text-500 fas fa-user-check"></span></button>';
    else {
        echo '
            <button class="btn p-0 editbtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="editar"><span class="text-500 fas fa-edit"></span></button>
            <button class="btn p-0 deletebtn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Desativar"><span class="text-500 fas fa-user-alt-slash"></span></button>
        ';
    }
    echo '</div>
            </td>
        </tr>
    ';
}*/
?>