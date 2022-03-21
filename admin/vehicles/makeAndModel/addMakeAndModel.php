<?php
include "../../../config.php";
include "../../../lib/image-creation.php";
include  "../../../queryHelpers.php";



//add make
if (isset($_POST['addVehicleMake'])) {
  $make = mysqli_real_escape_string($link, $_POST['newMake']);
  $query = "INSERT INTO vehicle_make (make) VALUES ('$make') ";
  mysqli_query($link, $query);
}



  if ($_FILES['img']['tmp_name'] != "") {
    $imgName = $_FILES['img']['name'];
    $ext = strrchr($imgName, ".");
    $newName = md5(rand() * time()) . $ext;
    $imgPath = CAR_IMG_DIR . $newName;
    $tmpName = $_FILES['img']['tmp_name'];
    createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
  } else {
    $newName = "";
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carland/Add vehicle</title>
  <link href="../../../css/bootstrap.css" rel="stylesheet">
  <script src="../../../js/jquery-1.10.1.min.js"></script>
  <script src="../../../js/bootstrap.bundle.min.js"></script>
  <link href="../../../css/style.css" rel="stylesheet">
  <link href="../../../icon/bootstrap-icons.css" rel="stylesheet">

  <script>
    function arrowChange1() {
      if (document.getElementById("arrowDown1").className == "bi bi-caret-down-fill") {
        document.getElementById("arrowDown1").className = "bi bi-caret-up-fill";


      } else {
        document.getElementById("arrowDown1").className = "bi bi-caret-down-fill";


      }

    }

    function arrowChange2() {
      if (document.getElementById("arrowDown2").className == "bi bi-caret-down-fill") {
        document.getElementById("arrowDown2").className = "bi bi-caret-up-fill";


      } else {
        document.getElementById("arrowDown2").className = "bi bi-caret-down-fill";


      }

    }



    $(document).ready(function() {
      $('#make').on('change', function() {
        var makeID = $(this).val();
        if (makeID) {
          $.ajax({
            type: 'POST',
            url: 'displayModel.php',
            data: 'make_id=' + makeID,
            success: function(html) {
              $('#model').html(html);

            }

          });
        } else {
          $('#model').html('<option value="">Select make first</option>');
        }

      });
    });
  </script>

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
            <li class="breadcrumb-item"><a href="index.php">Vehicle Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Vehicle Make And Model</li>
          </ol>
        </nav>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <div class="row">
            <img src="../../images/admin-dashboardBar.png" class="img-fluid" />
          </div>
          <br>

          <div class="row justify-content-center  ">
            <div class="col">
              <a href="../users/index.php" style="text-decoration: none;color:black">
                <h5>User Management</h5>
              </a>
            </div>
            <div class="col-2">
              <a data-toggle="collapse" href="#collapseUser" role="button" onclick="arrowChange1()" aria-expanded="false" aria-controls="collapseUser">
                <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown1" class="bi bi-caret-down-fill"></i></span>
              </a>
            </div>
          </div>
          <div class="collapse" id="collapseUser">
            <h6 style="text-align: right;">
              <a href="../users/addUser.php" style="text-decoration: none;color:black;"> Add New User</a>
            </h6>
          </div>
          <hr>

          <div class="row">

            <div class="col">
              <a href="index.php" style="text-decoration: none;color:black">
                <h5><b>Vehicle Management</b></h5>
              </a>
            </div>
            <div class="col-2">
              <a data-toggle="collapse" href="#collapseVehicle" href="addCar.php" role="button" onclick="arrowChange2()" aria-expanded="false" aria-controls="collapseVehicle">
                <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown2" class="bi bi-caret-down-fill"></i></span>
              </a>

            </div>
          </div>
          <div class="collapse" id="collapseVehicle">
            <h6 class="mb-3" style="text-align: right;">
              <a href="addVehicle.php" style="text-decoration: none;color:black;">Add New Vehicle </a>
            </h6>
            <h6 style="text-align: right;">
              <a href="makeAndModel/index.php" style="text-decoration: none;color:black;">Make And Model</a>
            </h6>
          </div>
          <hr>
        </div>
        <div class="col" style="padding-left: 50px;border-left:1.5px solid #E2E8F0;">
          <div class="row">
            <div class="col">
              <h4>Add Vehicle Make and Model</h4>
            </div>

          </div>
          <hr>
          <br>

          <form method="POST" action="" enctype="multipart/form-data">
              <div class="form-group col mb-5">
                <input type="text" class="form-control" id="newMake" name="newMake" placeholder="Add a new make">
              </div>
              <div class="form-group col mb-5">
                <label for="img">Upload Vehicle Make Logo</label>
                <input type="file" class="form-control-file" id="img" name="img">
              </div>
              <div class="form-group col mb-5">
                
              </div>

              <div class="form-group col mb-5">
                <input type="text" class="form-control" id="newModel" name="newModel" placeholder="Add a new model">
              </div>
            <br>
              <div class="form-group col mb-5">
                <button type="submit" class="btn" name="addVehicleMake" style="background-color: #2B6777;color:white;">Add Vehicle Make</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>