<?php 
include "config.php";

$queryBestseller = "SELECT * FROM cars WHERE tag_ID = '1'";
$resultBestseller = mysqli_query($link, $queryBestseller);
$rowBestseller = mysqli_fetch_array($resultBestseller);
extract($rowBestseller);
$idBestseller = $rowBestseller['car_ID'];
$imgBestseller =  $rowBestseller['car_Img'];
$priceBestseller = $rowBestseller['car_Price'];

$queryHotdeal = "SELECT * FROM cars WHERE tag_ID = '2'";
$resultHotdeal = mysqli_query($link, $queryHotdeal);
$rowHotdeal = mysqli_fetch_array($resultHotdeal);
extract($rowHotdeal);
$idHotdeal = $rowHotdeal['car_ID'];
$imgHotdeal =  $rowHotdeal['car_Img'];
$priceHotdeal = $rowHotdeal['car_Price'];

$queryNewarrival = "SELECT * FROM cars WHERE tag_ID = '3'";
$resultNewarrival = mysqli_query($link, $queryNewarrival);
$rowNewarrival = mysqli_fetch_array($resultNewarrival);
extract($rowNewarrival);
$idNewarrival = $rowNewarrival['car_ID'];
$imgNewarrival =  $rowNewarrival['car_Img'];
$priceNewarrival = $rowNewarrival['car_Price'];


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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="css/index.css" rel="stylesheet">
  <style>
    .myimgcontainer {
  position: relative;
  width: 100%;
  }
  .mycar {
  display: block;
  width: 100%;
  height: auto;
}


  .myoverlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: red;
    opacity: 0.8;
    overflow: hidden;
    width: 100%;
    height: 0;
    transition: .5s ease;
  }
  
  .myimgcontainer:hover .myoverlay {
    height: 20%;
  }
  
  .cartext {
    white-space: nowrap; 
    color: white;
    font-size: 20px;
    position: absolute;
    overflow: hidden;
    top: 50%;
    left: 80%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
  }
  .mytag {
    
  position: absolute;
  top: 0;
  right: 0;
  
}
  


 </style> 

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

<div class="row justify-content-md-center">
  <div class="col-md-auto">
     <img src="image/header1.jpg" alt="banner" class="img-fluid" />
  </div>
</div> 
<br>
<br>

<div class="row justify-content-md-center">
  <div class="col-md-auto">
     <h1 style="color:crimson;">Welcome to Carland!</h1>
     <hr> 
  </div>
  
</div> 
<br>

<div class="row justify-content-md-center">
  <div class="col-md-auto">   
     <h2 >There are only three steps to get your dream car!</h2>
  </div>
</div> 
<br> 
<br>

<div class="container">
<div class="row justify-content-md-center">
  <div class="col col-lg-4">
     <img src="image/Rectangle.jpg" class="img-fluid" style="float: left;padding-right:20px; "  />
     <br>
     <br>
     <h1 style="font-size: 50px;">1.</h1>
     <h4 style="font-size: 30px;"><b>Find your car</b></h3>
     <p>Find the right one from search box</p>   
  </div>
  <div class="col col-lg-4" >
     <img src="image/Rectangle.jpg"  class="img-fluid" style="float: left; padding-right:20px;"  />
     <br>
     <br>
     <h1 style="font-size: 50px;">2.</h1>
     <h4 style="font-size: 30px;"><b>Book an appointment</b></h3>
     <p>Book a meeting and test driving with us</p>   
  </div>
  <div class="col col-lg-4" >
     <img src="image/Rectangle.jpg" class="img-fluid" style="float: left; padding-right:20px;"  />
     <br>
     <br>
     <h1 style="font-size: 50px;">3.</h1>
     <h4 style="font-size: 30px;"><b>Choose a plan</b></h3>
     <p>Choose your finance as you wish</p>   
  </div>
</div> 
<br>
<br>
<br>
<div class="row justify-content-md-center">
  <div class="d-grid gap-2 col-4 mx-auto">
    <button type="button" class="btn btn-danger" onclick="document.location='car.php'"><span style="font-size: 30px;"><b>VIEW ALL VEHICLES</b></span></button>
  </div>

