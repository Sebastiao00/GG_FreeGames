<?php
// Include the database connection file
include("db/database.php");

// Start the session
session_start();

// Retrieve form data

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Validate form data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        $error = "Invalid email format";
    }

    // Query the database to check if the user exists
    $query = "SELECT * FROM utilizadores WHERE ut_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // User does not exist in the database
        $error = "User does not exist";
    }

    $user = $result->fetch_assoc();

    // Verify the password
    if (!password_verify($password, $user["ut_pass"])) {
        // Incorrect password
        $error = "Incorrect password";
    }

    if(isset($error)){
        // Show error message and stop processing further
        echo "<script>alert('$error')</script>";
    } else {
        // Start the session and store user data
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_email"] = $user["ut_email"];
        $_SESSION["user_first"] = $user["ut_first"];
        $_SESSION["user_last"] = $user["ut_last"];
        $_SESSION["user_admin"] = $user["ut_admin"];

        // Redirect the user to the homepage or some other page
        header("Location: pages/index.php");
    }

}

?>
