<?php 
include "../../config.php";

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    function deleteCar(carID) {
      if (confirm("Are you sure you want to delete this car?")) {
        window.location.href = "../cars/deleteCar.php?carID=" + carID;
      }
    }
  //import a js object 'window.location.href' can return the URL of the current page.

  // search bar -> jquery
    $(document).ready(function(){
  $("#carSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#carTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
  </script>
  




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
    <div class="row  justify-content-md-center">
        <div class="col-md-auto">
        <h3 style="color: cadetblue;">Manage your cars!</h3>
        </div>        
    </div>
    <br>
    <div class="row">
      <div class="col col-lg-2">
          
          <span style="font-size: 30px;color:cadetblue;">   
          <i class="fas fa-plus-square">
             <a href="../cars/addCar.php" style="font-size: 20px;">Add Car</a>
          </i>
          </span>
          
  
      </div>
      <div class="col-lg-4">      
        <form class="d-flex">
          <span style="font-size: 30px;color:cadetblue;"> <i class="fas fa-search"></i> </span>
          <input class="form-control me-2" type="search"  id="carSearch" name="userName"  placeholder="Search car" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="searchUser">Return</button>
         </form>    
      </div>
    </div>
    <br>
  
    <div class="table-responsive">
        <table class="table table-striped  table-hover table-borderless" >
          <thead style="background: cadetblue;color:white;">
          <tr>
            <th scope="col">car_ID</th>
            <th scope="col">car_Img</th>
            <th scope="col">car_Type</th>
            <th scope="col">car_Make</th>
            <th scope="col">car_Model</th>
            <th scope="col">car_color</th>
            <th scope="col">car_Year</th>
            <th scope="col">car_Fuel</th>
            <th scope="col">safty_Rate</th>
            <th scope="col">car_Price</th>
            <th scope="col">car_Detail</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">Gallery</th>
          </tr>
          </thead>
          <?php 
          // Inner join mutiple tables with foreign keys.
          $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID)";
          $result = mysqli_query($link, $sql);
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
          <tbody id="carTable">
            <tr>
            <td><?php echo $id;?></td>
            <td><img src="../cars/uploads/<?php echo $img;?>" width="70"></td>
            <td><?php echo $type;?></td>
            <td><?php echo $make;?></td>
            <td><?php echo $model;?></td>
            <td><?php echo $color;?></td>
            <td><?php echo $year;?></td>
            <td><?php echo $fuel;?></td>
            <td><?php echo $safe;?></td>
            <td><?php echo $price;?></td>
            <td><?php echo $detail;?></td>
            
            <td>
            <a href="../cars/editCar.php?carID=<?php echo $id; ?>" title="edit_Car">  
            <span style="font-size: 20px;color:cadetblue;"><i class="fas fa-edit"></i></span>
            </a> 
            </td>
            <td>
            <a href="javascript:deleteCar(<?php echo $id; ?>)">
            <span style="font-size: 20px;color:brown;"><i class="fas fa-trash-alt"></i></span>
            </a>
            </td>
            <td>
            <a href="../cars/gallery.php?carID=<?php echo $id; ?>" title="gallery">  
            <span style="font-size: 20px;color:cadetblue;"><i class="fas fa-images"></i></span>
            </a> 
            </td>
            <!--insert delete&edit function-->
            
            </tr>
            
          </tbody>
       
      <?php
        }
      
      ?>
      </table>
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
</body>
</html>