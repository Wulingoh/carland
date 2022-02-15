<?php 
include "../../config.php";
include "../../library/image-creation.php";







$id = $_GET['carID'];




if (isset($_POST['editCar'])){
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

    $query = "UPDATE cars SET make_ID = '$carMake', model_ID = '$carModel', color_ID = '$carColor', type_ID = '$carType', fuel_ID = '$carFuel', safe_ID = '$carSafe', car_Year = '$carYear', car_Price = '$carPrice', car_Detail = '$carDetail', car_Img = '$newName' WHERE car_ID = '$id' ";
    mysqli_query($link, $query);
    
  } else{
    $query = "UPDATE cars SET make_ID = '$carMake', model_ID = '$carModel', color_ID = '$carColor', type_ID = '$carType', fuel_ID = '$carFuel', safe_ID = '$carSafe', car_Year = '$carYear', car_Price = '$carPrice', car_Detail = '$carDetail' WHERE car_ID = '$id' ";
    mysqli_query($link, $query);
  } // else statement means if image does not change, still keep the original one when update car info.
    // Without it, admin has to upload/change image every single time when update.
  

header("Location: carIndex.php");

}

$query = "SELECT * FROM cars WHERE car_ID = '$id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
$year = $row['car_Year'];
$price = $row['car_Price'];
$detail = $row['car_Detail'];
$img = $row['car_Img'];
$makeID = $row['make_ID'];
$modelID = $row['model_ID'];
$colorID = $row['color_ID'];
$typeID = $row['type_ID'];
$fuelID = $row['fuel_ID'];
$safeID = $row['safe_ID'];

$sqlMake = "SELECT * FROM carmake WHERE make_ID = '$makeID'";
$resultMake = mysqli_query($link, $sqlMake);
$rowMake = mysqli_fetch_array($resultMake);
extract($rowMake);
$make = $rowMake['car_Make'];

$sqlModel = "SELECT * FROM carmodel WHERE model_ID = '$modelID'";
$resultModel = mysqli_query($link, $sqlModel);
$rowModel = mysqli_fetch_array($resultModel);
extract($rowModel);
$model = $rowModel['car_Model'];

$sqlColor = "SELECT * FROM carcolor WHERE color_ID = '$colorID'";
$resultColor = mysqli_query($link, $sqlColor);
$rowColor = mysqli_fetch_array($resultColor);
extract($rowColor);
$color = $rowColor['car_Color'];

$sqlType = "SELECT * FROM cartype WHERE type_ID = '$typeID'";
$resultType = mysqli_query($link, $sqlType);
$rowType = mysqli_fetch_array($resultType);
extract($rowType);
$type = $rowType['car_Type'];

$sqlFuel = "SELECT * FROM carfuel WHERE fuel_ID = '$fuelID'";
$resultFuel = mysqli_query($link, $sqlFuel);
$rowFuel = mysqli_fetch_array($resultFuel);
extract($rowFuel);
$fuel = $rowFuel['car_Fuel'];

$sqlSafe = "SELECT * FROM carsafe WHERE safe_ID = '$safeID'";
$resultSafe = mysqli_query($link, $sqlSafe);
$rowSafe = mysqli_fetch_array($resultSafe);
extract($rowSafe);
$safe = $rowSafe['car_Safe'];








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
         <h2 style="color:cadetblue;">Edit a car</h2>
       </div>
     </div>
     <br>
     <form method="POST" enctype="multipart/form-data"  >
       
       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carMake" id="carMake"  aria-label="Floating label select example">
              
             <option value="<?php echo $makeID; ?>"><?php echo $make; ?></option>
             
              <?php
              
              $queryMake = "SELECT * FROM carmake ";
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
    
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carModel" id="carModel"  aria-label="Floating label select example">
             <option value="<?php echo $modelID; ?>"><?php echo $model; ?></option>
          
             </select>
             <label for="carModel">Choose a car Model</label>
           </div>
         </div>
      
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carColor" id="carColor"  aria-label="Floating label select example">
             <option value="<?php echo $colorID; ?>"><?php echo $color; ?></option>
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
       
       </div>
       <br>

       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <div class="form-floating">
             <select class="form-select" name="carType" id="carType"  aria-label="Floating label select example">
             <option value="<?php echo $typeID; ?>"><?php echo $type; ?></option>
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
             <option value="<?php echo $fuelID; ?>"><?php echo $fuel; ?></option>
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
             <option value="<?php echo $safeID; ?>"><?php echo $safe; ?></option>
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
             <input type="year" class="form-control" name="carYear" placeholder="year" value="<?php echo $year;  ?>">
             <label for="carYear">Mark the Manufactory Year</label>
             
           </div>
        </div>
       </div>
       <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           <div class="form-floating">
             <input type="price" class="form-control" name="carPrice" placeholder="price" value="<?php echo $price;  ?>">
             <label for="carPrice">Mark the Price</label>
             
           </div>
        </div>
      </div>
      <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           
             
             <label for="carDetail">Add car details</label>
             <textarea name="carDetail" class="form-control" id="carDetail" rows="6" ><?php echo $detail;  ?></textarea>
             
           
        </div>
      </div>
      <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           
             
             <label for="carImg" class="form-label">Add car Images</label>
             <input type="file" name="carImg" class="form-control" accept="image/jpeg, image/png" >
             
           
        </div>
      </div>
      <br>
      <div class="row justify-content-md-center">
        <div class="col col-lg-7">
           
             
            <img src="../cars/uploads/<?php echo $img;?>" width="200"  />
             
           
        </div>
      </div>
      <br>








       <div class="row justify-content-md-center">
         <div class="col col-lg-7">
           <button type="submit" class="btn" name="editCar" style="background: cadetblue;color:white;">Update</button>

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