<?php 
include "../../config.php";



$user_id = $_GET['userId'];
$query = "DELETE FROM users WHERE user_id ='$user_id' ";
mysqli_query($link, $query);
header("Location: index.php");




?>