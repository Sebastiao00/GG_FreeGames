<?php

/* get the username and password from the request body
$email = $_POST['email'];
$password = $_POST['password'];*/

// connect to the database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

/* prepare a SQL statement to retrieve the user's credentials
$stmt = $conn->prepare("SELECT * FROM utilizadores WHERE ut_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// check if the user exists and their password is correct
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['ut_pass'])) {
    // authentication successful
    $response = array('success' => true);
  } else {
    // incorrect password
    $response = array('success' => false, 'message' => 'Incorrect password');
  }
} else {
  // user not found
  $response = array('success' => false, 'message' => 'User not found');
}

// send the response back to the client
header('Content-Type: application/json');
echo json_encode($response);

// close the database connection
$conn->close(); */

?>