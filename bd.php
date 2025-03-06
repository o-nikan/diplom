<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$bdname = 'Digital_entertainment_center';

$conn = new mysqli($host, $user, $pass, $bdname);

if($conn->connect_error) {
    die("Ошибка:" . $conn->connect_error);
}