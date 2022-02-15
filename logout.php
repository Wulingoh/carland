<?php
include "config.php";

unset($_SESSION['user_Email']);
unset($_SESSION['user_Name']);

// now that the member is logged out, go to login page
header('Location: login.php');
?>