<?php 
include "../../config.php";



$car_ID = $_GET['carID'];
$query = "DELETE FROM cars WHERE car_ID='$car_ID' ";
mysqli_query($link, $query);
header("Location: carIndex.php");




?>
