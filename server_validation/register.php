<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../server.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// SQL query to insert user data into the "users" table
$sql = "INSERT INTO users (username, email, passwords) VALUES ('$username', '$email', '$password')";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
    header("Location:../index.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>