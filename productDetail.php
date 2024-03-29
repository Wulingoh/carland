<?php
include "config.php";
include "returnPage.php";
include "queryHelpers.php";


if (!isset($_GET['vehicleId'])) {
    header("Location: productsListing.php");
    exit;
}

$vehicleId = $_GET['vehicleId'];
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = 0;
}
$query =
    "SELECT vehicles.vehicle_id, img, price, year, mileage, engine_size, detail, rego, category, bodytype, fuelType, vehicle_make.make_id, vehicle_model.model_id, vehicle_transmission.transmission, color, seats, vehicle_safety.safety_id, vehicle_location.location, title, subtitle,favourite_id, vehicles.bodytype_id 
        FROM vehicles 
        INNER JOIN vehicle_make ON vehicles.make_id = vehicle_make.make_id 
        INNER JOIN vehicle_model ON vehicles.model_id = vehicle_model.model_id 
        INNER JOIN vehicle_color ON vehicles.color_id = vehicle_color.color_id 
        INNER JOIN vehicle_fueltype ON vehicles.fuelType_id = vehicle_fueltype.fuelType_id 
        INNER JOIN vehicle_safety ON vehicles.safety_id = vehicle_safety.safety_id
        INNER JOIN vehicle_transmission ON vehicles.transmission_id = vehicle_transmission.transmission_id
        INNER JOIN vehicle_seats ON vehicles.seats_id = vehicle_seats.seats_id
        INNER JOIN vehicle_location ON vehicles.location_id = vehicle_location.location_id
        INNER JOIN vehicle_category ON vehicles.category_id = vehicle_category.category_id
        INNER JOIN vehicle_bodytype ON vehicles.bodytype_id = vehicle_bodytype.bodytype_id
        LEFT JOIN favourite ON favourite.vehicle_id = vehicles.vehicle_id AND favourite.user_id = $userId 
        WHERE vehicles.vehicle_id = $vehicleId;";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) == 0) {
    header("Location: productsListing.php");
    exit;
}
$row = mysqli_fetch_array($result);
extract($row);

$year = $row['year'];
$price = $row['price'];
$make = $row['make_id'];
$model = $row['model_id'];
$color = $row['color'];
$fuel = $row['fuelType'];
$engineSize = $row['engine_size'];
$safety = $row['safety_id'];
$main_title = $row['title'];
$subtitle = $row['subtitle'];
$mileage = $row['mileage'];
$seats = $row['seats'];
$rego = $row['rego'];
$bodytype = $row['bodytype'];
$category = $row['category'];
$location = $row['location'];
$favourite = $row['favourite_id'];
$bodytypeId = $row['bodytype_id'];

