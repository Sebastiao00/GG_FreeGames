<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login/account.css">
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
    <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
    </script>
    <script>
    function mudarTema() {
        document.body.classList.toggle("dark");
    }
    </script>
    <?php

                
        // Include the database connection file
        include("../db/database.php");

        if (!isset($_SESSION)) {
        session_start();

        $user_first = $_SESSION['user_first'];
        $user_last = $_SESSION['user_last'];
        $user_email = $_SESSION['user_email'];

        }
        //Verificacao se algum utilizador esta logado 
        if (!isset($_SESSION["user_admin"])) {
        header("Location: ../login.php");
        }
        if($_SESSION["user_admin"] == 0){
        include_once('./navbar.php'); 
        }
        else {
        include_once('./admin_navbar.php'); 
        }

        include('../control/account.php');
    ?>
</head>

<body>
    <div class="container">
        <main class="admin_projetos">
            <form method="post" class="admin_form" action="">
                <table id="tabeladerespostas" class="table table-striped table-scroll" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Adminstração</th>
                            <th>Ações</th>
                        </tr>
                        <?php
                                        
include("../db/database.php");

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
?>

                    </thead>
                </table>
            </form>
    </div>

    <script>
    $(document).ready(function() {

        // - EDIT BUTTON START - \\
        $('.editbtn').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get()

            $('#GuardarCliente').text("Guardar Alterações");


            let clientname = $('#tableclientname' + data[0]).text();
            $('#nifhidden').val(data[0])
            $('#nomecliente').val(clientname)
            $('#sexo').val(data[2])
            $('#nif').val(data[0])
            $('#ndocartaodecidadao').val(data[3])
            $('#datanascimento').val(data[4])
            $('#nidentificacaodesegurancasocial').val(data[5])
            $('#ndeutente').val(data[6])
            $('#email').val(data[7])
            $('#ndetelemovel').val(data[8])
            $('#morada1').val(data[9])
            $('#codigopostal1').val(data[10])
            $('#morada2').val(data[11])
            $('#codigopostal2').val(data[12])
            $('#situacaodeemprego').val(data[13])
            $('#situacaodesaude').val(data[14])
            $('#situacaohabitacional').val(data[15])
            $('#nomeresponsavel').val(data[16])
            $('#responsavelemail').val(data[17])
            $('#responsavelndetelmovel').val(data[18])

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    })
    </script>
</body>

</html>