</div>
<br>
<br>
</div>
<hr>
<br>
<div class="container">
<div class="row justify-content-md-center">
  <div class="col-md-auto">   
     <h2 style="font-size: 40px;"><b>Let's make it easier</b></h2>
  </div>
</div> 
<br> 
<div class="row ">
  <div class="col-md-auto">   
     <h2 style="font-size: 25px;"><b>Search By Body Type :</b></h2>
  </div>
</div> 
<br> 
<br>
<br>
<div class="row  justify-content-md-center text-center">

  <div class="col col-lg-3">
    <a href="car.php?filterType=1&filterMake=&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/hatchback.svg" class="img-fluid mx-auto d-block bodytype" onmouseover="bigImg(this)" onmouseout="normalImg(this)" /></a>
    
    <p  >Hatchback</p>
    

  </div>
  <div class="col col-lg-3">
    
    <a href="car.php?filterType=2&filterMake=&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/sedan.svg" class="img-fluid mx-auto d-block bodytype" onmouseover="bigImg(this)" onmouseout="normalImg(this)" /></a>
    <p >Sedan</p>
   

  </div>
  <div class="col col-lg-3">
    <a href="car.php?filterType=3&filterMake=&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/suv.svg" class="img-fluid  mx-auto d-block bodytype" onmouseover="bigImg(this)" onmouseout="normalImg(this)" /></a>
    <p>SUV</p>

  </div>
  <div class="col col-lg-3">
    <a href="car.php?filterType=4&filterMake=&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/van.svg" class="img-fluid  mx-auto d-block bodytype" onmouseover="bigImg(this)" onmouseout="normalImg(this)"/></a>
    
    <p>Van</p>

  </div>


</div>
<br>
<br>
<br>

<div class="row ">
  <div class="col-md-auto">   
     <h2 style="font-size: 25px;"><b>Search By Brand :</b></h2>
  </div>
</div> 
<br> 
<br>
<br>
<div class="row  justify-content-md-center text-center">

  <div class="col col-lg-2">
    <a href="car.php?filterType=&filterMake=1&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/brand logo/Toyota.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>
  <div class="col col-lg-2">
    <a href="car.php?filterType=&filterMake=2&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/brand logo/hyundai.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>
  <div class="col col-lg-2">
    <a href="car.php?filterType=&filterMake=12&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/brand logo/volkswagen.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>
  <div class="col col-lg-2">
    <a href="#"><img src="image/brand logo/audi.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>
  <div class="col col-lg-2">
    <a href="#"><img src="image/brand logo/ford.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>
  <div class="col col-lg-2">
    <a href="car.php?filterType=&filterMake=8&filterModel=&filterMin=&filterMax=&filterCar="><img src="image/brand logo/mercedes-benz.svg" class="img-fluid mx-auto d-block bodytype" /></a>  
  </div>


</div>
<br>
<br>
<br>
<div class="row ">
  <div class="col-md-auto">   
     <h2 style="font-size: 25px;"><b>Search From Box:</b></h2>
  </div>
