<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lavadero_web_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
