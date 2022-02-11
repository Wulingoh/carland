<?php 
include "config.php";
include "library/image-creation.php";

$userID = $_SESSION['user_ID'];








?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>My Wishlist</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="css/index.css" rel="stylesheet">
  
  <script>
    function deleteWish(carID) {
      if (confirm("Are you sure you want to remove it form your wishlist?")) {
        window.location.href = "deleteWishlist.php?carID=" + carID ;
      }
    }
 </script>
  
</head>

<body>
<div class="mycontainer">
<div class="row">
<div class="col col-lg-12" style="background-color: gray; ">
<ul id="loginList" style="float: right;background-color: gray;">
        <li class="topLogin" style="display: inline;">
        <?php
          if (isset($_SESSION['user_Email'])){
              echo  "Hi, ". $_SESSION['user_Name']."<a href='logout.php'>[logout]</a><a href='myWishlist.php'>[My Wishlist]</a>";
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
          <a  href="myWishlist.php"  style="padding-right: 50px;"><img src="image/wishlist.png" alt="signup" class="loginIcon"><span>Wishlist</span></a>
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
       <img src="image/logo.png" alt="logo" style="width: 150px;" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="padding-left: 700px;">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="car.php">Cars</a>
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

<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            Breadcrumb
        </div>
        <div class="col col-lg-2">
            <a href="car.php">Back to Search</a>
        </div>
    </div>
    <br><br>

    <div class="row">
        <h3><b>My Favourite Car<b></h3>
        <hr>

    </div>

    <?php 
    $querymyWish = "SELECT * FROM wishlist WHERE user_ID = '$userID'";
    $resultmyWish = mysqli_query($link, $querymyWish);
    while ($rowmyWish = mysqli_fetch_array($resultmyWish)){
    
    $id = $rowmyWish['car_ID'];
    

    $queryCar = "SELECT * FROM cars WHERE car_ID = '$id' ";
    $resultCar = mysqli_query($link, $queryCar);
    while($rowCar = mysqli_fetch_array($resultCar)){
    
   
    $id = $rowCar['car_ID'];
    $price = $rowCar['car_Price'];
    $detail = $rowCar['car_Detail'];
    $img = $rowCar['car_Img'];
    
    ?>

    <div class="row">
    
        <div class="col col-lg-3">
           <img src="admin/cars/uploads/<?php echo $img ;?>" width="300"  class="img-fluid" />
        </div>
        <div class="col col-lg-3">
           <h5 style="text-align:center;"><b><?php echo $detail; ?></b></h5>
        </div>
        <div class="col col-lg-3">
           <h3 style="color: red;text-align:center;"><b>$<?php echo number_format($price); ?></b></h3>
        </div>
        <div class="col col-lg-3" style="text-align:center;">
            <div class="row">
            <a href="carinfo.php?carID=<?php echo $id; ?>" title="view the car">
               <span style="font-size: 50px;color:brown;"><i class="fas fa-eye"></i></span>
            </a>
            </div>
            <div class="row">
            <a href="javascript:deleteWish(<?php echo $id; ?>)" title="remove from list">
               <span style="font-size: 50px;color:brown;"><i class="fas fa-times"></i></span>
            </a>
            </div>
        </div>
        
        
    </div>
    <hr>
    <?php 
    }
}
    ?>


   
</div>
</section>















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>
</html>