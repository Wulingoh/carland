<?php
include "config.php";
$showErrors = false;
$showSuccess = false;

if (isset($_POST['forgot_password'])) {

    // check if the user exist or not
    $user_email = $_POST['user_email'];

    $query = "SELECT `user_id`, `user_email` FROM `users` WHERE `user_email` = '$user_email'";
    $result = mysqli_query($link, $query);

    $row_count = mysqli_num_rows($result);
    
    if($row_count > 0){
        //Generate a random string.
        $token = openssl_random_pseudo_bytes(16);
        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        $url = "http://localhost:3000/resetPassword.php?token=$token";
        
        mail($user_email, "Reset Password", "To Reset the Password, Please Visit: $url", "From: support@domain.com\r\n");
    
        $query = "UPDATE `users` SET `password_reset_token`='$token' WHERE `user_email` = '$user_email'";
        $result = mysqli_query($link, $query);
        $showSuccess = "Please check your email for your password reset.";
    }
       else {
        $showErrors = "That email address was not found in our system!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- hmtl for register form below -->
    <?php include "navigation.php" ?>
    <div class="container-fluid">
        <!-- breadcrumbs -->
        <div class="row">
            <div class="pull-left col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end of breadcrumbs -->
        <!-- show error -->
        <div class="container container-error-wrapper">
            <?php if(!empty($showErrors)) echo "<ul id='errors_forgot_password' class='visible'> 
                 <li id='info'>$showErrors</li>"?>
            </ul>
            <?php if (!empty($showSuccess)) echo "<p id='success_forgot_password' class='visible'> $showSuccess</p>" ?>
        </div>
         <!-- end of show error  -->
        <div class="container">
            <div class="container registerForm-wrapper mt-3 mb-5">
                <div class="row registerRowBox">
                    <div class="col-6 register-left-frame">
                        <form action="forgotPassword.php" method="post">
                            <div class="form-group mt-5">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="user_email" placeholder="Email" required="required">
                                <span class="error" aria-live="polite"></span>
                            </div>
                            <button id="forgot_password" type="submit" name="forgot_password"class="btn btn-outline-success btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                    <div class="col-6 register-right-frame">
                        <div class="row mb-5 justify-content-center">
                            <div class="mt-5 text-center register-logo-square">
                                <img class="mt-3 registerPageLogo" src="images/registerPageLogo.svg" alt="" />
                                <div class="text-center mt-5 registerTitle">Forgot Password</div>
                                <div class="text-center mt-3 registerTexts">Welcome to Carland</div>
                                <ul class="nav justify-content-center mt-5 registerPageIcons">
                                    <li class="nav-item navRegisterIcon"><i class="bi bi-facebook"></i></li>
                                    <li class="nav-item navRegisterIcon"><i class="bi bi-twitter"></i></li>
                                    <li class="nav-item navRegisterIcon"><i class="bi bi-linkedin"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>