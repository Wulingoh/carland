<?php
include "../../config.php";
include "../../lib/image-creation.php";
include "../../checkLoginAdminRole.php";
include "../../queryHelpers.php";



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



</head>

<body>
   <section style="background-color: white;">
      <div class="container">
        <div class="row">
            <div class="col">
               <br>
               <img src="../../images/logo4x.png" class="img-fluid float-left" style="width: 200px;">
            </div>
            <div class="col" style="text-align: right;">
               <br><br>
               <p>Hi&nbsp;,<b><?php echo  $_SESSION['fullname']; ?></b>,&nbsp;Welcome Admin!&nbsp;&nbsp;<a href="../../logout.php">[Log Out]</a></p>
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

         <?php include "sideBarNavVehicle.php"; ?>
            <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
               <div class="row">
                  <div class="col">
                     <h4>Vehicle Overview</h4>
                  </div>
                  
                  <div class="col-3">
                     <button type="button" style="color:white;background-color: #2B6777;" class="btn" onclick="document.location='addVehicle.php'">Add new vehicle</button>
                  </div>
               </div>
               <br>
               <div class="row">
                  <table class="table table-hover " style="font-size: 12px;">
                     <thead style="background-color: #2B6777;color:white;">
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
                     $path =  "index.php";
                     $rowsPerPage = 10;
                     $pagingLink = getPagingLink($query, $path, $rowsPerPage);
                     $result = mysqli_query($link, getPagingQuery($query, $rowsPerPage)) or die(mysqli_error($link));
                     
                     while ($row = mysqli_fetch_array($result)) {
                        extract($row);
                        $id = $row['vehicle_id'];
                        $img = $row['img'];
                        $make_id = $row['make_id'];
                        $model_id = $row['model_id'];
                        $price = $row['price'];
                        $year = $row['year'];

                        $queryMake = "SELECT * FROM vehicle_make WHERE make_id = '$make_id' ";
                        $resultMake = mysqli_query($link, $queryMake);
                        $rowMake = mysqli_fetch_array($resultMake);
                        extract($rowMake);
                        $make = $rowMake['make'];

                        $queryModel = "SELECT * FROM vehicle_model WHERE model_id = '$model_id' ";
                        $resultModel = mysqli_query($link, $queryModel);
                        $rowModel = mysqli_fetch_array($resultModel);
                        extract($rowModel);
                        $model = $rowModel['model'];
                     ?>
                        <tbody id="carTable">
                           <tr>
                              <th scope="row"><?php echo $id; ?></th>
                              <td><img src="../vehicles/uploads/<?php echo $img; ?>" width="100" class="img-fluid"></td>
                              <td><?php echo $make; ?></td>
                              <td><?php echo $model; ?></td>
                              <td>$<?php echo number_format($price); ?></td>
                              <td><?php echo $year; ?></td>
                              <td>
                                 <a href="../vehicles/viewVehicle.php?vehicleId=<?php echo $id; ?>">View</a> &nbsp;&nbsp;&nbsp;
                                 <a href="../vehicles/editVehicle.php?vehicleId=<?php echo $id; ?>">Edit</a> &nbsp;&nbsp;&nbsp;
                                 <a href="javascript:deleteVehicle(<?php echo $id; ?>)">Delete</a>&nbsp;&nbsp;&nbsp;
                                 <a href="../vehicles/gallery.php?vehicleId=<?php echo $id; ?>">Gallery</a>
                              </td>

                           </tr>
                        </tbody>
                     <?php } ?>
                  </table>
                  <div class="col-12">
                        <div class="col">
                           <h3 style="text-align:center">
                              <?php echo $pagingLink; // display paging links ?>
                           </h3>
                     </div>
               </div>

            </div>



         </div>


      </div>
   </section>

   <script src="../../js/admin.js" type="text/javascript"></script>
</body>

</html>