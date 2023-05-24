<?php
// Assuming session_start() is called before this code

include('./../../db/database.php');

$id_ut = $_SESSION["user_id"];
$name_ut = $_SESSION["user_first"];

$score = "<span id=scoreboard></span>";


echo "<h1>O seu score é: $score</h1>";

if(isset($_POST["hidden-score"])) {


    $query = "SELECT * FROM games WHERE id_gm_ut = '$id_ut'";
    $result2 = $conn->query($query);



        while ($row = $result2->fetch_assoc()) {

            $score = intval($score);
            echo $score;

            $valor = $row['gm_score'];

            echo "id: " . $row["gm_score"];

            if($score > $valor){

                $sql = "UPDATE games SET gm_score = '$score' WHERE id_gm_ut = '$id_ut'";
                $result = $conn->query($sql);
            
                echo "ccccccc";
            }

        }
}

?>
