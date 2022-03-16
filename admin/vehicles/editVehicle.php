<?php 
include "../../config.php";
include "../../image-creation.php";



$id = $_GET['vehicleId'];

//update car
if (isset($_POST['updateCar'])){
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

    $query = "UPDATE vehicles SET img='$newName',price='$price',year='$year',mileage='$mileage',engine_size='$engine_size',stock='$stock',detail='$detail',rego='$rego',category_id='$category_id',bodytype_id='$bodytype_id',fueltype_id='$fueltype_id',make_id='$make_id',model_id='$model_id',transmission_id='$transmission_id',color_id='$color_id',seats_id='$seats_id',safety_id='$safety_id',location_id='$location_id' WHERE vehicle_id = '$id' ";
    mysqli_query($link, $query);
  } else{
    $query = "UPDATE vehicles SET price='$price',year='$year',mileage='$mileage',engine_size='$engine_size',stock='$stock',detail='$detail',rego='$rego',category_id='$category_id',bodytype_id='$bodytype_id',fueltype_id='$fueltype_id',make_id='$make_id',model_id='$model_id',transmission_id='$transmission_id',color_id='$color_id',seats_id='$seats_id',safety_id='$safety_id',location_id='$location_id' WHERE vehicle_id = '$id' ";
    mysqli_query($link, $query);
  }
  



header("Location: index.php");
}

$queryID ="SELECT * FROM vehicles WHERE vehicle_id = '$id'";
$resultID = mysqli_query($link, $queryID);
$rowID = mysqli_fetch_array($resultID);
extract($rowID);
$category_id = $rowID['category_id'];
$bodytype_id = $rowID['bodytype_id'];
$fueltype_id = $rowID['fueltype_id'];
$make_id = $rowID['make_id'];
$model_id = $rowID['model_id'];
$transmission_id = $rowID['transmission_id'];
$color_id = $rowID['color_id'];
$seats_id = $rowID['seats_id'];
$safety_id = $rowID['safety_id'];
$location_id = $rowID['location_id'];

