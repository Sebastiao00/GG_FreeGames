<?php
// Assuming session_start() is called before this code

include('./../../db/database.php');

$id_ut = $_SESSION["user_id"];
$name_ut = $_SESSION["user_first"];


$score = "<h1>O seu score é: <span id=scoreboard></span></h1>";
$score2 ="<span id=scoreboard></span>";
echo $score;


echo "Score displayed successfully";


if(isset($_POST)) {

    $query = "SELECT * FROM games WHERE id_gm_ut = '$id_ut'";
    $result2 = $conn->query($query);

    if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {
            $valor = $row["gm_score"];
            echo "id: " . $row["gm_score"];
        }

        if($score >= $valor){

            $sql = "UPDATE games SET gm_score = '$score' WHERE id_gm_ut = '$id_ut'";
            $result = $conn->query($sql);
        
            echo "ccccccc";
        }
        
    } else {
        
        $sql3 = "INSERT INTO games ( gm_name, gm_score, id_gm_ut)
        VALUES ('$name_ut', '1', '$id_ut')";
        $result3 = $conn->query($sql3);
    }
    

}

?>
