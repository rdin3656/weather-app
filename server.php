<?php

// Database credentials
$hostname = 'localhost';
$username = 'root';
$password = ''; // Assuming you have not set a password, leave it empty
$database = 'weather_app_db';

// Create a connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if the connection is successful
if ($mysqli->ping()) {
    echo 'Connected to the database!';
} else {
    echo 'Failed to connect to the database.';
}

// Close the connection


?>