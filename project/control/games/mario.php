<?php
// Assuming session_start() is called before this code

include('./../../db/database.php');

$id_ut = $_SESSION["user_id"];

$score = "<h1>O seu score é: <span id=scoreboard></span></h1>";
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
        echo "0 results";
    }


}

?>
