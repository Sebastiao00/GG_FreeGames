<?php
$score = "<h1>O seu score é: <span id='scoreboard'></span></h1>";
if (isset($score)) {
    // Perform any necessary processing or storing of the score value
    echo $score;
    echo "Score processed successfully";
}

include('./../../db/database.php');

if (!isset($_SESSION)) {
    session_start();
    $id_ut = $_SESSION["ut_id"];
}

$ut_query = "SELECT * FROM utilizadores WHERE ut_id = ?";
$stmt = $conn->prepare($ut_query);
$stmt->bind_param("s", $id_ut);
$stmt->execute();
$result = $stmt->get_result();

$query = "SELECT * FROM games WHERE id_gm_ut = ?";
$stmt2 = $conn->prepare($query);
$stmt2->bind_param("s", $id_ut);
$stmt2->execute();
$result2 = $stmt2->get_result();

$row = $result2->fetch_assoc();
if (isset($row)) {
    // Acessar os valores da linha atual
    $gameId = $row['game_id'];
    $gameName = $row['game_name'];
    $gameScore = $row['gm_score'];

    if ($score > $gameScore) {
        $sql = "UPDATE games SET gm_score = ? WHERE id_game = ?";
        $stmt3 = $conn->prepare($sql);
        $stmt3->bind_param("ii", $gameScore, $gameId);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
} else {
    echo "No game data found.";
}
?>
