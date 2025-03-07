<?php
$servername = "localhost:3306"; 
$username = "root"; 
$password = "";
$dbname = "m307_lp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