</div> 
<br> 
<br>
<br>
<form method="GET" action="car.php"  >
       
       <div class="row justify-content-md-center">
         <div class="col col-lg-2">
           <div class="form-floating">
             <select class="form-select" name="filterMake" id="searchMake"  aria-label="Floating label select example" style="border: solid;">
              
             <option value="">Find Make</option>
              <?php
              $queryMake = "SELECT * FROM carmake";
              $result = mysqli_query($link, $queryMake);
              while($row = mysqli_fetch_array($result)){
                extract($row);
              ?>
               
               <option value="<?php echo $make_ID; ?>"><?php echo $car_Make; ?></option>
              <?php
              } 
              ?>
              
             </select>
             <label for="carMake">Choose a car Make</label>
             
           </div>
         </div>

         <div class="col col-lg-3">
           <div class="form-floating">
             <select class="form-select" name="filterModel" id="searchModel"  aria-label="Floating label select example" style="border: solid;">
             <option value="">Please Select Car Make First!</option>
          
             </select>
             <label for="carModel">Choose a car Model</label>
           </div>
         </div>
         <div class="col col-lg-2">
           <div class="form-floating">
             <select class="form-select" name="filterMin" id="priceMin"  aria-label="Floating label select example" style="border: solid;">
             <option value="" selected>Min Price</option>
             <option value="10000">$10,000</option>
             <option value="50000">$50,000</option>
             <option value="100000">$100,000</option>
          
             </select>
             <label for="priceMin">Car Price</label>
           </div>
         </div>
         <div class="col col-lg-2">
           <div class="form-floating">
             <select class="form-select" name="filterMax" id="priceMax"  aria-label="Floating label select example" style="border: solid;">
             <option value="" selected>Max Price</option>
             <option value="50000">$50,000</option>
             <option value="100000">$100,000</option>
             <option value="200000">$200,000</option>
          
             </select>
             <label for="priceMax">Car Price</label>
           </div>
         </div>
       
       

      
         <div class="col col-lg-2">
           <div class="form-floating">
             <input type="keyword" class="form-control" name="keyWord" placeholder="keyword" style="border: solid;">
             <label for="keyword">Key Word</label>
             
           </div>
         </div>

         <div class="col col-lg-1">
           <button type="submit" name="filterCar"  style="background-color: white;border: none;">
           <span style="font-size: 40px;color:red;"><i class="fas fa-car"></i></span>
           </button>
         </div>
         
       </div>
       <br>
</form>

<br>
<br>
</div>
<hr>

<div class="container">
  <br>
  <br>
  <div class="row">
  
    <div class="col col-lg-4 ">
    
      <a href="carinfo.php?carID=<?php echo $idBestseller; ?>">
      <div class="myimgcontainer">
      
      <img src="admin/cars/uploads/<?php echo $imgBestseller;?>"   class="mycar img-fluid " />
      
      <div class="myoverlay">
        <div class="cartext">
          <span style="font-size: 15px;color:white;"><i class="fas fa-tags"></i></span>$<?php echo number_format($priceBestseller); ?>
        </div>
      </div>
      <div class="mytag">
        <img  src="image/bestsellertag.png" width="100" />
      </div>
      </div>
      
      </a>
   
      
    </div>

    <div class="col col-lg-4">
      <a href="carinfo.php?carID=<?php echo $idHotdeal; ?>">
      <div class="myimgcontainer">
      <img src="admin/cars/uploads/<?php echo $imgHotdeal;?>"   class="mycar img-fluid" />
      <div class="myoverlay">
        <div class="cartext">
          <span style="font-size: 15px;color:white;"><i class="fas fa-tags"></i></span>$<?php echo number_format($priceHotdeal); ?>
        </div>
      </div>
      <div class="mytag">
        <img  src="image/hotdealtag.png" width="100" />
      </div>
      </div>
      </a>
    </div>
    <div class="col col-lg-4 ">
      <a href="carinfo.php?carID=<?php echo $idNewarrival; ?>">
      <div class="myimgcontainer">
      <img src="admin/cars/uploads/<?php echo $imgNewarrival;?>"   class="mycar img-fluid" />
      <div class="myoverlay">
        <div class="cartext">
          <span style="font-size: 15px;color:white;"><i class="fas fa-tags"></i></span>$<?php echo number_format($priceNewarrival); ?>
        </div>
      </div>
      <div class="mytag">
        <img  src="image/newarrivaltag.png" width="100" />
      </div>
      </div>
      </a>
    </div>
  </div>
  <br>
  
  <div class="row">
    <p style="text-align: right;"><a href="car.php"><b>View More Cars>></b></a></p>
  </div>


</div>
<hr>








</section>















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
function bigImg(x) {
  x.style.height = "80px";
  x.style.width = "200px";
}

function normalImg(x) {
  x.style.height = "60px";
  x.style.width = "150px";
}



$(document).ready(function(){
  $('#searchMake').on('change',function(){
    var makeID = $(this).val();
    if (makeID){
      $.ajax({
        type: 'POST',
        url: 'displayModel.php',
        data: 'make_ID='+makeID,
        success:function(html){
          $('#searchModel').html(html);

        }

      });
    }else{
      $('#searchModel').html('<option value="">Select make first</option>');
    }
  
  });
});
</script>
</body>
</html>