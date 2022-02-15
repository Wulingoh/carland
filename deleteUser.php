<?php 
include "../../config.php";



$user_ID = $_GET['userID'];
$query = "DELETE FROM customers WHERE user_ID='$user_ID' ";
mysqli_query($link, $query);
header("Location: usersIndex.php");




?>

