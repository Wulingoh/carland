<?php 
include "../../config.php";


$id = $_GET['carID'];
$img_id = $_GET['imgID'];
$query = "DELETE FROM vehicle_gallery WHERE img_id='$img_id' ";
mysqli_query($link, $query);

header("Location: gallery.php?carID=".$id);




?>