<?php 
include "config.php";
include "library/image-creation.php";

$id = $_GET['carID'];
$sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE car_ID = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
extract($row);

$year = $row['car_Year'];
$price = $row['car_Price'];
$detail = $row['car_Detail'];
$img = $row['car_Img'];
$make = $row['car_Make'];
$model = $row['car_Model'];
$type = $row['car_Type'];
$color = $row['car_Color'];
$fuel = $row['car_Fuel'];
$safe = $row['car_Safe'];

/*if(isset($_SESSION['user_Email'])){
  $email = $_SESSION['user_Email'];

}
$queryUser = "SELECT * FROM customers WHERE user_Email = '$email'";
$resultU = mysqli_query($link, $queryUser);
$rowU = mysqli_fetch_array($resultU);
extract($rowU);
$userID = $rowU ['user_ID'];*/

$msg = "Add into your Wishlist";
$userID = $_SESSION['user_ID'];
if(isset($_POST['addWish'])){
  $queryWish = "SELECT * FROM wishlist WHERE user_ID = '$userID' && car_ID = '$id' ";
  $resultW = mysqli_query($link, $queryWish);
  $num = mysqli_num_rows($resultW); 

  if($num == 0){
    $queryAddwish = "INSERT INTO wishlist (user_ID, car_ID) VALUE ('$userID','$id')" ;
    mysqli_query($link, $queryAddwish);
    $msg = "Remove from your Wishlist" ;
  } else {
    $queryDeletewish = "DELETE FROM wishlist WHERE  user_ID = '$userID' && car_ID = '$id' ";
    mysqli_query($link, $queryDeletewish);
    $msg = "Add into your Wishlist";
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
  <title>Vehicle</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="css/index.css" rel="stylesheet">
  
  <script>
    function displayImg(galleryImg) {
      document.images["bigImgA"].src = "admin/cars/uploads/" + galleryImg  ;
      document.images["bigImgB"].src = "admin/cars/uploads/" + galleryImg  ;
      

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
      <h3><b><?php echo $detail; ?></b></h3>
      

    </div>
    <br><hr>
    
  <div class="row">

  <div class="col">
            <div class="carousel slide carousel-fade" data-bs-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="admin/cars/uploads/<?php echo $img;?>" id="bigImgA" width="800" height="500"   class="img-fluid mx-auto d-block" />
                  </div>
                  <?php 
           $queryG = "SELECT * FROM gallery WHERE car_ID = '$id'";
           $resultG = mysqli_query($link, $queryG);
     
           while($rowG = mysqli_fetch_array($resultG)){
           $id = $rowG['car_ID'];
           $galleryID = $rowG['gallery_ID'];
           $galleryCap = $rowG['gallery_Cap'];
           $galleryImg = $rowG['gallery_Img'];
         ?>
                  <div class="carousel-item">
                     <img src="admin/cars/uploads/<?php echo $galleryImg; ?>" id="bigImgB"  class="img-fluid mx-auto d-block" width="800">
                  </div>
         <?php  
         } 
         ?>
           </div>
          </div>
          
          <br>
          <hr>

          
          

         

                
            




        <div class="row justify-content-md-center">
         <br>
         <?php 
           $queryG = "SELECT * FROM gallery WHERE car_ID = '$id'";
           $resultG = mysqli_query($link, $queryG);
     
           while($rowG = mysqli_fetch_array($resultG)){
           $id = $rowG['car_ID'];
           $galleryID = $rowG['gallery_ID'];
           $galleryCap = $rowG['gallery_Cap'];
           $galleryImg = $rowG['gallery_Img'];
    
    
         ?>
        

            <div class="col col-sm-3">
              <a href="javascript: displayImg('<?php echo $galleryImg; ?>'); ">
                <img src="admin/cars/uploads/<?php echo $galleryImg; ?>" width="200" class="img-fluid mx-auto d-block" />
              </a>
              <br>
            </div>
         
         <?php  
         } 
         ?>
        </div>
        <br>
        <br>
          


          

        </div>
        <div class="col col-lg-3">
            <br><br><br>
            <h4 style="color: red;"><span style="font-size: 20px;color:crimson;"><i class="fas fa-tags"></i></span><b>$<?php echo number_format($price); ?></b></h4><br><br>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-tools"></i></span><?php echo $make; ?></p>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="far fa-life-ring"></i></span><?php echo $model; ?></p>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-car-side"></i></span><?php echo $type; ?></p>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-gas-pump"></i></span><?php echo $fuel; ?></p>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-calendar-alt"></i></span><?php echo $year; ?></p>
            
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-shield-alt"></i></span><?php echo $safe; ?></p>
            <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-palette"></i></span><?php echo $color; ?></p>
            <br>
            <form method="POST">
            <button type="submit" name="addWish" class="btn btn-danger"><span style="font-size: 15px;"><b><?php echo $msg; ?></b></span></button>
            </form>
        </div>

    </div>

  







</div>
</section>















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

 
function addWish(){
   if(document.getElementById("addWish").className == "far fa-heart"){
     document.getElementById("addWish").className = "fas fa-heart";
     
     
   } else {
     document.getElementById("addWish").className = "far fa-heart";
    
    
   }

 }


    
  






</script>
</body>
</html>