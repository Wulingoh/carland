<?php
// set to NZ time zone
date_default_timezone_set('Pacific/Auckland');
// start session
session_start();

$server = "localhost"; // here the database server is localhost. Variables created for easy changing
$user = "root";
$password = "";
$database = "carland_db";
$link = mysqli_connect($server, $user, $password, $database);

if(!$link) {
    die("Error". mysqli_connect_error()); 
} 
?>