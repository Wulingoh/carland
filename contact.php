<?php
include "config.php";
include "returnPage.php";

if(isset($_POST)) {
    $form_success = true;
    $form_errors = array();

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $date = date('d/m/y');
    $time = date('H:i:s');

    $contact_fullname = $_POST['contact_fullname'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $contact_enquiry = $_POST['contact_enquiry'];
    $contact_message = $_POST['contact_message'];

    if(empty($contact_fullname)) {
        $form_success = false;
        $form_errors[] = "You have not entered a fullname";
    }
    if(empty($contact_email)) {
        $form_success = false;
        $form_errors[] = "You have not entered an email address";
    } elseif (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
        $form_success = false;
        $form_errors[] = "You have not entered a valid address";
    }
    if(empty($contact_message)) {
        $form_success = false;
        $form_errors[] = "You have entered a message";
    } elseif(strlen($contact_message) < 20) {
        $form_success = false;
        $form_errors[] = "Your messages must be greater than 20 characters";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include "navigation.php" ?>
    <div class="jumbotron jumbotron-wrapper px-1 py-1">
        <div class="row">
            <div class="col-md-6 jumbotron-title">
                <h3>CONTACT US</h3>
            </div>
            <div class="col-md-6 jumbotron-img-wrapper">
                <img class="jumbotron-img" src="images/contact.svg" alt="" />
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- breadcrumbs -->
        <div class="row">
            <div class="pull-left col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end of breadcrumbs -->
        <div class="container container-error-wrapper">
            <ul id="errors" class="">
                <li id="info">There were some problems with your form submission:</li>
            </ul>
            <p id="success">Thanks for your message! We will get back to you ASAP!</p>
        </div>

        <div class="container contactForm-wrapper mt-3 mb-5">
            <div class="row registerRowBox">
                <div class="col-6 register-left-frame">
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label" for="fullname">Fullname <span class="required">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="contact_fullname" placeholder="Fullname" pattern=[A-Z\sa-z]{3,20} required="required" autofocus="autofocus">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="email">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" name="contact_email" placeholder="Email" required="required">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="contact_phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="enquiry">Enquiry</label>
                            <select class="form-control" id="enguiry" name="contact_enquiry">
                            <option value="0">Select a Topic</option>
                            <option value="1">General</option>
                            <option value="2">Vehicle </option>
                            <option value="3">Service</option>
                            <option value="4">Complaint</option>
                            <option value="5">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="required">*</span></label>
                            <textarea class="form-control" id="message" name="contact_message" rows="3" placeholder="Your message must be greater than 20 characters" required="required" data-minlength="20"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">
                            Send
                        </button>
                        <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
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

























    <?php include "footer.php" ?>
</body>

</html>