<?php 
include "../../config.php";
include "../../checkLoginAdminRole.php";





   
      
    if (isset($_POST['modalUpdate'])) {
        $user_id = $_POST['user_id'];
        $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $role = mysqli_real_escape_string($link, $_POST['role']);
        
        $hash = password_hash($password,  PASSWORD_DEFAULT);
    
        $query = "UPDATE users SET user_fullname = '$fullname', user_email = '$email', password_hash = '$hash', user_role = '$role' WHERE user_id = '$user_id'";
        $result= mysqli_query($link, $query);

         
        header("Location: index.php");
        }
    
    
    
?>