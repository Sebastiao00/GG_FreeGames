<?php
// Assuming session_start() is called before this code

include('./../../db/database.php');

if (!isset($_SESSION)) {
    echo "Session not set.";
    exit;
}

// Make sure user_id is set in the session
if (!isset($_SESSION["user_id"])) {
    echo "User ID not set.";
    exit;
}

$id_ut = $_SESSION["user_id"];

$score = "<h1>O seu score é: <span id='scoreboard'></span></h1>";
echo $score;
echo "Score displayed successfully";


$query = "SELECT * FROM games WHERE id_gm_ut = $id_ut";
$result2 = $conn->query($query);

if ($result2) {
    $row = $result2->fetch_assoc();
    if ($row) {
        $gameId = $row['game_id'];
        $gameName = $row['game_name'];
        $gameScore = $row['gm_score'];

        // Assuming you have a new score value stored in $newScore
        $newScore = 100; // Replace with your actual new score value

        if ($newScore > $gameScore) {
            $sql = "UPDATE games SET gm_score = ? WHERE id_game = ?";
            $stmt3 = $conn->prepare($sql);
            $stmt3->bind_param("ii", $newScore, $gameId);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            if ($result3) {
                echo "Score updated successfully";
            } else {
                echo "Score update failed: " . $stmt3->error;
            }
        } else {
            echo "New score is not higher than the existing score";
        }
    } else {
        echo "No game data found.";
    }
} else {
    echo "Query failed: " . $conn->error;
}
?>
