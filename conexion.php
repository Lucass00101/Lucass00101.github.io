<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "if0_37111718_curso_phpmysql";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
