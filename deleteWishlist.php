<?php 
include "config.php";
include "library/image-creation.php";

$userID = $_SESSION['user_ID'];


$id = $_GET['carID'];

$query = "DELETE FROM wishlist WHERE user_ID = '$userID' && car_ID = '$id' ";
mysqli_query($link, $query);

header("Location: myWishlist.php");




?>