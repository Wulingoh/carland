<?php
include "config.php";
$errorMessage = "";

if (isset($_POST['btn_login'])) {

    if ($stmt = $link->prepare('SELECT user_id, password_hash, user_role FROM users WHERE user_email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $password_hash, $userRole);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password_hash)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_role'] = $userRole; 
                
                if ($userRole == 'admin' ) {
                    header('Location: admin/index.php');
                } else {
                    if (isset($_SESSION['return_page'])) {
                        header("Location: ".$_SESSION['return_page']);
                    } // end of if
                    else {
                        header("Location: index.php");
                    }
                }
            } else {
                // Incorrect password
                $errorMessage = 'Incorrect email and/or password!';
            }
        } else {
            // Incorrect username
            $errorMessage = 'Incorrect email and/or password!';
        }
        $stmt->close();
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
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- html for register form below -->
    <?php include "navigation.php" ?>
    <div class="container-fluid">
        <!-- breadcrumbs -->
        <div class="row">
            <div class="pull-left col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end of breadcrumbs -->
        <div class="container">
            <h1 class="text-center">Login</h1>
            <div class="container loginForm-wrapper mt-3 mb-5">
                <div class="row loginRowBox">
                    <div class="col-6 login-left-frame">
                        <form action="login.php" method="post">
                            <div class="form-group mt-5">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp" required>
                            </div>

                            <div class="form-group mt-5">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <input type="submit" id="btn_login" value="Login" name="btn_login" class="btn btn-outline-success btn-block" role="button">
                            </input>
                            <small id="emailHelp" class="form-text text-muted text-center">
                                Don't have an account? <a href="register.php">Register</a>
                            </small>
                            <small id="passwordHelp" class="form-text text-muted text-center">
                                Forgotten your password? <a href="forgotPassword.php">Password Reset</a>
                            </small>
                        </form>
                    </div>
                    <div class="col-6 register-right-frame">
                        <div class="row justify-content-center">
                            <div class="mt-5 mb-5 text-center justify-content-center register-logo-square">
                                <img class="mt-3 registerPageLogo" src="images/registerPageLogo.svg" alt="" />
                                <div class="registerTitle mt-3">Login</div>
                                <div class="registerTexts mt-5">Welcome to Carland</div>
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