<?php 
session_start();
$server = "localhost";
$user = "root";
$password = "";
$database = "cardealer_db";
$link = mysqli_connect($server, $user, $password, $database);

define('CAR_IMG', 'c:/xampp/htdocs/php-carDealer/admin/cars/uploads/');
define('CAR_IMG_WIDTH', 800);
?>