<?php 
include "../../config.php";
include "../../image-creation.php";



//add make
if(isset($_POST['addMake'])){
  $make = mysqli_real_escape_string($link, $_POST['newMake']);
  $query = "INSERT INTO vehicle_make (make) VALUES ('$make') ";
  mysqli_query($link, $query);
}

//add model
if(isset($_POST['addModel'])){
  $model = mysqli_real_escape_string($link, $_POST['newModel']);
  $make_id = mysqli_real_escape_string($link, $_POST['make']);
  $query = "INSERT INTO vehicle_model (model, make_id) VALUES ('$model','$make_id')";
  mysqli_query($link, $query);
}

//add color
if(isset($_POST['addColor'])){
  $color = mysqli_real_escape_string($link, $_POST['newColor']);
  $query = "INSERT INTO vehicle_color (color) VALUES ('$color')";
  mysqli_query($link,$query);
}

//add car
if (isset($_POST['addCar'])){
  $make_id = mysqli_real_escape_string($link, $_POST['make']); 
  $model_id = mysqli_real_escape_string($link, $_POST['model']); 
  $color_id = mysqli_real_escape_string($link, $_POST['color']); 
  $category_id = mysqli_real_escape_string($link, $_POST['category']);
  $transmission_id = mysqli_real_escape_string($link, $_POST['transmission']);  
  $bodytype_id = mysqli_real_escape_string($link, $_POST['bodytype']); 
  $seats_id = mysqli_real_escape_string($link, $_POST['seats']);
  $fueltype_id = mysqli_real_escape_string($link, $_POST['fueltype']);
  $safety_id = mysqli_real_escape_string($link, $_POST['safety']);
  $price = mysqli_real_escape_string($link, $_POST['price']); 
  $year = mysqli_real_escape_string($link, $_POST['year']);
  $mileage = mysqli_real_escape_string($link, $_POST['mileage']);
  $engine_size = mysqli_real_escape_string($link, $_POST['engine_size']);
  $rego = mysqli_real_escape_string($link, $_POST['rego']);
  $stock = mysqli_real_escape_string($link, $_POST['stock']);
  $location_id = mysqli_real_escape_string($link, $_POST['location']);
  $detail = mysqli_real_escape_string($link, $_POST['detail']);
 
  
  

  if ( $_FILES['img']['tmp_name'] != "") {
    $imgName = $_FILES['img']['name'];
    $ext = strrchr($imgName, "."); 
    $newName = md5(rand()*time()).$ext;
    $imgPath = CAR_IMG . $newName;
    $tmpName = $_FILES['img']['tmp_name'];
    createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
    
  } else{
    $newName = "";
  }
  


$query = "INSERT INTO vehicles (make_id, model_id, color_id, category_id,transmission_id, bodytype_id, seats_id,fueltype_id, safety_id, price, year, mileage, engine_size, rego, stock, location_id, detail, img) VALUES('$make_id','$model_id','$color_id','$category_id','$transmission_id','$bodytype_id','$seats_id','$fueltype_id','$safety_id','$price','$year','$mileage','$engine_size','$rego','$stock', '$location_id','$detail','$newName')";
mysqli_query($link, $query);
header("Location: index.php");

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland/Add vehicle</title>
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <script src="../../js/jquery-1.10.1.min.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../icon/bootstrap-icons.css" rel="stylesheet">
        

<script>        
function arrowChange1(){
   if(document.getElementById("arrowDown1").className == "bi bi-caret-down-fill"){
     document.getElementById("arrowDown1").className = "bi bi-caret-up-fill";
     
     
   } else {
     document.getElementById("arrowDown1").className = "bi bi-caret-down-fill";
    
    
   }

 }
function arrowChange2(){
   if(document.getElementById("arrowDown2").className == "bi bi-caret-down-fill"){
     document.getElementById("arrowDown2").className = "bi bi-caret-up-fill";
     
     
   } else {
     document.getElementById("arrowDown2").className = "bi bi-caret-down-fill";
    
    
   }

 }



$(document).ready(function(){
  $('#make').on('change',function(){
    var makeID = $(this).val();
    if (makeID){
      $.ajax({
        type: 'POST',
        url: 'displayModel.php',
        data: 'make_id='+makeID,
        success:function(html){
          $('#model').html(html);

        }

      });
    }else{
      $('#model').html('<option value="">Select make first</option>');
    }
  
  });
});

</script>

</head>

<body>
  <section style="background-color: white;">
      <div class="container" >
         <div class="row">
             <div class="col">
                <br>
                <img src="../../images/logo4x.png" class="img-fluid float-left" style="width: 200px;">   
             </div>
             <div class="col" style="text-align: right;">
                <br><br>
                <p>Hi&nbsp;,<b><?php echo  $_SESSION['fullname'] ; ?></b>,&nbsp;welcom to the admin system!&nbsp;&nbsp;<a href="../../logout.php">[Log Out]</a></p>
             </div>
         </div>
         <br>
         <div class="row">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><span style="font-size: 20px;color:#2B6777;"><i class="bi bi-house-door"></i>Home</span></li>
                 <li class="breadcrumb-item" ><a href="index.php">Vehicle Management</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Add new vehicle</li>
              </ol>
             </nav>
         </div>
        
         <div class="row">
             <div class="col-lg-3" >
                 <div class="row">
                     <img src="../../images/admin-dashboardBar.png" class="img-fluid"/>
                 </div>
                 <br>

                <div class="row justify-content-center  "> 
                 <div class="col">
                 <a href="../users/index.php" style="text-decoration: none;color:black">
                 <h5 >User Management</h5> 
                 </a>                 
                 </div>
                 <div class="col-2">
                 <a data-toggle="collapse" href="#collapseUser" role="button" onclick="arrowChange1()" aria-expanded="false" aria-controls="collapseUser" >
                 <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown1" class="bi bi-caret-down-fill"></i></span>  
                 </a>
                 </div>
                </div>
                 <div class="collapse" id="collapseUser">
                    <h6 style="text-align: right;" >
                       <a href="../users/addUser.php" style="text-decoration: none;color:black;"> Add new user</a>
                    <h6>
                 </div>
                 <hr>
                 
                <div class="row">
                 
                 <div class="col"> 
                  <a href="index.php" style="text-decoration: none;color:black">
                   <h5 ><b>Vehicle Management</b></h5> 
                  </a>
                 </div>
                 <div class="col-2">
                 <a data-toggle="collapse" href="#collapseVehicle" href="addCar.php" role="button" onclick="arrowChange2()" aria-expanded="false" aria-controls="collapseVehicle" >
                  <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown2" class="bi bi-caret-down-fill"></i></span>  
                 </a>
                 
                 </div>
                </div>
                 <div class="collapse" id="collapseVehicle">
                    <h6 style="text-align: right;" >
                       <a href="addVehicle.php" style="text-decoration: none;color:black;">Add new vehicle </a>
                    <h6>
                </div>
                 <hr>

             </div>
             <div class="col" style="padding-left: 50px;border-left:1.5px solid #E2E8F0;">
                 <div class="row">
                     <div class="col">
                        <h4>Add new vehicle</h4>
                     </div>
                        
                 </div>
                 <hr>
                 <br>

                 <form method="POST" enctype="multipart/form-data" >

                    <div class="row">
                      <div class="form-group col-5"> 
                        <select id="make" name="make" class="form-control">
                          <option value="">Please Select Make</option>
                          <?php 
                          $queryMake = "SELECT * FROM vehicle_make";
                          $resultMake = mysqli_query($link, $queryMake);
                          while($rowMake = mysqli_fetch_array($resultMake)){
                            extract($rowMake);
                          ?>
                          <option value="<?php echo $make_id; ?>"><?php echo $make; ?></option>
                          <?php 
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-5">                
                        <input type="text" class="form-control" id="newMake" name="newMake" placeholder="Add a new make" >
                      </div>
                      <div class="col-lg-2">
                        <button type="submit" class="btn" name="addMake" style="background-color: #2B6777;color:white;">Add</button>
                      </div>
                    </div>
                    <br> 

                    <div class="row">
                      <div class="form-group col-5">
                        <select class="form-control" name="model" id="model">
                          <option value="">Please Select Make First!</option>
                        </select>  
                      </div>
                      <div class="form-group col-5">                
                        <input type="text" class="form-control" id="newModel" name="newModel" placeholder="Add a new model" >
                        <p style="font-size: 10px; color: gray;">***Please Select or Add a Make First!***</p>
                      </div>
                      <div class="col-lg-2">
                        <button type="submit" class="btn" name="addModel" style="background-color: #2B6777;color:white;">Add</button>
                      </div>
                    </div>
                    

                    <div class="row">                      
                      <div class="form-group col-5">
                        <select class="form-control" name="color" id="color">
                          <option value="">Please Select Color</option>
                          <?php 
                          $queryColor = "SELECT * FROM vehicle_color";
                          $resultColor = mysqli_query($link, $queryColor);
                          while($rowColor = mysqli_fetch_array($resultColor)){
                            extract($rowColor);
                          ?>
                          <option value="<?php echo $color_id; ?>"><?php echo $color; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-5">                
                        <input type="text" class="form-control" id="newColor" name="newColor" placeholder="Add a new color" >
                      </div>
                      <div class="col-lg-2">
                        <button type="submit" class="btn" name="addColor" style="background-color: #2B6777;color:white;">Add</button>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <p class="col-5">Please Select Category:</p>
                      <?php 
                          $queryCategory = "SELECT * FROM vehicle_category";
                          $resultCategory = mysqli_query($link, $queryCategory);
                          while($rowCategory = mysqli_fetch_array($resultCategory)){
                            extract($rowCategory);
                          ?>
                      <div class="form-check form-check-inline form-group col-2 ">
                        <input class="form-check-input" type="radio" name="category" id="category<?php echo $category_id; ?>" value="<?php echo $category_id; ?>">
                        <label class="form-check-label" for="category<?php echo $category_id; ?>"><?php echo $category; ?></label>
                      </div>
                      <?php  } ?>
                      
                    </div>
                    <br>

                    <div class="row">
                      <p class="col-5">Please Select Transmission:</p>
                      <?php 
                          $queryTransmission = "SELECT * FROM vehicle_transmission";
                          $resultTransmission = mysqli_query($link, $queryTransmission);
                          while($rowTransmission = mysqli_fetch_array($resultTransmission)){
                            extract($rowTransmission);
                          ?>
                      <div class="form-check form-check-inline form-group col-2 ">
                        <input class="form-check-input" type="radio" name="transmission" id="transmission<?php echo $transmission_id; ?>" value="<?php echo $transmission_id; ?>">
                        <label class="form-check-label" for="transmission<?php echo $transmission_id; ?>"><?php echo $transmission; ?></label>
                      </div>
                      <?php  } ?>
                      
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="bodytype" id="bodytype">
                          <option value="">Please Select Body Type</option>
                          <?php 
                          $queryBodytype = "SELECT * FROM vehicle_bodytype";
                          $resultBodytype = mysqli_query($link, $queryBodytype);
                          while($rowBodytype = mysqli_fetch_array($resultBodytype)){
                            extract($rowBodytype);
                          ?>
                          <option value="<?php echo $bodytype_id; ?>"><?php echo $bodytype; ?></option>
                          <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="seats" id="seats">
                          <option value="">Please Select Amount of Seats</option>
                          <?php 
                          $querySeats = "SELECT * FROM vehicle_seats";
                          $resultSeats = mysqli_query($link, $querySeats);
                          while($rowSeats = mysqli_fetch_array($resultSeats)){
                            extract($rowSeats);
                          ?>
                          <option value="<?php echo $seats_id; ?>"><?php echo $seats; ?></option>
                          <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="fueltype" id="fueltype">
                          <option value="">Please Select Fuel Type</option>
                          <?php 
                          $queryFueltype = "SELECT * FROM vehicle_fueltype";
                          $resultFueltype = mysqli_query($link, $queryFueltype);
                          while($rowFueltype = mysqli_fetch_array($resultFueltype)){
                            extract($rowFueltype);
                          ?>
                          <option value="<?php echo $fueltype_id; ?>"><?php echo $fueltype; ?></option>
                          <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="safety" id="safety">
                          <option value="">Please Select Safety Rating</option>
                          <?php 
                          $querySafety = "SELECT * FROM vehicle_safety";
                          $resultSafety = mysqli_query($link, $querySafety);
                          while($rowSafety = mysqli_fetch_array($resultSafety)){
                            extract($rowSafety);
                          ?>
                          <option value="<?php echo $safety_id; ?>"><?php echo $safety; ?></option>
                          <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Please Mark The Price" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="year" name="year" placeholder="Please Mark The Year" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="Please Mark The Mileage" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="engine_size" name="engine_size" placeholder="Please Mark The Engine Size" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="rego" name="rego" placeholder="Please Mark The Rego(if available)" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Please Mark The Stock" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="location" id="location">
                          <option value="">Please Select Location</option>
                          <?php 
                          $queryLocation = "SELECT * FROM vehicle_location";
                          $resultLocation = mysqli_query($link, $queryLocation);
                          while($rowLocation = mysqli_fetch_array($resultLocation)){
                            extract($rowLocation);
                          ?>
                          <option value="<?php echo $location_id; ?>"><?php echo $location; ?></option>
                          <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="Please put the vehicle detail here..."></textarea>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <label for="img">Upload Vehicle Photos</label>
                        <input type="file" class="form-control-file" id="img" name="img">
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-3">
                        <button type="submit" class="btn"  name="addCar" style="background-color: #2B6777;color:white;">Add Vehicle</button>
                      </div>
                    </div>
                      
                    

                    




                 </form>
                 

             </div>



         </div>


      </div>
  </section>


</body>
</html>