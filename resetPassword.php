<?php
// Database Connection.
include 'config.php';
$validToken = false;
$showSuccess = false;
$showErrors = array();


if (isset($_POST['resetPassword'])) {

    // Include file which makes the
    $passwordResetToken = $_POST['passwordResetToken'];
    $userPassword = $_POST["password"];
    $userCpassword = $_POST["cpassword"];

    // validated users fields
    if (empty($userPassword)) {
        $showErrors[] = "Please enter the password";
    } elseif ($userPassword !== $userCpassword) {
        $showErrors[] = "Passwords do not match";
    }
    if (empty($showErrors)) {

        $hash = password_hash(
            $userPassword,
            PASSWORD_DEFAULT
        );
        // Password Hashing is used here.

        echo $passwordResetToken;
        $query = "UPDATE `users` SET `password_hash` = '$hash', `password_reset_token` = NULL WHERE `password_reset_token` = '$passwordResetToken'";

        $result = mysqli_query($link, $query);
        echo $result;
        if (mysqli_error($link)) {
            echo mysqli_error($link);
        }

        if ($result) {
            header("Location:login.php");
        }
    }
} //end if   
else {
    $passwordResetToken = $_GET["token"];

    $query = "SELECT * FROM `users` WHERE `password_reset_token`= '$passwordResetToken'";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $validToken = true;
    } else {
        header("Location:index.php");
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
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end of breadcrumbs -->
            <!-- show error -->
            <div class="container container-error-wrapper">
                <ul id="errors" class="<?php
                                        if (!empty($showErrors)) echo $showErrors ? 'visible' : ''; ?>">
                    <li id="info">There were some problems with your reset password:</li>
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
                                        if (!$showErrors) echo $showSuccess ? 'visible' : ''; ?>">Your password has been reset. Please proceed to log in.</p>
            </div>
            <?php if ($validToken) { ?>
                <!-- end of show error  -->
                <div class="container">
                    <div class="container registerForm-wrapper mt-3 mb-5">
                        <div class="row registerRowBox">
                            <div class="col-6 register-left-frame">
                                <form action="resetPassword.php" method="post">
                                    <input type="hidden" name="passwordResetToken" value="<?php echo $passwordResetToken; ?>">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
                                        <span class="error" aria-live="polite"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword">Confirm New Password</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" required="required">
                                        <span class="error" aria-live="polite"></span>

                                        <small id="emailHelp" class="form-text text-muted">
                                            Make sure to type the same new password
                                        </small>
                                    </div>

                                    <button id="register_submit" type="submit" name="resetPassword" class="btn btn-outline-success btn-block">
                                        Update
                                    </button>
                                </form>
                            </div>
                            <div class="col-6 register-right-frame">
                                <div class="row justify-content-center">
                                    <div class="mt-5 text-center">
                                        <img class="registerPageLogo" src="images/registerPageLogo.svg" alt="" />
                                        <div class="text-center mt-5 registerTitle">Create New Password</div>
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
<?php
            }
        }
?>
<?php include "footer.php" ?>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>