<?php 
include "../../config.php";
include "../../lib/image-creation.php";



$id = $_GET['vehicleId'];
$query = "SELECT * FROM vehicles WHERE vehicle_id = '$id' ";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
$img = $row ['img'];
$year = $row['year'];
$make_id = $row['make_id'];
$model_id = $row['model_id'];

$queryMake = "SELECT * FROM vehicle_make WHERE make_id = '$make_id'";
$resultMake = mysqli_query($link, $queryMake);
$rowMake = mysqli_fetch_array($resultMake);
extract($rowMake);
$make = $rowMake['make'];

$queryModel = "SELECT * FROM vehicle_model WHERE model_id = '$model_id'";
$resultModel = mysqli_query($link, $queryModel);
$rowModel = mysqli_fetch_array($resultModel);
extract($rowModel);
$model = $rowModel['model'];

if (isset($_POST['addImg'])) {
    $gallery_img_title = mysqli_real_escape_string($link, $_POST['gallery_img_title']);
    if ( $_FILES['gallery_img']['tmp_name'] != "") {
        $imgName = $_FILES['gallery_img']['name'];
        $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
        $newName = md5(rand()*time()).$ext;
        $imgPath = CAR_IMG_DIR . $newName;
        $tmpName = $_FILES['gallery_img']['tmp_name'];
        createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
        
      } else{
        $newName = "";
      }
    $query = "INSERT INTO vehicle_gallery (vehicle_id, gallery_img, gallery_img_title) VALUES ('$id', '$newName', '$gallery_img_title' )";
    mysqli_query($link, $query);
    
    
    
}







?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland/Vehicle Management/View Gallery</title>
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
 function deleteImg(car_id, img_id) {
      if (confirm("Are you sure you want to delete this image?")) {
        window.location.href = "deleteGallery.php?vehicleId=" + car_id + "&imgID=" + img_id;
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
                 <li class="breadcrumb-item active" aria-current="page">Manage Gallery</li>
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
             <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
                 <div class="row">
                     <div class="col">
                        <h4>Manage Gallery</h4>
                     </div>         
                 </div>
                 <hr>
                 <div class="row">
                     <div class="col">
                         <h5><b><?php echo $year; ?>&nbsp;<?php echo $make; ?>&nbsp;<?php echo $model; ?></b></h5>
                     </div>
                                          
                 </div>
                 

                 <div class="row">
                     <img src="../vehicles/uploads/<?php  echo $img; ?>" class="img-fluid" width="500px" />
                 </div>
                 <hr>
                 <div class="row">
                     <h5>Add Gallery Image</h5>
                 </div>
                 <form method="POST" enctype="multipart/form-data" id="update_form" >
                 <div class="row">
                     <div class="form-group col-6">
                         <label for="gallery_img_title" >Image Title</label>
                         <input type="text" class="form-control" id="gallery_img_title" name="gallery_img_title"  >
                     </div>
                 </div>
                 <br>
                 <div class="row">
                     <div class="form-group col-6">
                        <label for="gallery_img">Upload Gellery Image</label>
                        <input type="file" class="form-control-file" id="gallery_img" name="gallery_img">
                     </div>
                 </div>
                 <br>

                 <div class="row">
                     <div class="form-group col-3">
                        <button type="submit" class="btn"  name="addImg" style="background-color: #2B6777;color:white;">Add Image</button>
                     </div>
                 </div>
                 </form>
                 <hr>
                 <div class="row" id="displayImg">
                     <?php 
                     $query = "SELECT * FROM vehicle_gallery WHERE vehicle_id = '$id'";
                     $result = mysqli_query($link, $query);
                     
                     while ($row = mysqli_fetch_array($result)){
                         extract($row);
                         $img_id = $row['img_id'];
                         $gallery_img_title = $row['gallery_img_title'];
                         $gallery_img = $row['gallery_img'];
                     
                     ?>
                     <div class="col-4">
                         <img src="../vehicles/uploads/<?php echo $gallery_img ;?>" width="200">
                         <p>
                            <div class="row">
                              <div class="col-6">
                                <?php echo $gallery_img_title ?>
                              </div>
                              <div class="col-6">
                              <button type="button" class="btn update_img" data-toggle="modal" data-target="#editmodal<?php echo $img_id; ?>"  ><i class="bi bi-pencil-square"></i></button>
                                &nbsp;
                                <a href="javascript:deleteImg(<?php echo $id;?>, <?php echo $img_id; ?>)"><i class="bi bi-trash"></i></a>
                              </div>
                            </div>
                        </p>
                     </div>
                     <br>
                     
                     <div class="modal fade" id="editmodal<?php echo $img_id; ?>" tabindex="-1" aria-labelledby="updateImgLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="updateImgLabel">Update Image</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="updateGalleryModal.php">
                              <input  name="img_id" type="hidden" value="<?php echo $img_id; ?>">
                              <input  name="car_id" type="hidden" value="<?php echo $id; ?>">
                              <div class="form-group">
                                <label for="modalTitle" >Image Title</label>
                                <input type="text" class="form-control"  name="modal_title"  >
                              </div>
                              <div class="form-group">
                                <label for="modalImg">Upload Gellery Image</label>
                                <input type="file" class="form-control-file"  name="modal_img">
                              </div>
        
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="modalUpdate">Update</button>
                          </div>
                          </form>
                         </div>
                        </div>
                      </div>
                      
                     <?php } ?>
                 </div>

                 
             
                 
             </div>



         </div>


      </div>
  </section>


</body>
</html>