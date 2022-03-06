<?php
include "config.php";
//unset($_SESSION['login']);
session_start();
// check if member is login
if (isset($_SESSION['email'])) {
  session_destroy();
  
}
// redirect
header("Location: index.php");
?>
