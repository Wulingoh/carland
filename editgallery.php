<?php 
include "../../config.php";
include "../../library/image-creation.php";


$id = $_GET['carID'];
$galleryID = $_GET['galleryID'];
$queryG = "SELECT * FROM gallery WHERE gallery_ID = '$galleryID'";
$resultG = mysqli_query($link, $queryG);
$rowG = mysqli_fetch_array($resultG);
extract($rowG);
$galleryCap = $rowG['gallery_Cap'];
$galleryImg = $rowG['gallery_Img'];

if (isset($_POST['updateGallery'])) {
    $galleryCapnew = mysqli_real_escape_string($link, $_POST['galleryCap']);
    if ( $_FILES['carImg']['tmp_name'] != "") {
        $imgName = $_FILES['carImg']['name'];
        $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
        $newName = md5(rand()*time()).$ext;
        $imgPath = CAR_IMG . $newName;
        $tmpName = $_FILES['carImg']['tmp_name'];
        createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
        $query = "UPDATE gallery SET gallery_Cap = '$galleryCapnew', gallery_Img = '$newName' WHERE gallery_ID = '$galleryID' ";
        mysqli_query($link, $query);
    
  } else{
    $query = "UPDATE gallery SET gallery_Cap = '$galleryCapnew' WHERE gallery_ID = '$galleryID' ";
    mysqli_query($link, $query);
  } 
        

    header("Location: gallery.php?carID=".$id);
    
    
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
  <title>Manage Gallery</title>
  
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
     <div class="row justify-content-md-center ">
       <div class="col-lg-3" style="text-align: center;">
         <h2 style="color:cadetblue;">Edit Gallery</h2>
         
       </div>
       
     </div>
     <br>
     <br>
     <br>

     <form method="POST"  enctype="multipart/form-data" >
     <div class="row justify-content-md-center">
        <div class="col col-lg-4">
           
             
             <label for="galleryCap" class="form-label">Edit Image Caption</label>
             <input type="text" name="galleryCap" class="form-control" value="<?php echo $galleryCap; ?>">
             
           
        </div>
      </div>
      <br>
      <br>

      <div class="row justify-content-md-center">
        <div class="col col-lg-4">
           
             
             <label for="carImg" class="form-label">Edit Gallery Images</label>
             <input type="file" name="carImg" class="form-control" accept="image/jpeg, image/jpg, image/png">
             <br>
             <img src="../cars/uploads/<?php echo $galleryImg; ?>" class="img-fluid" width="200" />
             
           
        </div>
      </div>
      <br>
      <br>

      <div class="row ">
         <div class="col" style="text-align: center;">
           <button type="submit" class="btn" name="updateGallery" style="background: cadetblue;color:white;">Update Image</button>

         </div>

       </div>


     </form>
     <br>
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