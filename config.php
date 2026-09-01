<?php
//menghubungkan ke database

$host ="localhost";
$user ="root";
$pass = ""; //biasanya standar mysql laragon atau xammp dikosongkan
$db_name = "tja11";//nama database

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("gagal terhubung ke database: " . $conn->connect_error);
}

?>