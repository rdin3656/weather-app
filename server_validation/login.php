<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch user data based on the provided username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            // Fetch the user's data from the query result
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($password, $user['passwords'])) {
                // Password is correct, log in the user
                echo "Login successful!";
                // Redirect to the user's dashboard or homepage
                header("Location:../dashboard.php");
                exit();
            } else {
                // Password is incorrect
                echo "Invalid password.";
            }
        } else {
            // User with the provided username does not exist
            echo "User not found.";
        }
    } else {
        // Error executing the SQL query
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>