$vehicleGallery = fetchVehicleImages($vehicleId);
$vehicleSimilarProductsList = fetchSimilarProductsList($userId, $bodytypeId, $vehicleId);



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
    <!-- sidebar filter -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Sidebar -->
                <?php include "sidebarFilter.php" ?>
                <!-- Sidebar -->
            </div>
            <!-- main content -->
            <div class="col-sm-9 mb-5">
                <!-- breadcrumbs -->
                <div class="row">
                    <div class="pull-left col">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="productsListing.php">Buy Car</a></li>
                                <?php 

                                $vehicleId = $_GET['vehicleId'];
                                $query = "SELECT * FROM vehicles WHERE vehicle_id = '$vehicleId'";
                                $result = mysqli_query($link, $query);
                                $row = mysqli_fetch_array($result);
                                $makeId = $row['make_id'];
                                $modelId = $row['model_id'];
                                $makeUrl = "searchMake=$makeId&searchModel=";

                                $queryMake = "SELECT * FROM vehicle_make WHERE make_id = '$makeId'";
                                $resultMake = mysqli_query($link, $queryMake);
                                $rowMake = mysqli_fetch_array($resultMake);
                                $make = $rowMake['make'];

                                $queryModel = "SELECT * FROM vehicle_model WHERE model_id = '$modelId'";
                                $resultModel = mysqli_query($link, $queryModel);
                                $rowModel = mysqli_fetch_array($resultModel);
                                $model = $rowModel['model'];

                                ?>
                                <li class="breadcrumb-item"><a href="productsListing.php?<?= $makeUrl; ?>"><?= $make; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $model; ?></li>

                            </ul>
                                
                        </nav>
                    </div>
                </div>
                <!-- end of breadcrumbs -->
                <!-- main-header -->
                <div class="row">
                    <div class="col main-header ml-3 mt-3">
                        <h4 class="main-title"><?php echo $title ?></h4>
                        <h4 class="model-title"><?php echo $subtitle ?></h6>
                    </div>
                    <div class="price-tag align-items-center  mb-2 mr-5">
                        <h4>$<?php echo number_format($price) ?></h4>
                        <input type="button" value="Book for test drive" class="btn btn-outline-success btn-block mt-3 mb-2" onclick="window.location.href='contact.php?vehicleId=<?php echo $vehicleId ?>'">
                    </div>
                </div>
                <!-- end of main header -->

                <!--Carousel Wrapper-->
                <div class="col mb-5" id="productGallery">
                    <!-- favourite heart icon -->
                    <div class="favourite-wrapper-container">
                        <a href="javascript:;" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $vehicleId ?>">
                            <i class="bi bi-balloon-heart-fill" att="0" style="color: <?php echo $favourite ? "DF4E3C" : "white" ?>; font-size: 40px">
                            </i>
                        </a>
                    </div>
                    <!-- end of favourite heart icon -->

                    <div class="swiffy-slider slider-item-ratio  slider-nav-round slider-nav-autoplay data-slider-nav-autoplay-interval=5000 slider-item-ratio-16x9 slider-nav-autopause slider-nav-nodelay" id="pgallery">
                        <ul class="slider-container">
                            <?php foreach ($vehicleGallery as $key => $vehicleGalleryImage) {
                            ?>

                                <li class="ratio"><img src="admin/vehicles/uploads/<?php echo $vehicleGalleryImage['gallery_img'] ?>" loading="lazy" alt="..." data-bs-toggle="modal" data-bs-target="#productGalleryModal" onclick="imageClick(<?php echo $key ?>)"></li>
                            <?php
                            }
                            ?>
                        </ul>

                        <button type="button" class="slider-nav" aria-label="Go previous"></button>
                        <button type="button" class="slider-nav slider-nav-next" aria-label="Go next"></button>
                    </div>

                    <div class="swiffy-slider slider-nav-dark slider-nav-sm slider-nav-chevron  slider-item-show4 slider-item-snap start slider-item-ratio slider-nav-autopause slider-nav-visible slider-nav-page slider-nav-round  pt-3 d-none d-lg-block">
                        <ul class="slider-container" style="max-width: 100%;height: auto;" id="pgallerythumbs" style="cursor:pointer">
                            <?php foreach ($vehicleGallery as $key => $vehicleGalleryImage) {
                            ?>
                                <li><img src="admin/vehicles/uploads/<?php echo $vehicleGalleryImage['gallery_img'] ?>" loading="lazy" alt="..." onmouseover="thumbHover(<?php echo $key ?>)"></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <button type="button" class="slider-nav" style="max-width: 100%;height: auto;" aria-label="Go previous"></button>
                        <button type="button" class="slider-nav slider-nav-next" style="max-width: 100%;height: auto;" aria-label="Go next"></button>
                    </div>
                </div>
                <!--/.Carousel Wrapper-->
                <div class="row justify-content-between ml-3">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <i class="bi bi-calendar4-event"></i>
                            <span class="icon-text-bi">Reg date</span>
                        </div>
                        <p class="icon-text"><?php echo $rego ?></p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <i class="bi bi-speedometer"></i>
                            <span class="icon-text-bi">Mileage</span>
                        </div>
                        <p class="icon-text"><?php echo $mileage ?> km</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M19.77 7.23l.01-.01-3.72-3.72L15 4.56l2.11 2.11c-.94.36-1.61 1.26-1.61 2.33a2.5 2.5 0 002.5 2.5c.36 0 .69-.08 1-.21v7.21c0 .55-.45 1-1 1s-1-.45-1-1V14c0-1.1-.9-2-2-2h-1V5c0-1.1-.9-2-2-2H6c-1.1 0-2 .9-2 2v16h10v-7.5h1.5v5a2.5 2.5 0 005 0V9c0-.69-.28-1.32-.73-1.77zM12 10H6V5h6v5zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" fill="#000" fill-rule="evenodd">
                                </path>
                            </svg>
                            <span class="icon-text-bi">Fuel type</span>
                        </div>
                        <p class="icon-text"><?php echo $fuel ?></p>
                    </li>
                </div>
                <!-- end of first key features row -->
                <div class="row justify-content-between mt-3 ml-3">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M11.843 2C10.1 2 8.685 3.37 8.685 5.061V18.94c0 1.69 1.414 3.061 3.158 3.061s3.158-1.37 3.158-3.061V5.06c0-1.64-1.332-2.98-3.005-3.057L11.843 2zm0 1.429c.93 0 1.684.73 1.684 1.632V18.94c0 .901-.754 1.632-1.684 1.632-.93 0-1.684-.73-1.684-1.632V5.06c0-.901.754-1.632 1.684-1.632z" fill="#000"></path>
                                <path d="M17.145 12.526H7.486c-.82 0-1.486.562-1.486 1.255v1.702c0 .692.665 1.254 1.486 1.254h9.66c.82 0 1.486-.562 1.486-1.254V13.78c0-.693-.666-1.255-1.487-1.255zM17.579 4.105a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105zM17.579 9.368a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105zM17.579 22a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Transmission</span>
                        </div>
                        <p class="icon-text"><?php echo $transmission ?></p>
                        <p class="icon-text">Rear Wheels</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.113 18.487c.695-.118 1.378.258 1.62.893a4.02 4.02 0 01.225 2.02.718.718 0 01-.72.6H6.762a.718.718 0 01-.72-.601c-.1-.68-.023-1.373.223-2.02.244-.634.926-1.01 1.62-.892a24.7 24.7 0 008.227 0zM14.378 7.489c1.092 0 1.992.784 2.053 1.787l.366 6.103c.059.983-.71 1.842-1.77 1.98a23.9 23.9 0 01-6.055 0c-1.059-.138-1.828-.997-1.769-1.98l.366-6.103c.06-1.003.962-1.787 2.053-1.787h4.756zM14.362 2.101a27.699 27.699 0 00-4.725 0 2.755 2.755 0 00-.418.986C9.082 3.752 9.009 4.424 9 5.1c-.01.753.64 1.382 1.478 1.431 1.014.058 2.03.058 3.044 0 .838-.048 1.487-.677 1.478-1.43a10.665 10.665 0 00-.219-2.013 2.795 2.795 0 00-.42-.986z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Seats</span>
                        </div>
                        <p class="icon-text">Leather, <?php echo $seats ?></p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M14.735 5v1.503l-1.503-.001v.752h2.321c.433 0 .784.375.784.839v.366c.007.563.09 1.14.8 1.156l1.094.021v1.363h1.087V9.636h2.08l.59 2.214.009.05.003.052v4.197l-.003.049-.008.048-.57 2.238h-2.06v-1.489h-1.128v1.782c0 .636-.892.653-1.173.643l-.084-.005H9.49a.42.42 0 01-.261-.09l-.052-.05-1.38-1.54a.838.838 0 00-.524-.272l-.101-.006H6.017c-.543 0-.99-.413-1.043-.942l-.005-.107v-1.642H3.501v1.503H2v-6.01h1.503l-.001 1.502h1.466v-1.097c0-.542.413-.989.942-1.042l.107-.006h1.217a.21.21 0 00.204-.161l.005-.049V8.093c0-.43.303-.785.693-.833l.091-.006h2v-.752H8.725V5h6.01zm.14 3.724H8.912v.682a1.68 1.68 0 01-1.554 1.675l-.125.005h-.796v4.9h.734c.601 0 1.176.235 1.606.65l.113.118 1.067 1.191h6.803v-2.42h3.769v-3.057h-3.769v-1.41l-.142-.02c-1.154-.209-1.646-1.078-1.737-2.208l-.008-.106z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Engine</span>
                        </div>
                        <p class="icon-text"><?php echo $engineSize ?></p>
                    </li>
                </div>
                <!-- end of key features second row -->
                <div class="row justify-content-between mt-3 ml-3">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25 14.625V16.9688C25 17.833 24.4414 18.5312 23.75 18.5312H22.4492C22.1523 20.748 20.6094 22.4375 18.75 22.4375C16.8906 22.4375 15.3477 20.748 15.0508 18.5312H9.94922C9.65234 20.748 8.10938 22.4375 6.25 22.4375C4.39062 22.4375 2.84922 20.748 2.55195 18.5312H1.25C0.559766 18.5312 0 17.833 0 16.9688V11.5C0 10.1768 0.656641 9.04883 1.58438 8.58984L3.21094 3.50928C3.78047 1.72949 5.16016 0.5625 6.69141 0.5625H13.7969C14.9375 0.5625 15.9805 1.20996 16.7266 2.32178L20.6328 8.42383C23.0938 8.77051 25 11.4414 25 14.5811V14.625ZM6.69141 3.6875C6.17969 3.6875 5.72266 4.03418 5.53125 4.66895L4.34766 8.375H8.75V3.6875H6.69141ZM10.625 8.375H17.3984L14.7734 4.27344C14.5391 3.90234 14.1445 3.6875 13.7969 3.6875H10.625V8.375ZM20.5195 18.5312C20.5859 18.2432 20.625 18.0234 20.625 17.75C20.625 16.4561 19.7852 15.4062 18.75 15.4062C17.7148 15.4062 16.875 16.4561 16.875 17.75C16.875 18.0234 16.8789 18.2432 16.9805 18.5312C17.2383 19.4395 17.9336 20.0938 18.75 20.0938C19.5664 20.0938 20.2617 19.4395 20.5195 18.5312ZM8.01953 18.5312C8.08594 18.2432 8.125 18.0234 8.125 17.75C8.125 16.4561 7.28516 15.4062 6.25 15.4062C5.21484 15.4062 4.375 16.4561 4.375 17.75C4.375 18.0234 4.37891 18.2432 4.48047 18.5312C4.73828 19.4395 5.43359 20.0938 6.25 20.0938C7.06641 20.0938 7.76172 19.4395 8.01953 18.5312Z" fill="#000" />
                            </svg>
                            <span class="icon-text-bi">Body Type</span>
                        </div>
                        <p class="icon-text">4 doors, <?php echo $bodytype ?></p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="56" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 64 128 192v384c0 212.1 171.9 384 384 384s384-171.9 384-384V192L512 64zm312 512c0 172.3-139.7 312-312 312S200 748.3 200 576V246l312-110 312 110v330z" />
                                <path d="M378.4 475.1a35.91 35.91 0 0 0-50.9 0 35.91 35.91 0 0 0 0 50.9l129.4 129.4 2.1 2.1a33.98 33.98 0 0 0 48.1 0L730.6 434a33.98 33.98 0 0 0 0-48.1l-2.8-2.8a33.98 33.98 0 0 0-48.1 0L483 579.7 378.4 475.1z" />
                            </svg>
                            <span class="icon-text-bi">Safety Rating</span>
                        </div>
                        <p class="icon-text">
                            <?php
                            for ($i = 0; $i < $safety; $i++) {
                                echo "<i class='bi bi-emoji-smile'></i> ";
                            }
                            ?>
                        </p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                        </div>
                        <p class="icon-text"></p>
                    </li>
                </div>
            </div>
        </div>
        <!-- Product Description -->
        </div>
        <!-- end of key feature description -->
        <!-- end of Product Description -->
        <!-- divider -->
        <div class="clearfix"></div>
        <!-- divider block -->
        <div class="row finance-row mt-2">
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
        <div class="clearfix mt-5"></div>
        <!-- browsing similar vehicles -->
        <div class="container mb-5">
            <div class="browsing-title text-center">
                <h4>Other vehicles you might like</h4>
            </div>
            <div class="d-flex flew-row justify-content-around">
                <?php foreach ($vehicleSimilarProductsList as $key => $vehicleSimilarProduct) {
                ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="card ml-3 card-style">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="admin/vehicles/uploads/<?php echo $vehicleSimilarProduct['img']; ?>" class="card-img" />
                                <div class="card-img-overlay d-flex justify-content-end h-25">
                                    <a href="javascript:" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $vehicleSimilarProduct['vehicle_id'] ?>">
                                        <i class="bi bi-balloon-heart-fill" att="0" style="color:<?php echo $vehicleSimilarProduct['favourite_id'] ? "#DF4E3C" : "white" ?>; font-size: 20px"></i>
                                    </a>
                                </div>
                                <div class="mask">
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <span class="product-location" ><?php echo $vehicleSimilarProduct['location'] ?></span>
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
                                    <h5 class="card-title mb-3"><?php echo htmlentities($vehicleSimilarProduct['title']); ?></h5>
                                </div>
                                <div class="text-reset">
                                    <p class="product-description"><?php echo htmlentities($vehicleSimilarProduct['subtitle']); ?></p>
                                    <span class="product-text-mileage"><?php echo htmlentities($vehicleSimilarProduct['mileage']) ?>km</span>
                                    <span class="product-text-reg"><?php echo htmlentities($vehicleSimilarProduct['rego']) ?> </span>
                                </div>
                                <h6 class="mt-3 mb-3"><b>$<?php echo number_format($vehicleSimilarProduct['price']) ?></b></h6>
                            </div>
                            <a class="btn btn-outline-success mb-3 w-90 ml-3 mr-3" href='productDetail.php?vehicleId=<?php echo htmlentities($vehicleSimilarProduct['vehicle_id']); ?>'><i class="bi bi-eye pr-2"></i> View This Car</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
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
                <a type="button" class="btn btn-outline-success info-btn"  href="https://motorvehiclefinance.co.nz/?utm_source=google&utm_medium=cpc&utm_campaign=Search+-+Competitors&utm_content=Mtf+Car+Finance&utm_term=mtf%20car%20finance&utm_campaign=&utm_source=adwords&utm_medium=ppc&hsa_acc=4530153230&hsa_cam=10091857667&hsa_grp=128445689234&hsa_ad=537068815657&hsa_src=g&hsa_tgt=kwd-311279703747&hsa_kw=mtf%20car%20finance&hsa_mt=e&hsa_net=adwords&hsa_ver=3&gclid=Cj0KCQjw8_qRBhCXARIsAE2AtRYhOXSkeiCaQy9hIu5-EMobYUcSZUnjx1KBi0o8LBQS9pKmJ700o0QaAnWVEALw_wcB" target="_blank">More info <i class="bi bi-plus-square"></i></a>
            </div>
        </div>
        <!-- end of car financing block -->
    </section>
    <?php include "footer.php" ?>
    <div class="clearfix"></div>
    <script src="js/carousel-slider.js" type="text/javascript"></script>
    <script src="js/vehicle.js" type="text/javascript"></script>
</body>

</html>