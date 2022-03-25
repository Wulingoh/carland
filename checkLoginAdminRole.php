<?php

if ($_SESSION['user_role'] != 'admin' ) {
    header('Location: /login.php');
    
} 
?>