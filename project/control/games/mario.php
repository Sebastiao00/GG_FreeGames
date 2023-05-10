<?php
 $score = "<h1>O seu score é: <span id='scoreboard'></span></h1>";
 if (isset($score)) {
     // Perform any necessary processing or storing of the score value
     echo $score;
     echo "Score processed successfully";
 }

 include('../db/database.php');

 if (!isset($_SESSION)) {
   session_start();
 }

 $id = $_SESSION["user_admin"];

 $query = "SELECT * FROM games WHERE id_gm_ut = ?";
 $stmt = $conn->prepare($query);
 $stmt->bind_param("s", $id);
 $stmt->execute();
 $result = $stmt->get_result();

 $sql = "UPDATE INTO utilizadores ( ut_email, ut_first, ut_last, ut_pass, ut_admin)
                          VALUES ('$email', '$f_Name', '$l_Name', '$password_hash', '0')";
        $result = $conn->query($sql);
?>
