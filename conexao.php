<?php
$servername = "localhost:3306";
$username = "admin";
$password = "guaxi";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
