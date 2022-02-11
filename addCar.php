<?php 
include "../../config.php";
include "../../library/image-creation.php";

if(isset($_POST['addMake'])){
$make = mysqli_real_escape_string($link, $_POST['newMake'] );

$query = "INSERT INTO carmake (car_Make) VALUES ('$make')";
mysqli_query($link, $query);
}

//relationship between make and model//

if(isset($_POST['addModel'])){
  $model = mysqli_real_escape_string($link, $_POST['newModel'] );
  $makeID =  mysqli_real_escape_string($link, $_POST['carMake'] );//'"value" is the data which has been posted to the server when using "option" tag, in this case, I can get make_ID straight away'
  
  $query = "INSERT INTO carmodel (car_Model, make_ID) VALUES ('$model','$makeID')";
  mysqli_query($link, $query);
  }



if(isset($_POST['addColor'])){
  $color = mysqli_real_escape_string($link, $_POST['newColor'] );
  
  $query = "INSERT INTO carcolor (car_Color) VALUES ('$color')";
  mysqli_query($link, $query);
}



if (isset($_POST['addCar'])){
  $carMake = mysqli_real_escape_string($link, $_POST['carMake']); 
  $carModel = mysqli_real_escape_string($link, $_POST['carModel']); 
  $carColor = mysqli_real_escape_string($link, $_POST['carColor']); 
  $carType = mysqli_real_escape_string($link, $_POST['carType']); 
  $carFuel = mysqli_real_escape_string($link, $_POST['carFuel']);
  $carSafe = mysqli_real_escape_string($link, $_POST['carSafe']);
  $carDetail = mysqli_real_escape_string($link, $_POST['carDetail']); 
  $carYear = mysqli_real_escape_string($link, $_POST['carYear']);
  $carPrice = mysqli_real_escape_string($link, $_POST['carPrice']);

  if ( $_FILES['carImg']['tmp_name'] != "") {
    $imgName = $_FILES['carImg']['name'];
    $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
    $newName = md5(rand()*time()).$ext;
    $imgPath = CAR_IMG . $newName;
    $tmpName = $_FILES['carImg']['tmp_name'];
    createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
    
  } else{
    $newName = "";
  }
  


$query = "INSERT INTO cars (make_ID, model_ID, color_ID, type_ID, fuel_ID, safe_ID, car_Year, car_Price, car_Detail, car_Img) VALUES('$carMake','$carModel','$carColor','$carType','$carFuel','$carSafe','$carYear','$carPrice','$carDetail','$newName')";
mysqli_query($link, $query);
header("Location: carIndex.php");
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
  <title>Manage Cars</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="../admin.css">
  <link href="css/index.css" rel="stylesheet">



</head>

<body>




<div id="adminHeader">
    <div class="row">
        <div class="col col-lg-12" style="height: 100px;background:cadetblue">
             <img src="../../image/logo.png" style="height: 100px; float:left; padding-left: 50px;">
             <?php
             echo"<span style='float:right;color:white;font-size:30px;padding-right: 50px; padding-top:50px;'>Hi, ".$_SESSION['user_Name']."!"."</span>";
             ?>

        </div>
    </div>
</div>
<br>
<br>

<div class="adminSection">

    <div class="row justify-content-md-center">
        <div class="col" style="text-align: center;">
          <i class="fas fa-car menuIcon"></i>
          <a href="../cars/carIndex.php"><h3 style="padding-top: 20px;font-size:15px;">Admin Cars</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-users menuIcon"></i>
        <a href="../users/usersIndex.php"><h3 style="padding-top: 20px;font-size:15px;">Admin Users</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-comments menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Reviews</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-coins menuIcon" ></i>
          <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Orders</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-hand-holding-usd menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Ivoices</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-user-tie menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Staff</h3></a>    
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div >
     <div class="row ">
       <div class="col" style="text-align: center;">
         <h2 style="color:cadetblue;">Add a new car</h2>
       </div>
     </div>
     <br>
     <form method="POST" enctype="multipart/form-data"  >
       
       <div class="row justify-content-md-center">
         <div class="col col-lg-3">
           <div class="form-floating">
             <select class="form-select" name="carMake" id="carMake"  aria-label="Floating label select example">
              
             <option value="">Please Select</option>
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
             <input type="make" class="form-control" name="newMake" placeholder="make">
             <label for="newMake">Add a car make</label>
             
           </div>
         </div>
         <div class="col col-lg-1">
           <button type="submit" name="addMake"  style="background-color: white;border: none;">
           <span style="font-size: 40px;color:cadetblue;"><i class="fas fa-plus-circle"></i></span>
           </button>
         </div>
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-3">
           <div class="form-floating">
             <select class="form-select" name="carModel" id="carModel"  aria-label="Floating label select example">
             <option value="">Please Select Car Make First!</option>
          
             </select>
             <label for="carModel">Choose a car Model</label>
           </div>
         </div>
         <div class="col col-lg-3">
           <div class="form-floating">
             <input type="model" class="form-control" name="newModel" placeholder="model">
             <label for="newModel">Add a car model</label> 
             <p style="font-size: 10px; color: gray;">***Please Select or Add a Car Make First!***</p>
           </div>
         </div>
         <div class="col col-lg-1">
           <button type="submit" name="addModel"  style="background-color: white;border: none;">
           <span style="font-size: 40px;color:cadetblue;"><i class="fas fa-plus-circle"></i></span>
           </button>
         </div>
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-3">
           <div class="form-floating">
             <select class="form-select" name="carColor" id="carColor"  aria-label="Floating label select example">
              <?php
              $query = "SELECT * FROM carcolor";
              $result = mysqli_query($link, $query);
              while($row = mysqli_fetch_array($result)){
                extract($row);
              ?>
               
               <option value="<?php echo $color_ID; ?>"><?php echo $car_Color; ?></option>
              <?php
              } 
              ?>
              
             </select>
             <label for="carColor">Choose a car Color</label>
           </div>
         </div>
         <div class="col col-lg-3">
           <div class="form-floating">
             <input type="text" class="form-control" name="newColor" placeholder="color">
             <label for="newColor">Add a car color</label>
             
           </div>
         </div>
         <div class="col col-lg-1">
           <button type="submit" name="addColor"  style="background-color: white;border: none;">
           <span style="font-size: 40px;color:cadetblue;"><i class="fas fa-plus-circle"></i></span>
           </button>
         </div>
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carType" id="carType"  aria-label="Floating label select example">
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
             <label for="carType">Choose a car Body Type</label>
           </div>
         </div>
         
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carFuel" id="carFuel"  aria-label="Floating label select example">
              <?php
              $query = "SELECT * FROM carfuel";
              $result = mysqli_query($link, $query);
              while($row = mysqli_fetch_array($result)){
                extract($row);
              ?>
               
               <option value="<?php echo $fuel_ID; ?>"><?php echo $car_Fuel; ?></option>
              <?php
              } 
              ?>
              
             </select>
             <label for="carFuel">Choose a car Fuel Type</label>
           </div>
         </div>
         
       </div>
       <br> 

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carSafe" id="carSafe"  aria-label="Floating label select example">
              <?php
              $query = "SELECT * FROM carsafe";
              $result = mysqli_query($link, $query);
              while($row = mysqli_fetch_array($result)){
                extract($row);
              ?>
               
               <option value="<?php echo $safe_ID; ?>"><?php echo $car_Safe; ?></option>
              <?php
              } 
              ?>
              
             </select>
             <label for="carModel">Choose a car Safty Rating</label>
           </div>
         </div>
         
       </div>
       <br>
       <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           <div class="form-floating">
             <input type="year" class="form-control" name="carYear" placeholder="year">
             <label for="carYear">Mark the Manufactory Year</label>
             
           </div>
        </div>
       </div>
       <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           <div class="form-floating">
             <input type="price" class="form-control" name="carPrice" placeholder="price">
             <label for="carPrice">Mark the Price</label>
             
           </div>
        </div>
      </div>
      <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           
             
             <label for="carDetail">Add car details</label>
             <textarea name="carDetail" class="form-control" id="carDetail" rows="6"></textarea>
             
           
        </div>
      </div>
      <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           
             
             <label for="carImg" class="form-label">Add car Images</label>
             <input type="file" name="carImg" class="form-control" accept="image/jpeg, image/jpg, image/png">
             
           
        </div>
      </div>
      <br>








       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <button type="submit" class="btn" name="addCar" style="background: cadetblue;color:white;">Add Car</button>

         </div>

       </div>


     </form>
      

  </div>    
</div>

<br>
<br>
<footer>
<div class="row">
        <div class="col col-lg-12" style="height: 100px;background:cadetblue">
            
             <?php
             echo"<span style='float:right;color:white;font-size:30px;padding-right: 50px; padding-top:20px;'><a href='../../logout.php' style='color:white;'>[Log Out]</a></span>";
             ?>

        </div>
    </div>

</footer>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
  $('#carMake').on('change',function(){
    var makeID = $(this).val();
    if (makeID){
      $.ajax({
        type: 'POST',
        url: 'displayModel.php',
        data: 'make_ID='+makeID,
        success:function(html){
          $('#carModel').html(html);

        }

      });
    }else{
      $('#carModel').html('<option value="">Select make first</option>');
    }
  
  });
});
</script>
</body>
</html>