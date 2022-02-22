<?php
include "config.php";
//unset($_SESSION['cart']);
session_start();
// check if member is signin
if (isset($_SESSION['email'])) {
  session_destroy();
  //unset($_SESSION['memberID']);
  //unset($_SESSION['email']);
  //unset($_SESSION['name']);
  //unset($_SESSION['role']);
}
// redirect
header("Location: index.php");
?>
