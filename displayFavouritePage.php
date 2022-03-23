<?php
require_once "config.php";
require_once "returnPage.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
} else {
    $userId = $_SESSION['user_id'];

    $query = "SELECT vehicles.vehicle_id, Year, Price, Detail, title, subtitle, Img, vehicle_make.make_ID, vehicle_model.model_ID, vehicle_color.color, vehicle_fuelType.fuelType, vehicle_safety.safety_ID, favourite_id FROM favourite INNER JOIN vehicles ON vehicles.vehicle_ID = favourite.vehicle_id INNER JOIN vehicle_make ON vehicles.make_ID = vehicle_make.make_ID INNER JOIN vehicle_model ON vehicles.model_ID = vehicle_model.model_ID INNER JOIN vehicle_color ON vehicles.color_ID = vehicle_color.color_ID INNER JOIN vehicle_fueltype ON vehicles.fuelType_ID = vehicle_fueltype.fuelType_ID INNER JOIN vehicle_safety ON vehicles.safety_ID = vehicle_safety.safety_ID WHERE favourite.user_id = $userId;";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php require "navigation.php" ?>
    <!-- landing page -->
    <section class="container-fluid mb-5">
        <div class="row">
            <div class="pull-left col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Favourite</li>
                </ol>
            </nav>
        </div>
        </div>
        <div class="favourite-image d-flex justify-content-center">
            <img class="favourite-landing-image" src="images/favouriteImage.svg" />
        </div>
        <div class="favourite-line-vector d-flex justify-content-center">
            <img class="favourite-line" src="images/favouriteLineVector1.svg" />
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- end of landing page -->
    <!-- display favourite cards -->
    <div class="container container-favourite-wrapper mt-5">
        <?php if (mysqli_num_rows($result) == 0) {
            echo "Your favourite is empty";
        }
        ?>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="row container-favourite-row mt-5">
                <div class="col mt-5 mb-3 ml-3">
                    <img class="favourite-card-image" src="images/bmwImage.png" alt="" />
                    <a href="javascript:" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $row['vehicle_id'] ?>">
                        <i class="bi bi-balloon-heart-fill" att="0" style="color: #DF4E3C; font-size: 20px"></i>
                    </a>
                </div>
                <div class="col mt-5 mb-3 ml-3">
                    <h5 class="favourite-title font-weight-bolder"><?php echo $row['title']; ?></h5>
                    <p class="favourite-texts"><?php echo $row['subtitle']; ?></p>
                    <p class="favourite-texts">28,650km
                        <span class="favourite-texts ml-5">2017 reg</span>
                    </p>
                    <p class="favourite-texts">Christchurch</p>
                    <p class="favourite-texts font-weight-bold mt-2">$55,125</p>
                </div>
                <div class="col mt-5 mb-3 ml-3">
                    <input type="button" value="View this car" class="btn btn-outline-success btn-block mb-3" onclick="window.location.href='productDetail.php?vehicleId=<?php echo $row['vehicle_id']; ?>'">
                    <input type="button" value="Book for test drive" class="btn btn-outline-success btn-block mt-3 mb-2" onclick="window.location.href='contact.php?vehicleId=<?php echo $row['vehicle_id']?>'">
                    <a href="javascript:" type="button" value="Remove favourite" class="btn btn-outline-secondary btn-block mt-3 mb-2 favouriteHeartBtn" data-carid="<?php echo $row['vehicle_id'] ?>">Remove favourite
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- car financing block -->
    <div class="row finance-row mt-5 ml-0 mr-0 p-0">
        <div class="container finance-block-wrapper mb-5">
            <a href="#" class="finance-block-link">
                <h4 class="finance-block-header">Car Financing</h4>
            </a>
            <div class="row borderless-card-row">
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleOne.png" alt="" />
                    </div>
                    <div class="card-body border-top-0">
                        <h6 class="card-title text-center font-weight-bold card-title-iconTitle">Find your perfect
                            car</h6>
                        <p class="card-text text-center card-text-iconText">Browse our wide range of high-quality
                            used Carland vehicles that are available to buy or finance.</p>
                    </div>
                </div>
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleTwo.png" alt="" /></div>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold card-title-iconTitle">Choose your deal
                        </h5>
                        <p class="card-text text-center card-text-iconText">Apply for finance online. You can also
                            part exchange your old vehicle and lower your finance costs.
                        </p>
                    </div>
                </div>
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleThree.png" alt="" /></div>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold card-title-iconTitle">Get approved</h5>
                        <p class="card-text text-center card-text-iconText">Pay no deposit and sign all documents
                            online. Then choose to collect your vehicle or have it delivered.
                        </p>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-outline-success info-btn" href="#">More info <i class="bi bi-plus-square"></i></button>
        </div>
    </div>
    <!-- end of car financing block -->
    <?php require "footer.php" ?>
    <div class="clearfix"></div>
    <script src="js/carousel-slider.js" type="text/javascript"></script>
    <script src="js/vehicle.js" type="text/javascript"></script>
</body>

</html>