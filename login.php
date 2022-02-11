<?php 
include "config.php";
$error = " ";
if (isset($_POST['login'])){
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];
    if($email == "" || $password == ""){
        $error  = "Please enter your email and password";
    }
    else{
    $query = "SELECT * FROM customers WHERE user_Email = '$email' && user_Password = '$password' ";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        extract($row);
        $_SESSION['user_ID'] = $row['user_ID'];
        $_SESSION['user_Email'] = $row['user_Email'];
        $_SESSION['user_Name'] = $row['user_Name'];
        $_SESSION['user_Role'] = $row['user_Role'];
        if($_SESSION['user_Role'] == 2){
          header("Location: admin/index.php");
        }
        else {
          header("Location: index.php");
        }



    }
    else {
        $error = "Please check your email or password!";
    }
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
<div class=" col col-lg-12" style="background-color: gray; ">
<ul id="loginList" style="float: right;background-color: gray;">
        <li class="topLogin" style="display: inline;">
        <?php
          if (isset($_SESSION['user_Email'])){
              echo  "Hi, ". $_SESSION['user_Name']."<a href='logout.php'>[logout]</a><a href='wishlist.php'>[My Wishlist]</a>";
          }
          else {
          ?>
          <a  href="login.php" ><img src="image/login.png" alt="login" class="loginIcon">
          <span>Login</span>
          </a>
          
        </li>
        <li class="topLogin" style="display: inline;">
          <a  href="signup.php"><img src="image/signup.png" alt="signup" class="loginIcon"><span>Sign Up</span></a>
        </li>
        <li class="topLogin" style="display: inline;">
          <a  href="#"  style="padding-right: 50px;"><img src="image/wishlist.png" alt="signup" class="loginIcon"><span>Wishlist</span></a>
        </li>
        <?php
          } 
          ?>
        
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
          
        </div>
       </div>
  
       <div class="row justify-content-md-center">
        <div class="col col-lg-4 ">
           <label for="password" class="form-label" style="color: white;">Password</label>
           <input type="password" class="form-control" name="userPassword">
           <?php 
             if($error !== ""){
                 echo $error;
             }
           ?>
        </div>
       </div>
        <br>
       
        <br>
        <div class="row justify-content-md-center">
        <div class="col-md-auto">
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        </div>
        </div>
      </form>
      <div class="row justify-content-md-center">
      <div class="col-md-auto">
          <br>
          <p style="color: white;">---Not a member? <a href="signup.php" style="color: blue;">Sign Up here<a>.---</p>
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