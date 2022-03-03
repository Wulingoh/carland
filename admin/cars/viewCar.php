<?php 
include "../../config.php";
include "../../image-creation.php";

$id = $_GET['carID'];
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
        <title>Carland/Vehicle Management/View Vehicles</title>
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
         </div>
         <br>
         <div class="row">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><span style="font-size: 20px;color:#2B6777;"><i class="bi bi-house-door"></i>Home</span></li>
                 <li class="breadcrumb-item" ><a href="carIndex.php">Vehicle Management</a></li>
                 <li class="breadcrumb-item active" aria-current="page">View Vehicle</li>
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
                 <a href="../users/userIndex.php" style="text-decoration: none;color:black">
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
                  <a href="carIndex.php" style="text-decoration: none;color:black">
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
                       <a href="addCar.php" style="text-decoration: none;color:black;">Add new vehicle </a>
                    <h6>
                </div>
                 <hr>

             </div>
             <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
                 <div class="row">
                     <div class="col">
                        <h4>View Vehicle Details</h4>
                     </div>         
                 </div>
                 <hr>
                 <div class="row">
                    <div class="col-5">
                    <h6><b><?php echo $year; ?>&nbsp;<?php echo $make; ?>&nbsp;<?php echo $model; ?></b></h6>
                    </div>
                    <div class="col">
                    <a href="../cars/editCar.php?carID=<?php echo $id; ?>"><i class="bi bi-pencil-fill"></i>&nbsp;&nbsp;Edit</a>
                    </div> 
                 </div>
                 <br>
                 
                 <div class="row">
                   <img class="img-fluid" src="../cars/uploads/<?php echo $img; ?>" width="300"/>
                 </div>
                 <br>
                 <div class="row">
                   <b>Location:</b>&nbsp; <?php echo $location ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Stock: </b>&nbsp;<?php echo $stock ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Category: </b>&nbsp;<?php echo $category ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Mileage:</b>&nbsp;<?php echo $mileage ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Rego:</b>&nbsp;<?php echo $rego ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Body Type:</b>&nbsp;<?php echo $bodytype ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Seats:</b>&nbsp;<?php echo $seats ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Transmission:</b>&nbsp;<?php echo $transmission ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Fuel Type:</b>&nbsp;<?php echo $fueltype ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Color:</b>&nbsp;<?php echo $color ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Safety Rating:</b>&nbsp;<?php echo $safety ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Detail:</b>&nbsp;<?php echo $detail ; ?>
                 </div>
                 <br>
                 <div class="row">
                   <b>Gallery:</b>
                 </div>
                 <br>
                 <div class="row">
                   <?php 
                   $queryGallery = "SELECT * FROM vehicle_gallery WHERE vehicle_id = '$id'";
                   $resultGallery = mysqli_query($link, $queryGallery);
                   while ($rowGallery = mysqli_fetch_array($resultGallery)){
                     extract($rowGallery);
                     $gallery_img = $rowGallery['gallery_img'];
                   
                   ?>
                   <div class="col-3">
                     <img class="img-fluid" src="../cars/uploads/<?php  echo $gallery_img; ?>" >
                   </div>
                   <br>
                   <?php } ?>
                 </div>
                 <br>

                 

                 
                 

             </div>



         </div>


      </div>
  </section>


</body>
</html>