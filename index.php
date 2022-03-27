<?php
include "config.php";
include "returnPage.php";
include "queryHelpers.php";

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = 0;
}


$vehicleBrandLogoGallery = fetchVehicleBrandLogo();
$vehicleRecentlyAddedGallery = fetchRecentlyAddedGallery($userId);
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
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>


<body>

    <?php include "navigation.php" ?>

    <section class="container-fluid mb-5">
        <div class="container">
            <div class="row">
                <!-- landing image -->
                <div class="col-7">
                    <img src="images/landingImage.png" />
                </div>
                <div class="col-5 searchFilterWrapper">
                    <form method="GET" action="productsListing.php">
                        <div class="list-group list-group-flush mt-4">
                            <!-- Collapse 1 -->
                            <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" href="#make" aria-expanded="true" aria-controls="collapseExample2" role="button">
                                <span>Make & Model</span>
                                <i class="bi bi-chevron-compact-down rotate-icon"></i>
                            </a>
                            <ul id="make" class="list-group list-group-flush">
                                <li class="list-group-item py-1">
                                    <div class="sidebar-inner-content">
                                        <label class="sidebar-style-label">
                                            <span class="sidebar-text"> Make</span>
                                            <div class="sidebar-select-option">
                                                <select class="selectpicker sidebar-selectpicker" name="searchMake" id="searchMake">
                                                    <option value="">Any</option>
                                                    <?php
                                                    $queryMake = "SELECT * FROM vehicle_make ";
                                                    $resultMake = mysqli_query($link, $queryMake);
                                                    while ($rowMake = mysqli_fetch_array($resultMake)) {
                                                        extract($rowMake);
                                                        $make_id = $rowMake['make_id'];
                                                        $make = $rowMake['make'];

                                                    ?>
                                                        <option value="<?= $make_id; ?>" <?php if (isset($_GET['filterSearch'])) {
                                                        if ($_GET['searchMake'] == $make_id) {
                                                        echo "selected";
                                                        }
                                                        } ?>><?= $make; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item py-1">
                                    <div class="sidebar-inner-content">
                                        <label class="sidebar-style-label">
                                            <span class="sidebar-text"> Model</span>
                                            <div class="sidebar-select-option">
                                                <select class="selectpicker sidebar-selectpicker" name="searchModel" id="searchModel">
                                                    <?php
                                                    $id =  $_GET['searchModel']; //not ideal way to get selected model but works, should check AJAX
                                                    if (isset($_GET['filterSearch']) && $_GET['searchModel']) {
                                                    ?>
                                                        <option value="<?= $_GET['searchModel']; ?>">
                                                            <?php
                                                            $queryMd = "SELECT * FROM vehicle_model WHERE model_id = '$id' ";
                                                            $resultMd = mysqli_query($link, $queryMd);
                                                            $rowMd = mysqli_fetch_assoc($resultMd);
                                                            echo $rowMd['model'];
                                                            ?>
                                                        </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="">Any</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" href="#location" aria-expanded="true" aria-controls="collapseExample2">
                                <span>Location</span>
                                <i class="bi bi-chevron-compact-down rotate-icon"></i>
                            </a>
                            <ul id="location" class="list-group list-group-flush">
                                <li class="list-group-item py-1">
                                    <div class="sidebar-inner-content">
                                        <label class="sidebar-style-label">
                                            <span class="sidebar-text"> City</span>
                                            <div class="sidebar-select-option">
                                                <select class="selectpicker sidebar-selectpicker" name="searchLocation" id="searchLocation">
                                                    <option value="">Any</option>
                                                    <?php
                                                    $queryLocation = "SELECT * FROM vehicle_location";
                                                    $resultLocation  = mysqli_query($link, $queryLocation);
                                                    while ($rowLocation = mysqli_fetch_array($resultLocation)) {
                                                        extract($rowLocation);
                                                    ?>
                                                    <option value="<?= $rowLocation['location_id']; ?>" <?php if (isset($_GET['filterSearch'])) {
                                                        if ($_GET['searchLocation'] == $rowLocation['location_id']) {echo "selected";
                                                        }
                                                        } ?>>
                                                            <?= $rowLocation['location']; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <!-- Tabs content -->
                        </div>
                        <nav class="navbar sidebar-footer justify-content-center pl-0 pr-0">
                            <button type="submit" class="btn btn-block col-12" name="filterSearch" style="background:#2B6777 ;color:white;width:100%;">Search Car</button>
                        </nav>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col mr-5">
                <h3 class="text-center">What our customers are saying:</h3>
            </div>
            <div class="swiffy-slider slider-item-show2 slider-nav-sm slider-nav-page slider-item-snapstart slider-item-nogap slider-nav-round slider-nav-dark slider-indicators-sm slider-indicators-outside slider-indicators-round slider-indicators-dark slider-nav-animation slider-nav-animation-slideup slider-item-first-visible col">
                <div class="slider-container">
                    <div class="p-3 p-xl-5 text-light slide-visible" style="background-color: #52796f;">
                        <span class="col stars mb-5">
                            <img class="" src="images/fiveStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">5 🌟 experience</h3>
                        <p>
                            5 🌟 experience. Easy to obtain quote, clear guidance to rate condition of my ca...
                        </p>
                        <p>Clint Bezos</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                    <div class="p-3 p-xl-5 text-light slide-visible" style="background-color: #80A59D;">
                        <span class="col stars mb-5">
                            <img class="" src="images//fourStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">Straight forward</h3>
                        <p>
                            Straight forward
                        </p>
                        <p>Kim Merrill</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                    <div class="p-3 p-xl-5 text-light" style="background-color: #52796f;">
                        <span class="col stars mb-5">
                            <img class="" src="images/fiveStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">Simply the Best!</h3>
                        <p>
                            Such a seamless experience from sourcing the car, to ordering to delivery. Canno...
                        </p>
                        <p>Manu</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                    <div class="p-3 p-xl-5 text-light" style="background-color: #75A69B;">
                        <span class="col stars mb-5">
                            <img class="" src="images/fiveStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">Awesome</h3>
                        <p>
                            Unforgetable experiences and the whole process are smooth....
                        </p>
                        <p>Jeffrey Hong</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                    <div class="p-3 p-xl-5 text-light" style="background-color: #4BC7AC;">
                        <span class="col stars mb-5">
                            <img class="" src="images/fourStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">The process of buying my car and…</h3>
                        <p>
                            The process of selling my car and handing it over could not have gone smoother...
                        </p>
                        <p>Ahmed Zaidi</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                    <div class="p-3 p-xl-5 text-light" style="background-color: #52796f;">
                        <span class="col stars mb-5">
                            <img class="" src="images/fiveStars.svg" alt="" />
                        </span>
                        <h3 class="text-uppercase h5 mt-3">5 🌟 experience</h3>
                        <p>
                            5 🌟 experience. Easy to obtain quote, clear guidance to rate condition of my ca...
                        </p>
                        <p>Clint Bezos</p>
                        <span class="col buyerScore d-flex justify-content-end">
                            <img src="images/buyerScore.svg" alt="" />
                        </span>
                    </div>
                </div>

                <button type="button" class="slider-nav" aria-label="Go left"></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
            </div>
        </div>
    </section>
    <section class="mt-5 mb-5">
        <div class="mt-3 ml-5">
            <h4 class="ml-5">Search by Popular Brands</h4>
        </div>
        <div class="container mt-3 swiffy-slider slider-item-show4 slider-nav-outside slider-nav-dark slider-nav-sm slider-nav-visible slider-nav-page slider-item-snapstart slider-nav-autoplay slider-nav-autopause slider-item-ratio slider-item-ratio-contain slider-item-ratio-32x9 bg-white shadow-lg py-3 py-lg-4" data-slider-nav-autoplay-interval="2000">
            <div class="slider-container">
                <?php foreach ($vehicleBrandLogoGallery as $key => $vehicleBrandLogoImage) {
                ?>
                    <a href="productsListing.php?searchMake=<?php echo($vehicleBrandLogoImage['make_id']); ?>">
                            <img src="admin/vehicles/uploads/<?php echo $vehicleBrandLogoImage['brand_logo'] ?>" alt="...">
                    </a>
                <?php
                }
                ?>
            </div>
            <button type="button" class="slider-nav" aria-label="Go left"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
        </div>

    </section>
    <!-- end of brands search -->
    <!-- divider block -->
    <div class="container_fluid finance-row mt-2">
        <div class="container finance-block-wrapper mb-3">
            <h4 class="text-center font-weight-bolder">Complete car confidence</h4>
            <div class="row borderless-card-row">
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/meritIcon.png" alt="" />
                    </div>
                    <div class="card-body border-top-0">
                        <h6 class="card-title text-center font-weight-bold card-title-dividerTitle">Carland Quality
                            Assured</h6>
                        <p class="card-text text-center font-weight-lighter card-text-dividerText">All used Carland
                            vehicles have passed through 300 point inspection, been fully reconditioned and have a
                            recent service and VTNZ, if required.</p>
                    </div>
                </div>
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/moneyMeritIcon.png" alt="" /></div>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold ard-title-dividerTitle">Money Back
                            Guarantee</h5>
                        <p class="card-text text-center font-weight-lighter card-text-dividerText">Enjoy your car
                            for up to 7 days to make
                            sure it fits in with your lifestyle. If you
                            change your mind, you can return it for a full refund, no questions asked
                        </p>
                    </div>
                </div>
                <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                    <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/car-care.png" alt="" /></div>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold ard-title-dividerTitle">Carland Car Care
                        </h5>
                        <p class="card-text text-center font-weight-lighter card-text-dividerText">You’ll get at
                            least 90 days of warranty and RAC roadside assistance. We also offer paint and fabric
                            protection, extended warranty and car servicing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of divider block -->
    <!-- products carousel -->
    <section class="container-xl mt-5">
        <div class="mt-3">
            <h4 class="ml-3">Latest Vehicles</h4>
        </div>
        <div class="row">
            <div class="swiffy-slider slider-item-show3 slider-nav-round slider-nav-page">
                <ul class="slider-container">
                    <?php foreach ($vehicleRecentlyAddedGallery as $key => $vehicleRecentlyAddedCard) {
                    ?>
                        <li>
                            <div class="col-lg-4 col-md-12">
                                <div class="card ml-3 card-style">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                        <img src="admin/vehicles/uploads/<?php echo $vehicleRecentlyAddedCard['img']; ?>" class="card-img" />
                                        <div class="card-img-overlay d-flex justify-content-end h-25">
                                            <a href="javascript:" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $vehicleRecentlyAddedCard['vehicle_id'] ?>">
                                                <i class="bi bi-balloon-heart-fill" att="0" style="color:<?php echo $vehicleRecentlyAddedCard['favourite_id'] ? "#DF4E3C" : "white" ?>; font-size: 20px"></i>
                                            </a>
                                        </div>
                                        <div class="mask">
                                            <div class="d-flex justify-content-end">
                                                <div class="">
                                                    <span class="product-location"><?php echo $vehicleRecentlyAddedCard['location'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-reset">
                                            <h5 class="card-title mb-3"><?php echo htmlentities($vehicleRecentlyAddedCard['title']); ?></h5>
                                        </div>
                                        <div class="text-reset">
                                            <p class="product-description"><?php echo htmlentities($vehicleRecentlyAddedCard['subtitle']); ?></p>
                                            <span class="product-text-mileage"><?php echo htmlentities($vehicleRecentlyAddedCard['mileage']) ?>km</span>
                                            <span class="product-text-reg"><?php echo htmlentities($vehicleRecentlyAddedCard['rego']) ?> </span>
                                        </div>
                                        <h6 class="mt-3 mb-3"><b>$<?php echo number_format($vehicleRecentlyAddedCard['price']) ?></b></h6>
                                    </div>
                                    <a class="btn btn-outline-success mb-3 w-90 ml-3 mr-3" href='productDetail.php?vehicleId=<?php echo htmlentities($vehicleRecentlyAddedCard['vehicle_id']); ?>'><i class="bi bi-eye pr-2"></i> View This Car</a>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <button type="button" class="slider-nav" aria-label="Go left"></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
            </div>
        </div>
    </section>
    <div class="container-fluid container-finance-wrapper">
        <!-- car financing block -->
        <div class="row finance-row mt-2">
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
                                part exchange your old car and lower your finance costs.
                            </p>
                        </div>
                    </div>
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleThree.png" alt="" /></div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold card-title-iconTitle">Get approved</h5>
                            <p class="card-text text-center card-text-iconText">Pay no deposit and sign all documents
                                online. Then choose to collect your car or have it delivered.
                            </p>
                        </div>
                    </div>
                </div>
                <a type="button" class="btn btn-outline-success info-btn" href="https://motorvehiclefinance.co.nz/?utm_source=google&utm_medium=cpc&utm_campaign=Search+-+Competitors&utm_content=Mtf+Car+Finance&utm_term=mtf%20car%20finance&utm_campaign=&utm_source=adwords&utm_medium=ppc&hsa_acc=4530153230&hsa_cam=10091857667&hsa_grp=128445689234&hsa_ad=537068815657&hsa_src=g&hsa_tgt=kwd-311279703747&hsa_kw=mtf%20car%20finance&hsa_mt=e&hsa_net=adwords&hsa_ver=3&gclid=Cj0KCQjw8_qRBhCXARIsAE2AtRYhOXSkeiCaQy9hIu5-EMobYUcSZUnjx1KBi0o8LBQS9pKmJ700o0QaAnWVEALw_wcB" target="_blank">More info <i class="bi bi-plus-square"></i></a>
            </div>
        </div>
        <!-- end of car financing block -->
    </div>
    <?php include "footer.php" ?>
    <div class="clearfix"></div>
    <script src="js/carousel-slider.js" type="text/javascript"></script>
    <script src="js/vehicle.js" type="text/javascript"></script>
</body>

</html>