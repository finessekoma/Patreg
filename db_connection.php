<?php
$host = "localhost"; // database host
$username = "root"; // database username
$password = ""; // database password
$database = "uniforms"; // database name

// create connection
$conn = mysqli_connect($host, $username, $password, $database);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
