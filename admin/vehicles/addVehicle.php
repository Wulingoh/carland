<?php
include "../../config.php";
include "../../lib/image-creation.php";
include "../../checkLoginAdminRole.php";



//add make
if (isset($_POST['addMake'])) {
  if ($_FILES['brandLogo']['tmp_name'] != "") {
    $imgName = $_FILES['brandLogo']['name'];
    $ext = strrchr($imgName, ".");
    $newName = md5(rand() * time()) . $ext;
    $imgPath = CAR_IMG_DIR . $newName;
    $tmpName = $_FILES['brandLogo']['tmp_name'];
    createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);
  } else {
    $newName = "";
  }
  $make = mysqli_real_escape_string($link, $_POST['newMake']);
  $query = "INSERT INTO vehicle_make (make, brand_logo) VALUES ('$make' , '$newName') ";
  mysqli_query($link, $query) or die(mysqli_error($link));
}

//add model
if (isset($_POST['addModel'])) {
  $model = mysqli_real_escape_string($link, $_POST['newModel']);
  $make_id = mysqli_real_escape_string($link, $_POST['make']);
  $query = "INSERT INTO vehicle_model (model, make_id) VALUES ('$model','$make_id')";
  mysqli_query($link, $query);
}

//add color
if (isset($_POST['addColor'])) {
  $color = mysqli_real_escape_string($link, $_POST['newColor']);
  $query = "INSERT INTO vehicle_color (color) VALUES ('$color')";
  mysqli_query($link, $query);
}

