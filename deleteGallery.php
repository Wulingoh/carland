<?php 
include "../../config.php";


$id = $_GET['carID'];
$galleryID = $_GET['galleryID'];
$query = "DELETE FROM gallery WHERE gallery_ID='$galleryID' ";
mysqli_query($link, $query);

header("Location: gallery.php?carID=".$id);




?>