$query ="SELECT vehicles.img, vehicles.price, vehicles.year, vehicles.mileage, vehicles.engine_size, vehicles.stock, vehicles.detail, vehicles.rego, vehicle_category.category, vehicle_bodytype.bodytype, vehicle_fueltype.fueltype, vehicle_make.make, vehicle_model.model, vehicle_transmission.transmission, vehicle_color.color, vehicle_seats.seats, vehicle_safety.safety, vehicle_location.location FROM (((((((((( vehicles INNER JOIN vehicle_category ON vehicles.category_id = vehicle_category.category_id ) INNER JOIN vehicle_bodytype ON vehicles.bodytype_id = vehicle_bodytype.bodytype_id ) INNER JOIN vehicle_fueltype ON vehicles.fueltype_id = vehicle_fueltype.fueltype_id ) INNER JOIN vehicle_make ON vehicles.make_id = vehicle_make.make_id ) INNER JOIN vehicle_model ON vehicles.model_id = vehicle_model.model_id ) INNER JOIN vehicle_transmission ON vehicles.transmission_id = vehicle_transmission.transmission_id ) INNER JOIN vehicle_color ON vehicles.color_id = vehicle_color.color_id ) INNER JOIN vehicle_seats ON vehicles.seats_id = vehicle_seats.seats_id ) INNER JOIN vehicle_safety ON vehicles.safety_id = vehicle_safety.safety_id ) INNER JOIN vehicle_location ON vehicles.location_id = vehicle_location.location_id ) WHERE vehicle_id = '$id' ";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
$year = $row['year'];
$make = $row['make'];
$model = $row['model'];
$img = $row['img'];
$location = $row['location'];
$stock = $row['stock'];
$category = $row['category'];
$mileage = $row['mileage'];
$rego = $row['rego'];
$bodytype = $row['bodytype'];
$seats = $row['seats'];
$transmission = $row['transmission'];
$fueltype = $row['fueltype'];
$color = $row['color'];
$safety = $row['safety'];
$detail = $row['detail'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland/Edit vehicle</title>
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
                 <li class="breadcrumb-item active" aria-current="page">Edit Vehicle</li>
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
                 <a data-toggle="collapse" href="#collapseVehicle" href="addVehicle.php" role="button" onclick="arrowChange2()" aria-expanded="false" aria-controls="collapseVehicle" >
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
                        <h4>Edit Vehicle</h4>
                     </div>
                        
                 </div>
                 <hr>
                 <br>

                 <form method="POST" enctype="multipart/form-data" >

                    <div class="row">
                      <div class="form-group col-10"> 
                        <select id="make" name="make" class="form-control">
                        <option value="<?php echo $make_id; ?>"><?php echo $make; ?></option>
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
                      
                    </div>
                    <br> 

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="model" id="model">
                        <option value="<?php echo $model_id; ?>"><?php echo $model; ?></option>
                        </select>  
                      </div>
                      
                    </div>
                    <br>
                    

                    <div class="row">                      
                      <div class="form-group col-10">
                        <select class="form-control" name="color" id="color">
                        <option value="<?php echo $color_id; ?>"><?php echo $color; ?></option>
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
                      
                    </div>
                    <br>

                    <div class="row">
                      <p class="col-5">Please Select Category:</p>
                      <?php 
                          $queryCategory = "SELECT * FROM vehicle_category";
                          $resultCategory = mysqli_query($link, $queryCategory);
                          while($rowCategory = mysqli_fetch_array($resultCategory)){
                            extract($rowCategory);
                            $categoryID = $rowCategory['category_id'];
                            $queryID ="SELECT * FROM vehicles WHERE vehicle_id = '$id'";
                            $resultID = mysqli_query($link, $queryID);
                            $rowID = mysqli_fetch_array($resultID);
                            extract($rowID);
                            $category_id = $rowID['category_id'];
                          ?>
                      <div class="form-check form-check-inline form-group col-2 ">
                        <input class="form-check-input" type="radio" name="category" id="category<?php echo $categoryID; ?>" value="<?php echo $categoryID; ?>" <?php if($categoryID == $category_id) echo 'checked'?>>
                        <label class="form-check-label" for="category<?php echo $categoryID; ?>"><?php echo $category; ?></label>
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
                          $transmissionID = $rowTransmission['transmission_id'];
                          $queryID ="SELECT * FROM vehicles WHERE vehicle_id = '$id'";
                          $resultID = mysqli_query($link, $queryID);
                          $rowID = mysqli_fetch_array($resultID);
                          extract($rowID);
                          $transmission_id = $rowID['transmission_id'];
                        
                          ?>
                      <div class="form-check form-check-inline form-group col-2 ">
                        <input class="form-check-input" type="radio" name="transmission" id="transmission<?php echo $transmissionID; ?>" value="<?php echo $transmissionID; ?>"  <?php if($transmissionID ==  $transmission_id) echo 'checked';?>>
                        <label class="form-check-label" for="transmission<?php echo $transmissionID; ?>"><?php echo $transmission; ?></label>
                      </div>
                      <?php  } ?>
                      
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="bodytype" id="bodytype">
                        <option value="<?php echo $bodytype_id; ?>"><?php echo $bodytype; ?></option>
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
                        <option value="<?php echo $seats_id; ?>"><?php echo $seats; ?></option>
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
                        <option value="<?php echo $fueltype_id; ?>"><?php echo $fueltype; ?></option>
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
                        <option value="<?php echo $safety_id; ?>"><?php echo $safety; ?></option>
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
                        <input type="text" class="form-control" id="price" name="price" placeholder="Please Mark The Price" value="<?php echo $price;  ?>" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="year" name="year" placeholder="Please Mark The Year" value="<?php echo $year;  ?>" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="Please Mark The Mileage" value="<?php echo $mileage;  ?>" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="engine_size" name="engine_size" placeholder="Please Mark The Engine Size" value="<?php echo $engine_size;  ?>">
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="rego" name="rego" placeholder="Please Mark The Rego(if available)" value="<?php echo $rego;  ?>" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Please Mark The Stock" value="<?php echo $stock;  ?>" >
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <select class="form-control" name="location" id="location">
                        <option value="<?php echo $location_id; ?>"><?php echo $location; ?></option>
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
                        <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="Please put the vehicle detail here..."><?php echo $detail;  ?></textarea>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-10">
                        <label for="img">Update Vehicle Photos</label>
                        <input type="file" class="form-control-file" id="img" name="img">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <img class="img-fluid" src="../vehicles/uploads/<?php echo $img; ?>" width="150">
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group col-3">
                        <button type="submit" class="btn"  name="updateCar" style="background-color: #2B6777;color:white;">Update Vehicle</button>
                      </div>
                    </div>
                      
                    

                    




                 </form>
                 

             </div>



         </div>


      </div>
  </section>


</body>
</html>