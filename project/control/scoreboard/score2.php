<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<select name="valor" onchange="run()" id="valor">
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

        if($score >= 0 || $score <= 20) {

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
        
        echo '<div id="myPlot" style="width:100%;max-width:700px"></div>';
    }
}


?>
</select>

<script>

function run() {

const valor = [];
valor[0] = document.getElementById("")

}

var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];


var xArray =  ["1 - 20", "21 - 40", "41 - 60", "61 - 80", "81 - 100"];
var yArray = [$scores[1], $scores[2], $scores[3], $scores[4], $scores[5]];

var layout = {title:"World Wide Wine Production"};

var data = [{labels:xArray, values:yArray, type:"pie"}];

Plotly.newPlot("myPlot", data, layout);

</script>
