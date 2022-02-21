<?php

$showAlert = false;
$showError = false;
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    include 'config.php';

    $user_email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $fullname = $_POST["fullname"];


    $sql = "Select * from users where user_email='$user_email'";

    $result = mysqli_query($link, $sql);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if ($num == 0) {
        if (($password == $cpassword) && $exists == false) {

            $hash = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Password Hashing is used here. 
            $sql = "INSERT INTO `users` ( `user_email`, 
                    `password_hash`, `user_fullname`, `user_role`) VALUES ('$user_email', 
                    '$hash', '$fullname', 'customer')";

            $result = mysqli_query($link, $sql);

            if (mysqli_error($link)) {
                echo mysqli_error($link);
            }

            if ($result) {
                $showAlert = true;
                header("Location:login.php");
            }
        } else {
            $showError = "Passwords do not match";
        }
    } // end if 

    if ($num > 0) {
        $exists = "This email already exists and not available. Please choose another one.";
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
        <?php

        if ($showAlert) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
            </button> 
            </div> ';
        }

        if ($showError) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                        <strong>Error!</strong> ' . $showError . '
                        <button type="button" class="close" data-dismiss="alert aria-label="Close">
                        <span aria-hidden="true">×</span> 
                        </button> 
                    </div> ';
        }

        if ($exists) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' . $exists . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                        </button>
                    </div> ';
        }
        ?>
         <!-- end of show error  -->
        <div class="container">
                <h1 class="text-center">Register Here</h1>
            <div class="container registerForm-wrapper mt-3 mb-5">
                <div class="row registerRowBox">
                    <div class="col-6 register-left-frame">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="user_fullname">Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">

                                <small id="emailHelp" class="form-text text-muted">
                                    Make sure to type the same password
                                </small>
                            </div>

                            <button type="submit" class="btn btn-outline-success btn-block">
                                Register
                            </button>
                        </form>
                    </div>
                    <div class="col-6 register-right-frame">
                        <div class="row d-flex">
                            <div class="col-10 register-logo-square">
                                <img class="registerPageLogo" src="images/registerPageLogo.svg" alt="" />
                                <h3 class="registerTitle">Register</h3>
                                <h5 class="registerTexts">Welcome to Carland</h5>
                                <ul class="nav justify-content-center registerPageIcons">
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