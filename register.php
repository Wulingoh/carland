<?php
// Database Connection.
include 'config.php';

$showSuccess = false;
$showErrors = array();

if (isset($_POST['register_submit'])) {

    // Include file which makes the

    $user_fullname = $_POST["fullname"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $user_email = $_POST["email"];

    

    // validated users fields

    if (empty($user_fullname)) {
        $showErrors[] = "You have not entered a fullname";
    }
    if (empty($password)) {
        $showErrors[] = "Please enter the password";
    } elseif($password !== $cpassword) {
        $showErrors[] = "Passwords do not match";
    } 

    if (empty($user_email)) {
       $showError = "You have not entered an email address";
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $showErrors[] = "You have not entered a valid address";
    }
    if (empty($showErrors)) {
        $query = "Select * from users where user_email='$user_email'";

        $result = mysqli_query($link, $query);

        $row = mysqli_num_rows($result);
        // This sql query is use to check if
        // the username is already present 
        // or not in our Database 

        if ($row > 0) {
            $showErrors[] = "This email already exists and not available. Please choose another one.";
        }
    }
    if (empty($showErrors)) {

        $hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );
        // Password Hashing is used here. 

        $query = "INSERT INTO `users` ( `user_email`, 
                    `password_hash`, `user_fullname`, `user_role`) VALUES ('$user_email', 
                    '$hash', '$user_fullname', 'customer')";

        $result = mysqli_query($link, $query);

        if (mysqli_error($link)) {
            echo mysqli_error($link);
        }

        if ($result) {
            $showSuccess = true;
            header("Location:login.php");
        }
    } 

} //end if   

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
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end of breadcrumbs -->
        <!-- show error -->
        <div class="container container-error-wrapper">
            <ul id="errors" class="<?php
                if(!empty($showErrors)) echo $showErrors ? 'visible' : ''; ?>">
                <li id="info">There were some problems with your registration:</li>
                <?php
                if (!empty($showErrors)) :
                    foreach ($showErrors as $showError) :
                ?>
                <li>
                    <?php echo $showError ?></li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
            <p id="success" class="<?php 
                if (!$showErrors) echo $showSuccess ? 'visible' : ''; ?>">Thanks for your message! We will get back to you ASAP!</p>
        </div>
         <!-- end of show error  -->
        <div class="container">
                <h1 class="text-center">Register Here</h1>
            <div class="container registerForm-wrapper mt-3 mb-5">
                <div class="row registerRowBox">
                    <div class="col-6 register-left-frame">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" pattern=[A-Z\sa-z]{3,20} autofocus="autofocus"required="required">
                                <span class="error" aria-live="polite"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                                <span class="error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
                                <span class="error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" required="required">
                                <span class="error" aria-live="polite"></span>

                                <small id="emailHelp" class="form-text text-muted">
                                    Make sure to type the same password
                                </small>
                            </div>

                            <button id="register_submit" type="submit" name="register_submit"class="btn btn-outline-success btn-block">
                                Register
                            </button>
                        </form>
                        <?php unset($_SESSION['register_submit']); ?>
                    </div>
                    <div class="col-6 register-right-frame">
                        <div class="row justify-content-center">
                            <div class="mt-5 text-center">
                                <img class="registerPageLogo" src="images/registerPageLogo.svg" alt="" />
                                <div class="text-center mt-5 registerTitle">Register</div>
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