<?php
include "config.php";
include "returnPage.php";

$orderBy = "vehicles.price ASC";
if (isset($_GET["orderBy"])) {
    $orderByOption = array("vehicles.price ASC", "vehicles.price DESC", "vehicles.mileage DESC", "vehicles.mileage ASC");
    $orderByKey = array_search($_GET["orderBy"], $orderByOption);
    $orderBy = $orderByOption[$orderByKey];
}
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = 0;
}
$query = "SELECT vehicles.vehicle_id, img, price, year, mileage, engine_size, detail, rego, category, bodytype, fuelType, vehicle_make.make_id, vehicle_model.model_id, vehicle_transmission.transmission, color, seats, vehicle_safety.safety_id, vehicle_location.location, title, subtitle,favourite_id 
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
ORDER BY $orderBy;";

$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <?php
    include "navigation.php"
    ?>
    <!-- sidebar filter -->
    <section class="">
        <div class="row p-0 ml-0 mr-0">
            <div class="col-3">
                <!-- Sidebar -->
               <?php include "sidebarFilter.php" ?>
                <!-- Sidebar -->
            </div>
            <!-- main content -->
            <div class="col-sm-9">
                <!-- breadcrumbs -->
                <div class="row">
                    <div class="pull-left col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buy Car</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end of breadcrumbs -->
                <!-- main-header -->
                <div class="row">
                    <div class="col main-header ml-3">
                        <h4 class="main-title">Carland vehicles</h4>
                        <p class="main-content">
                            Browse our wide range of high-quality new and <a href="#">used vehicles</a>. Whether you’re
                            buying, financing or subscribing, you can complete your purchase entirely online and choose
                            home delivery or collection from a Carland Customer Centre. For total peace of mind, every
                            car comes with a 7-Day Money Back Guarantee.
                        </p>
                    </div>
                </div>
                <!-- end of main header -->
                <!-- sort style page row -->
                <div class="row row-main-sort no-gutters">
                    <!-- result count -->
                    <div class="col-2 sort-style-page">
                        <p class="result-count">
                            1 - 48 of 5,813 results
                        </p>
                    </div>
                    <!-- end of result count -->
                    <!-- sort style page -->
                    <div class="col-4 sort-style-page btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary" for="option1">All
                            <input type="radio" class="btn-check" name="all" id="option1" autocomplete="off" checked />
                        </label>
                        <label class="btn btn-secondary" for="option2">New
                            <input type="radio" class="btn-check" name="new" id="option2" autocomplete="off" />
                        </label>
                        <label class="btn btn-secondary" for="option3">Used
                            <input type="radio" class="btn-check" name="used" id="option3" autocomplete="off" />
                        </label>
                    </div>
                    <div class="col-3 offset-md-3 sort-style-page">
                        <span class="sort-style-text">
                            Sort by
                        </span>
                        <label class="sort-style-label">
                            <form method="GET" id="orderBy">
                                <div class="sort-select-option">
                                <!--to merge search filter with sorting box, not good, should use other way to do it-->
                                <input type="hidden" name="searchMake" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchMake']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchModel" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchModel']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchLocation" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchLocation']; ?>" <?php endif; ?>>
                                <input type="hidden" name="minPrice" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['minPrice']; ?>" <?php endif; ?>>
                                <input type="hidden" name="maxPrice" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['maxPrice']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchFueltype" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchFueltype']; ?>" <?php endif; ?>>
                                <input type="hidden" name="minManufacturedYear" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['minManufacturedYear']; ?>" <?php endif; ?>>
                                <input type="hidden" name="maxManufacturedYear" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['maxManufacturedYear']; ?>" <?php endif; ?>>
                                <input type="hidden" name="minMileage" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['minMileage']; ?>" <?php endif; ?>>
                                <input type="hidden" name="maxMileage" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['maxMileage']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchTransmission" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchTransmission']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchColor" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchColor']; ?>" <?php endif; ?>>
                                <input type="hidden" name="sesarchBodytype" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['sesarchBodytype']; ?>" <?php endif; ?>>
                                <input type="hidden" name="searchSeats" <?php if(isset($_GET['filterSearch'])): ?> value="<?= $_GET['searchSeats']; ?>" <?php endif; ?>>
                                <input type="hidden" name="filterSearch" <?php if(isset($_GET['filterSearch'])): ?> value=" " <?php endif; ?>>
                                <!--to merge search filter with sorting box, not good, should use other way to do it-->
                                    <select name="orderBy" onchange='submitSelectpicker()' class="selectpicker" data-width="150px">
                                        <option value="vehicles.price ASC" window.location.productsListing
                                            <?php if ($orderBy == 'vehicles.price ASC') {
                                                echo "selected";
                                            } 
                                            ?>
                                        >Lowest Price
                                        </option>
                                        <option value="vehicles.price DESC" window.location.productsListing 
                                            <?php if ($orderBy == 'vehicles.price DESC') {
                                                echo "selected";
                                            } 
                                            ?>
                                        >Highest Price
                                        </option>
                                        <option value="">Recently Added</option>
                                        <option value="vehicles.mileage DESC" window.location.productsListing
                                            <?php if($orderBy == 'vehicles.mileage DESC'){
                                                echo "selected";
                                            } 
                                            ?>
                                        >Highest Mileage
                                        </option>
                                        <option value="vehicles.mileage ASC" window.location.productsListing 
                                            <?php if($orderBy == 'vehicles.mileage ASC'){
                                                echo "selected";
                                            } 
                                            ?>
                                        >Lowest Mileage
                                        </option>
                                    </select>
                                </div>
                            </form>
                         
                        </label>
                        
                        
                    </div>
                    <!-- end of sort style page -->
                </div>
                <!-- end of sort style page row -->
                <div class="row product-list no-gutters">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $vehicleId = $row['vehicle_id'];
                    ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="card ml-3 card-style">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img src="admin/vehicles/uploads/<?php echo $row['img']; ?>" class="card-img" />
                                    <div class="card-img-overlay d-flex justify-content-end h-25">
                                        <a href="javascript:" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $row['vehicle_id'] ?>">
                                            <i class="bi bi-balloon-heart-fill" att="0" style="color:<?php echo $row['favourite_id'] ? "#DF4E3C" : "white" ?>; font-size: 20px"></i>
                                        </a>
                                    </div>
                                    <div class="mask">
                                        <div class="d-flex justify-content-end">
                                            <a href="#">
                                                <span class="product-location"><?php echo $row['location'] ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="" class="text-reset">
                                        <h5 class="card-title mb-3"><?php echo htmlentities($row['title']); ?></h5>
                                    </a>
                                    <a href="" class="text-reset">
                                        <p class="product-description"><?php echo htmlentities($row['subtitle']); ?></p>
                                        <span class="product-text-mileage"><?php echo htmlentities($row['mileage']) ?>km</span>
                                        <span class="product-text-reg"><?php echo htmlentities($row['rego']) ?> </span>
                                    </a>
                                    <h6 class="mt-3 mb-3"><b>$<?php echo number_format($row['price']) ?></b></h6>
                                </div>
                                <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3" onclick="window.location.href='productDetail.php?vehicleId=<?php echo htmlentities($row['vehicle_id']); ?>'"><i class="bi bi-eye pr-2"></i> View This Car</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- pagination -->
            <div class="container-fluid mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center pagination-style">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="First">
                                        <span aria-hidden="true"><i class="bi bi-chevron-bar-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="bi bi-chevron-compact-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">20</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="bi bi-chevron-compact-right"></i></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="End">
                                        <span aria-hidden="true"><i class="bi bi-chevron-bar-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
    </section>
    <?php include "footer.php" ?>

    <div class="clearfix"></div>
    <script src="js/sideBar.js" type="text/javascript"></script>
    <script src="js/vehicle.js" type="text/javascript"></script>
</body>

</html>