<?php 
include "../../config.php";
include "../../library/image-creation.php";







$id = $_GET['carID'];
$query = "SELECT * FROM cars WHERE car_ID = '$id'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);
$detail = $row['car_Detail'];
$img = $row['car_Img'];






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>Manage Gallery</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="../admin.css">
  <link href="css/index.css" rel="stylesheet">


  <script>
    function deleteImg(carID, galleryID) {
      if (confirm("Are you sure you want to delete this image?")) {
        window.location.href = "deleteGallery.php?carID=" + carID + "&galleryID=" + galleryID;
      }
    }
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
    <div >
     <div class="row ">
       <div class="col" style="text-align: center;">
         <h2 style="color:cadetblue;">View Gallery</h2>
       </div>
     </div>
     <br>
     <br>
     <br>


     <div class="row justify-content-md-center">
         <div class="col col-lg-4">
           <div class="row">
             <div class="col">
               <h4><b><?php  echo $detail; ?></b></h4>
             </div>
             <div class="col col-lg-2">
               <a href="../cars/addgallery.php?carID=<?php echo $id; ?>" >
                 <span style="font-size: 50px;color:cadetblue;"><i class="fas fa-folder-plus"></i></span>
               </a>
             </div>
           </div>
           <hr>
           <img src="../cars/uploads/<?php echo $img; ?>"  class="img-fluid" />
         </div>
     </div>
     <br>
     <br>
     

     
   

        <div class="row justify-content-md-center">
         
         <?php 
           $queryG = "SELECT * FROM gallery WHERE car_ID = '$id'";
           $resultG = mysqli_query($link, $queryG);
     
           while($rowG = mysqli_fetch_array($resultG)){
           $id = $rowG['car_ID'];
           $galleryID = $rowG['gallery_ID'];
           $galleryCap = $rowG['gallery_Cap'];
           $galleryImg = $rowG['gallery_Img'];
    
    
         ?>
         <div class="col col-lg-3">
         <h6><b><?php  echo $galleryCap; ?></b></h6><hr>
         <img src="../cars/uploads/<?php echo $galleryImg; ?>" width="250"  class="img-fluid" />
         
         
         <div class="row justify-content-md-center">
             <div class="col" style="text-align: center;">
             <a href="../cars/editgallery.php?carID=<?php echo $id; ?>&amp;galleryID=<?php echo $galleryID; ?>" >
             <span style="font-size: 50px;color:cadetblue;"><i class="fas fa-edit"></i></span>
             </a>
             </div>
             <div class="col">
             <a href="javascript:deleteImg(<?php echo $id; ?>, <?php echo $galleryID; ?>)">
             <span style="font-size: 50px;color:brown;"><i class="fas fa-trash-alt"></i></span>
             </a>
             </div>
         </div>
         <br>
         </div>
         
         <?php  
         } 
         ?>
        </div>
        <br>
        <br>
         
    
    

    









</div> 
</div>








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


</body>
</html>