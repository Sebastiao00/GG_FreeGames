<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php
// Include the database connection file
include("../../db/database.php");

$score1 = 0;
$score2 = 0;
$score3 = 0;
$score4 = 0;
$score5 = 0;

// Retrieve form data
if(isset($_POST["bt_mario"])){
   
    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM games;";
    $result = $conn->query($sql);




    while ($row = $result->fetch_assoc()) {

        $score = $row["gm_score"];

        if($score >= 1 || $score <= 20) {

            $score1++;

        }
        if($score >= 21 || $score <= 40) {

            $score2++;

        }
        if($score >= 41 || $score <= 60) {

            $score3++;

        }
        if($score >= 61 || $score <= 80) {

            $score4++;

        }
        if($score >= 81) {

            $score5++;

        }
        
        echo '<canvas id="myChart" style="width: 100%; max-width: 600px"></canvas>';
    }
}


?>

<script>
var xValues = ["1 - 20", "21 - 40", "41 - 60", "61 - 80", "81 - 100"];
var yValues = [$score1, $score2, $score3, $score4, $score5];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Player Statistics - Super Mario SpeedRun"
    }
  }
});
</script>
