<?php 
include "config.php";
include "library/image-creation.php";











?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>View all the vehicles</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="css/index.css" rel="stylesheet">
  

  
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
    <div class="col-md-auto">
      <h2>Find your dream car</h2>     
    </div>  
  </div> 
  <br>
  <div class="row">
     <div class="col-md-auto">
         <img src="image/carbanner.jpg" class="img-fluid mx-auto d-block" style="width:100%;"/>

    </div>
  </div>
  <br>
  <br>
  <div class="row">
      <div class="col col-lg-3">
          <div class="row">
              <h4>Search by filter:</h4>
          </div>
          <br>
          
          <form method="GET" enctype="multipart/form-data"  >
             <div class="row">
                <label for="filterType" class="form-lable"><b>Body Type:</b><br></label>
                <select class="form-select" name="filterType" id="filterType"  aria-label="Default select example">
                <option value="">All body type</option>
              <?php
              $query = "SELECT * FROM cartype";
              $result = mysqli_query($link, $query);
              while($row = mysqli_fetch_array($result)){
                extract($row);
              ?>
               
               <option value="<?php echo $type_ID; ?>"><?php echo $car_Type; ?></option>
              <?php
              } 
              ?>
                </select>
             </div>
             <br>

             <div class="row">
                <label for="filterMake" class="form-lable"><b>Car Make:</b><br></label> 
                <select class="form-select" name="filterMake" id="filterMake"  aria-label="Default select example">
                <option value="">All make</option>
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
             </div>
             <br>

             <div class="row">
                <label for="filterModel" class="form-lable"><b>Car Model:</b><br></label> 
                <select class="form-select" name="filterModel" id="filterModel"  aria-label="Default select example">
                <option value="">Please Select Car Make First!</option>
                </select>
             </div>
             <br>

             <div class="row">
                <label for="filterPrice" class="form-lable"><b>Price Range:</b><br></label> 
                <div class="col">               
                <select class="form-select" name="filterMin" id="filterMin"  aria-label="Default select example">
                <option value="" selected>Min Price</option>
                <option value="10000">$10,000</option>
                <option value="50000">$50,000</option>
                <option value="100000">$100,000</option>
                </select>
                </div>
                <div class="col">
                <select class="form-select" name="filterMax" id="filterMax"  aria-label="Default select example">
                <option value="" selected>Max Price</option>
                <option value="50000">$50,000</option>
                <option value="100000">$100,000</option>
                <option value="200000">$200,000</option>
                </select>
                </div>
            </div>
            <br>

            <div class="row">
              <button type="submit" class="btn" name="filterCar" style="background: red;color:white;">Search Car</button>

            </div>
            <br>
          </form>

          <div class="row">
              <h4>Browse:</h4>
          </div>
          

          <hr>
          <div class="row">
             <div class="dropdown">
                <h6  data-bs-toggle="collapse" role="button" data-bs-target="#hotDeal" aria-expanded="false" aria-controls="#hotDeal">
                Hot Deals
                <span style="color: red;font: size 20px; text-align:right;"><i class="fab fa-hotjar"></i></span>
                </h6>
                
                <ul class="collapse" id="hotDeal">
                    <li><a class="dropdown-item" href="#">Best Sellers</a></li>
                    <li><a class="dropdown-item" href="#">Special Offers</a></li>
                    <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                    
                </ul>
             </div>
          </div>
          <hr>

         
          <div class="row">
             <div class="dropdown">
                <h6  data-bs-toggle="collapse" role="button" data-bs-target="#fuel" aria-expanded="false" aria-controls="#fuel">
                Fuel Type
                <span style="color: red;font: size 20px; text-align:right;"><i class="fas fa-gas-pump"></i></span>
                </h6>
                <ul class="collapse" id="fuel">
                    <li><a class="dropdown-item" href="#">Petrol</a></li>
                    <li><a class="dropdown-item" href="#">Diesel</a></li>
                    <li><a class="dropdown-item" href="#">Electric</a></li>
                    <li><a class="dropdown-item" href="#">Hybrid</a></li>
           
                </ul>
             </div>
          </div>
          <hr>

          <div class="row">
             <div class="dropdown">
                <h6  data-bs-toggle="collapse" role="button" data-bs-target="#popularMake" aria-expanded="false" aria-controls="#popularMake">
                Popular Make
                <span style="color: red;font: size 20px; text-align:right;"><i class="fas fa-tools"></i></span>
                </h6>
                <ul class="collapse" id="popularMake">
                    <li><a class="dropdown-item" href="#">Toyota</a></li>
                    <li><a class="dropdown-item" href="#">Hyundai</a></li>
                    <li><a class="dropdown-item" href="#">Honda</a></li>
                    <li><a class="dropdown-item" href="#">Volkswagen</a></li>
           
                </ul>
             </div>
          </div>
          <hr>

          <div class="row">
             <div class="dropdown">
                <h6  data-bs-toggle="collapse"  role="button" data-bs-target="#popularModel" aria-expanded="false" aria-controls="#popularModel">
                Popular Model
                <span style="color: red;font: size 20px; text-align:right;"><i class="far fa-life-ring"></i></span>
                </h6>
                <ul class="collapse" id="popularModel">
                    <li><a class="dropdown-item" href="#">Highlander</a></li>
                    <li><a class="dropdown-item" href="#">Golf</a></li>
                    <li><a class="dropdown-item" href="#">Fit</a></li>
                    <li><a class="dropdown-item" href="#">Corolla</a></li>
           
                </ul>
             </div>
          </div>
          <hr>








      </div>


      <div class="col col-lg-9">
          <div class="row">
              <div class="col">
              <p>XXX Results</p>
              </div>
              <div class="col col-lg-3">
              <form name="sortCar" method="GET">

                 <label for="sortCar" class=" col-form-label"><b>Sort By :</b></label> 
                 
                 <select class="form-select" name="sortCar" id="sortCar"  aria-label="Default select example" onchange="document.forms['sortCar'].submit();">
                <option selected >Listing</option>
                <option value="2">Make</option>
                <option value="3">Price(lowest)</option>
                <option value="4">Price(highest)</option>
                <option value="5">Year</option>
                
                </select>
              </form>
              </div>
          </div>
          <br>
          <br>
          
            <?php 
            //search make&price
            if(isset($_GET['filterCar']) && $_GET['filterMin'] != '' && $_GET['filterMax'] != '' && $_GET['filterMake'] != '' ){
              $makeID = $_GET['filterMake'];
              $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
              $resultMake = mysqli_query($link, $sqlMake);
              $rowMake = mysqli_fetch_array($resultMake);
              extract($rowMake);
              $make = $rowMake['car_Make'];

              $minPrice = $_GET['filterMin'];
              $maxPrice = $_GET['filterMax'];
              
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price BETWEEN $minPrice AND $maxPrice && car_Make = '$make' ";
             
            }

             //search make&model
            else if (isset($_GET['filterCar']) && $_GET['filterMake'] != '' && $_GET['filterModel'] != '') {
              $makeID = $_GET['filterMake'];
              $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
              $resultMake = mysqli_query($link, $sqlMake);
              $rowMake = mysqli_fetch_array($resultMake);
              extract($rowMake);
              $make = $rowMake['car_Make'];

              $modelID = $_GET['filterModel'];
              $sqlModel = "SELECT * From carmodel WHERE model_ID = '$modelID'";
              $resultModel = mysqli_query($link, $sqlModel);
              $rowModel = mysqli_fetch_array($resultModel);
              extract($rowModel);
              $model = $rowModel['car_Model'];

              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Make = '$make' && car_Model = '$model'";
              


            }
            //search price range
           else if(isset($_GET['filterCar']) && $_GET['filterMin'] != '' && $_GET['filterMax'] != ''){
              $minPrice = $_GET['filterMin'];
              $maxPrice = $_GET['filterMax'];
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price BETWEEN $minPrice AND $maxPrice ";
             
            }
            //search min price
            else if(isset($_GET['filterCar']) && $_GET['filterMin'] != ''){
              $minPrice = $_GET['filterMin'];
              
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price > $minPrice ";
             
            }
           // search max price
            else if(isset($_GET['filterCar']) && $_GET['filterMax'] != ''){
              
              $maxPrice = $_GET['filterMax'];
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price < $maxPrice ";
             
            }
           
            //search type&make
              else if(isset($_GET['filterCar']) && $_GET['filterType'] != '' && $_GET['filterMake'] != ''){
                
                $typeID = $_GET['filterType'];
                $sqlType = "SELECT * From cartype WHERE type_ID = '$typeID'";
                $resultType = mysqli_query($link, $sqlType);
                $rowType = mysqli_fetch_array($resultType);
                extract($rowType);
                $type = $rowType['car_Type'];

                $makeID = $_GET['filterMake'];
                $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
                $resultMake = mysqli_query($link, $sqlMake);
                $rowMake = mysqli_fetch_array($resultMake);
                extract($rowMake);
                $make = $rowMake['car_Make'];

                $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE car_Type = '$type' && car_Make = '$make'";
  
                }
        
              //search type
              else if(isset($_GET['filterCar']) && $_GET['filterType'] != ''){
              $typeID = $_GET['filterType'];
              $sqlType = "SELECT * From cartype WHERE type_ID = '$typeID'";
              $resultType = mysqli_query($link, $sqlType);
              $rowType = mysqli_fetch_array($resultType);
              extract($rowType);
              $type = $rowType['car_Type'];
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE car_Type = '$type'";

              }
             //  search make

             else if(isset($_GET['filterCar'])  && $_GET['filterMake'] != ''){
              

              $makeID = $_GET['filterMake'];
              $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
              $resultMake = mysqli_query($link, $sqlMake);
              $rowMake = mysqli_fetch_array($resultMake);
              extract($rowMake);
              $make = $rowMake['car_Make'];
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Make = '$make'";
              }
            

         
         
              //search all
              else{  
                //sorting function from dorp list
              if(isset($_GET['sortCar'])&& $_GET['sortCar']== '2'){
                $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) ORDER BY car_Make ";
              } else if (isset($_GET['sortCar'])&& $_GET['sortCar']== '3'){
                $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) ORDER BY car_Price ASC  ";
              } else if (isset($_GET['sortCar'])&& $_GET['sortCar']== '4'){
                $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) ORDER BY car_Price DESC ";
              } else if (isset($_GET['sortCar'])&& $_GET['sortCar']== '5'){
                $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) ORDER BY car_Year ASC ";
              }
              
              else{
              $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) ";
              }
            }
              $result = mysqli_query($link, $sql);
              
              $num = mysqli_num_rows($result);
              
              while($row = mysqli_fetch_array($result)){
                
                $id = $row['car_ID'];
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
              
            ?>

            <div class="row">
               
               <div class="col">
               <div class="position-relative">
                <img src="admin/cars/uploads/<?php echo $img;?>" width="400"  class="img-fluid" />
               
               </div>
               </div>
               <div class="col">
                
                 <h4><b><?php echo $detail; ?></b></h4><br><br>
                 <div class="row">
                    <div class="col">
                      <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-tools"></i></span><?php echo $make; ?></p>
                      <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-car-side"></i></span><?php echo $type; ?></p>
                      <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-gas-pump"></i></span><?php echo $fuel; ?></p>
                      <p><span style="font-size: 15px;color:crimson;padding-right:20px;"><i class="fas fa-calendar-alt"></i></span><?php echo $year; ?></p>

                    </div>
                    <div class="col col-lg-4">
                      <br><br>
                      <h4 style="color: red;"><span style="font-size: 20px;color:crimson;"><i class="fas fa-tags"></i></span><b>$<?php echo number_format($price); ?></b></h4><br>
                      <button type="button" class="btn btn-danger"><span style="font-size: 15px;"><b><a href="carinfo.php?carID=<?php echo $id; ?>" style="color: white;text-decoration:none;">View More</a></b></span></button>

                    </div>

                 </div>
               </div>
            </div>
            <hr>
            <br>
            <br>

            



            <?php 
              }
            
            ?>




          








          
      <p><?php echo $num; ?> Results</p>
      </div>

  </div>










</div>







</section>















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>




$(document).ready(function(){
  $('#filterMake').on('change',function(){
    var makeID = $(this).val();
    if (makeID){
      $.ajax({
        type: 'POST',
        url: 'displayModel.php',
        data: 'make_ID='+makeID,
        success:function(html){
          $('#filterModel').html(html);

        }

      });
    }else{
      $('#filterModel').html('<option value="">Select make first</option>');
    }
  
  });
});
</script>
</body>
</html>