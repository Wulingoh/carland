<?php 
include "../../config.php";



$id = $_GET['vehicleId'];
$query = "DELETE FROM vehicles WHERE vehicle_id ='$id' ";
mysqli_query($link, $query);
header("Location: index.php");




?>
