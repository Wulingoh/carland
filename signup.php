<?php 
include "config.php";
$errorEmail = "";
$errorName = "";
$errorPassword = "";
$errorConfirm = "";



if (isset($_POST['signup'])) {
    $email = $_POST['userEmail'];
    $name = $_POST['userName'];
    $password = $_POST['userPassword'];
    $confirmPwd = $_POST['confirmPassword'];
    $query = "SELECT * FROM customers WHERE user_Email='$email'";
    $result =  mysqli_query($link, $query);
    if ($email == "" OR !stristr($email, "@") OR !stristr($email, ".")){
        $errorEmail = "Please enter a valid email address";
    }else if ($row = mysqli_fetch_array($result)){
        $errorEmail =  "This email already exists, please choose anther one";
    }else if ($name == ""){
        $errorName = "Please enter a username";
    }else if ($password == "") {
        $errorPassword = "Please enter a password";
    }else if ( $confirmPwd == "" OR $confirmPwd !== $password ){
        $errorConfirm = "Please confirm your password";
    }

   else{ 
    $query = "INSERT INTO customers (user_Email, user_Name, user_Password) VALUE ('$email', '$name', '$password')";
    mysqli_query($link, $query);
    header("Location: login.php");
   }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>Welcome to CarLand!</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/signup.css" rel="stylesheet">
  

  
</head>
<body>
<div class="mycontainer">
<div class="row">
<div class="col-lg-12" style="background-color: gray; ">
<ul id="loginList" style="float: right;background-color: gray;">
        <li class="topLogin" style="display: inline;">
        <?php
          if (isset($_SESSION['user_Email'])){
              echo  "Hi, ". $_SESSION['user_Name']."<a href='logout.php'>[logout]</a>";
          }
          else {
          ?>
          <a  href="login.php" ><img src="image/login.png" alt="login" class="loginIcon">
          <span>Login</span>
          </a>
          <?php
          } 
          ?>
         
        </li>
        <li class="topLogin" style="display: inline;">
          <a  href="signup.php"><img src="image/signup.png" alt="signup" class="loginIcon"><span>Sign Up</span></a>
        </li>
        <li class="topLogin" style="display: inline;">
          <a  href="#"  style="padding-right: 50px;"><img src="image/wishlist.png" alt="signup" class="loginIcon"><span>Wishlist</span></a>
        </li>
</ul>
</div>
</div>

<section>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: white; ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
       <span style="font-size: 30px;font-weight:bolder;color:red">Find your valuable car!</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="padding-left: 500px;">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cars</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Finance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Service</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Car Land
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">About Us</a></li>
            <li><a class="dropdown-item" href="#">Contact Us</a></li>
          </ul>
          
        </li>
        
        
        
      </ul>
  
      
    </div>
  </div>
</nav>
</div>
<div id="mainSection">
    
    
    
    
<div  style="background:cadetblue;">
<br>
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <img src="image/logo.png" class="img-fluid" style="width: 200px;" />
        </div>        
    </div>
   
    <form method="post">
       <div class="row justify-content-md-center">
        <div class="col col-lg-4 ">
          <label for="email" class="form-label" style="color: white;">Email address</label>
          <input type="email" class="form-control" name="userEmail" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text" style="color: gray;">***We'll never share your email with anyone else.***</div>
          <?php 
          if ($errorEmail !== "") {
              echo $errorEmail;
          }
          ?>
        </div>
       
       </div>
       <div class="row justify-content-md-center">
        <div class="col col-lg-4 ">
            <label for="userName" class="form-label" style="color: white;">User Name</label>
            <input type="username" class="form-control" name="userName">
            <?php 
          if ($errorName !== "") {
              echo $errorName;
          }
          ?>
        </div>
       </div>
       <div class="row justify-content-md-center">
        <div class="col col-lg-4 ">
           <label for="password" class="form-label" style="color: white;">Password</label>
           <input type="password" class="form-control" name="userPassword">
           <?php 
          if ($errorPassword !== "") {
              echo $errorPassword;
          }
          ?>
        </div>
       </div>
       <div class="row justify-content-md-center">
        <div class="col col-lg-4 ">
           <label for="confirmpassword" class="form-label" style="color: white;">Confirm Password</label>
           <input type="password" class="form-control" name="confirmPassword">
           <?php 
          if ($errorConfirm !== "") {
              echo $errorConfirm;
          }
          ?>
        </div>
       </div>
        <br>
        <div class="row justify-content-md-center">
        <div class="col-md-auto form-check">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" for="checkbox" style="color: white;">Sign Up to get updated deals!</label>
        </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
        <div class="col-md-auto">
        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
        </div>
        </div>
      </form>
      <div class="row justify-content-md-center">
      <div class="col-md-auto">
          <br>
          <p style="color: white;">---Already a member? <a href="login.php" style="color: blue;">Login here<a>.---</p>
          <br>
          <br>

      </div>
      </div>
   
</div>

</div>





</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>