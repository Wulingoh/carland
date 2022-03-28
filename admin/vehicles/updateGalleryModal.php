<?php 
include "../../config.php";
include "../../lib/image-creation.php";
include "../../checkLoginAdminRole.php";

      
    if (isset($_POST['modalUpdate'])) {
        $id = $_POST['car_id'];
        $img_id = $_POST['img_id'];
        $title = mysqli_real_escape_string($link, $_POST["modal_title"]);  
        if ( $_FILES['modal_img']['tmp_name'] != "") {
            $imgName = $_FILES['modal_img']['name'];
            $ext = strrchr($imgName, "."); //Finds the last occurrence of a string inside another string, string=> photoName, needle => "."
            $newName = md5(rand()*time()).$ext;
            $imgPath = CAR_IMG_DIR . $newName;
            $tmpName = $_FILES['modal_img']['tmp_name'];
            createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
            $query = "UPDATE vehicle_gallery SET gallery_img_title = '$title', gallery_img = '$newName' WHERE img_id = '$img_id'  ";
            mysqli_query($link, $query);

            
          } else{
            $query = "UPDATE vehicle_gallery SET gallery_img_title = '$title' WHERE img_id = '$img_id'  ";
            mysqli_query($link, $query);

          }
          header("location:gallery.php?vehicleId=".$id);
        }
    
    
    
?>