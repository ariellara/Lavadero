<?php
$servername = "localhost";
$database = "lavadero_web_db";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
//$cmd = new PDO("mysql:host=$servername;dbname=$database;utf8", $username, $password);


//////////////////////
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}




?>