//add car
if (isset($_POST['addCar'])) {
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
  $title = mysqli_real_escape_string($link, $_POST['title']);
  $subtitle = mysqli_real_escape_string($link, $_POST['subtitle']);
  $location_id = mysqli_real_escape_string($link, $_POST['location']);
  $detail = mysqli_real_escape_string($link, $_POST['detail']);




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



  $query = "INSERT INTO vehicles (make_id, model_id, color_id, category_id,transmission_id, bodytype_id, seats_id,fueltype_id, safety_id, price, year, mileage, engine_size, rego, stock, location_id, title,subtitle, detail, img) VALUES('$make_id','$model_id','$color_id','$category_id','$transmission_id','$bodytype_id','$seats_id','$fueltype_id','$safety_id','$price','$year','$mileage','$engine_size','$rego','$stock', '$location_id','$title', '$subtitle', '$detail','$newName')";
  mysqli_query($link, $query) or die(mysqli_error($link));
  header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carland/Add vehicle</title>
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
            <li class="breadcrumb-item"><a href="index.php">Vehicle Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add new vehicle</li>
          </ol>
        </nav>
      </div>

      <div class="row">
        <?php include "sideBarNavVehicle.php" ?>
        <div class="col" style="padding-left: 50px;border-left:1.5px solid #E2E8F0;">
          <div class="row">
            <div class="col">
              <h4>Add New Vehicle</h4>
            </div>

          </div>
          <hr>
          <br>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-5">
                <select id="make" name="make" class="form-control" required>
                  <option value="">Please Select Make</option>
                  <?php
                  $queryMake = "SELECT * FROM vehicle_make";
                  $resultMake = mysqli_query($link, $queryMake);
                  while ($rowMake = mysqli_fetch_array($resultMake)) {
                    extract($rowMake);
                  ?>
                    <option value="<?php echo $make_id; ?>"><?php echo $make; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-5">
                <button type="button" class="btn" name="addNewMakeModal" data-toggle="modal" data-target="#addNewMake" data-whatever="@addNewMake" style="background-color: #2B6777;color:white;">Add New Make</button>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-5">
                <select class="form-control" name="model" id="model">
                  <option value="">Please Select Make First!</option>
                </select>
              </div>
              <div class="form-group col-5">
                <span class="openModelWrapper">
                  <button type="button" class="btn" id="openModel" name="addNewModelModal" data-toggle="modal" data-target="#addNewModel" data-whatever="@addNewModel" style="background-color: #2B6777;color:white;">Add New Model</button>
                </span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-5">
                <select class="form-control" name="color" id="color">
                  <option value="">Please Select Color</option>
                  <?php
                  $queryColor = "SELECT * FROM vehicle_color";
                  $resultColor = mysqli_query($link, $queryColor);
                  while ($rowColor = mysqli_fetch_array($resultColor)) {
                    extract($rowColor);
                  ?>
                    <option value="<?php echo $color_id; ?>"><?php echo $color; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-5">
                <span class="openModelWrapper">
                  <button type="button" class="btn" id="openColor" name="addNewColorModal" data-toggle="modal" data-target="#addNewColor" data-whatever="@addNewModel" style="background-color: #2B6777;color:white;">Add New Color</button>
                </span>
              </div>
            </div>
            <br>

            <div class="row">
              <p class="col-5">Please Select Category:</p>
              <?php
              $queryCategory = "SELECT * FROM vehicle_category";
              $resultCategory = mysqli_query($link, $queryCategory);
              while ($rowCategory = mysqli_fetch_array($resultCategory)) {
                extract($rowCategory);
              ?>
                <div class="form-check form-check-inline form-group col-2 ">
                  <input class="form-check-input" type="radio" name="category" required="required" id="category<?php echo $category_id; ?>" value="<?php echo $category_id; ?>">
                  <label class="form-check-label" for="category<?php echo $category_id; ?>"><?php echo $category; ?></label>
                </div>
              <?php  } ?>

            </div>
            <br>

            <div class="row">
              <p class="col-5">Please Select Transmission:</p>
              <?php
              $queryTransmission = "SELECT * FROM vehicle_transmission";
              $resultTransmission = mysqli_query($link, $queryTransmission);
              while ($rowTransmission = mysqli_fetch_array($resultTransmission)) {
                extract($rowTransmission);
              ?>
                <div class="form-check form-check-inline form-group col-2 ">
                  <input class="form-check-input" type="radio" name="transmission" id="transmission<?php echo $transmission_id; ?>" value="<?php echo $transmission_id; ?>">
                  <label class="form-check-label" for="transmission<?php echo $transmission_id; ?>"><?php echo $transmission; ?></label>
                </div>
              <?php  } ?>

            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <select class="form-control" name="bodytype" id="bodytype" required>
                  <option value="">Please Select Body Type</option>
                  <?php
                  $queryBodytype = "SELECT * FROM vehicle_bodytype";
                  $resultBodytype = mysqli_query($link, $queryBodytype);
                  while ($rowBodytype = mysqli_fetch_array($resultBodytype)) {
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
                <select class="form-control" name="seats" id="seats" required>
                  <option value="">Please Select Amount of Seats</option>
                  <?php
                  $querySeats = "SELECT * FROM vehicle_seats";
                  $resultSeats = mysqli_query($link, $querySeats);
                  while ($rowSeats = mysqli_fetch_array($resultSeats)) {
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
                <select class="form-control" name="fueltype" id="fueltype" required>
                  <option value="">Please Select Fuel Type</option>
                  <?php
                  $queryFueltype = "SELECT * FROM vehicle_fueltype";
                  $resultFueltype = mysqli_query($link, $queryFueltype);
                  while ($rowFueltype = mysqli_fetch_array($resultFueltype)) {
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
                <select class="form-control" name="safety" id="safety" required>
                  <option value="">Please Select Safety Rating</option>
                  <?php
                  $querySafety = "SELECT * FROM vehicle_safety";
                  $resultSafety = mysqli_query($link, $querySafety);
                  while ($rowSafety = mysqli_fetch_array($resultSafety)) {
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
                <input type="number" class="form-control" id="price" name="price" placeholder="Please Mark The Price" required>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <input type="text" class="form-control" id="year" name="year" placeholder="Please Mark The Year">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <input type="number" class="form-control" id="mileage" name="mileage" placeholder="Please Mark The Mileage" required>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <input type="text" class="form-control" id="engine_size" name="engine_size" placeholder="Please Mark The Engine Size" required>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <input type="text" class="form-control" id="rego" name="rego" placeholder="Please Mark The Rego(if available)">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Please Mark The Stock">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Please Enter The Title" required>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-10">
                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Please Enter The Subtitle" required>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="form-group col-10">
                <select class="form-control" name="location" id="location" required>
                  <option value="">Please Select Location</option>
                  <?php
                  $queryLocation = "SELECT * FROM vehicle_location";
                  $resultLocation = mysqli_query($link, $queryLocation);
                  while ($rowLocation = mysqli_fetch_array($resultLocation)) {
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
                <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="Please put the vehicle detail here..."></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-10">
                <label for="img">Upload Vehicle Photos</label>
                <input type="file" class="form-control-file" id="img" name="img">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-3">
                <button type="submit" class="btn" name="addCar" style="background-color: #2B6777;color:white;">Add Vehicle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal for add new make -->
    <div class="modal fade" id="addNewMake" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Make</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="addVehicle.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="newMake" class="col-form-label">New Make</label>
                <input type="text" class="form-control" id="newMake" name="newMake" required>
              </div>
              <div class="form-group">
                <label for="brandLogo" class="col-form-label">Logo:</label>
                <input type="file" class="form-control-file" id="brandLogo" name="brandLogo">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="addMake">Add New Make</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal for add new model -->
    <div class="modal fade" id="addNewModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Model</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="addVehicle.php" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">New Model</label>
                <input type="hidden" id="makeModel" name="make">
                <input type="text" class="form-control" id="newModel" name="newModel" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="addModel">Add New Model</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal for add new color -->
    <div class="modal fade" id="addNewColor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Color</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="addVehicle.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="newColor" class="col-form-label">New Color</label>
                <input type="text" class="form-control" id="newColor" name="newColor" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="addColor">Add New Color</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="../../admin/adminJs/adminJs.js" type="text/javascript"></script>
</body>

</html>