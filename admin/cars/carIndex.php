<?php 
include "../../config.php";
include "../../image-creation.php";





?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland/Vehicle Management</title>
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

 function deleteCar(carID){
   if (confirm("Are you sure you want to delete this Vehicle?")) {
        window.location.href = "../cars/deleteCar.php?carID=" + carID;
      }

 }

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
                 <li class="breadcrumb-item active" aria-current="page">Vehicle Management</li>
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
                        <h4>Vehicle Overview</h4>
                     </div>
                     <div class="col-4">
                       <input class="form-control" type="text" id="carSearch" placeholder= "Type to search...">
                     </div>
                     <div class="col-3">
                        <button type="button" style="color:white;background-color: #2B6777;" class="btn" onclick="document.location='addCar.php'">Add new vehicle</button>
                     </div>     
                 </div>
                 <br>
                 <div class="row">
                     <table class="table table-hover " style="font-size: 12px;">
                       <thead>
                         <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Img</th>
                            <th scope="col">Make</th>
                            <th scope="col">Model</th>
                            <th scope="col">Price</th>
                            <th scope="col">Year</th>
                            <th scope="col">Actions</th>
                         </tr>
                       </thead>
                       <?php 
                       $query = "SELECT * FROM vehicles ";
                       $result = mysqli_query($link, $query);
                       while($row = mysqli_fetch_array($result)){
                          extract($row);
                          $id = $row ['vehicle_id'];
                          $img = $row ['img'];
                          $make_id = $row ['make_id'];
                          $model_id = $row ['model_id'];
                          $price = $row ['price'];
                          $year = $row ['year'];

                          $queryMake = "SELECT * FROM vehicle_make WHERE make_id = '$make_id' ";
                          $resultMake = mysqli_query($link, $queryMake);
                          $rowMake = mysqli_fetch_array($resultMake);
                          extract($rowMake);
                          $make = $rowMake['make'];

                          $queryModel = "SELECT * FROM vehicle_model WHERE model_id = '$model_id' ";
                          $resultModel= mysqli_query($link, $queryModel);
                          $rowModel = mysqli_fetch_array($resultModel);
                          extract($rowModel);
                          $model = $rowModel['model'];



                       
                       ?>
                       <tbody id="carTable">
                            <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><img src="../cars/uploads/<?php echo $img; ?>" width="100" class="img-fluid"></td>
                            <td><?php echo $make; ?></td>
                            <td><?php echo $model; ?></td>
                            <td>$<?php echo number_format($price); ?></td>
                            <td><?php echo $year; ?></td>
                            <td>
                               <a href="../cars/viewCar.php?carID=<?php echo $id; ?>">View</a> &nbsp;&nbsp;&nbsp;
                               <a href="../cars/editCar.php?carID=<?php echo $id; ?>">Edit</a> &nbsp;&nbsp;&nbsp;
                               <a href="javascript:deleteCar(<?php echo $id; ?>)">Delete</a>&nbsp;&nbsp;&nbsp;
                               <a href="../cars/gallery.php?carID=<?php echo $id; ?>">Gallery</a>
                            </td>
                           
                         </tr>
                       </tbody>
                       <?php } ?>
                     </table>
                 </div>

             </div>



         </div>


      </div>
  </section>


</body>
</html>