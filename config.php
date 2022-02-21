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

if($link) {
    echo "success"; 
} 
else {
    die("Error". mysqli_connect_error()); 
} 

// we save the new image here
define('PRODUCT_IMG_DIR', '/Users/wulingoh/code/vision_college2021/www_2021/PHPandMySQL/acme_cars/vehicle_images/');

// width is scale on the fly
define('THUMBNAIL_WIDTH', 500);
?>