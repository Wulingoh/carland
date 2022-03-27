<?php
include "config.php";
include "returnPage.php";
include "queryHelpers.php";

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = 0;
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
                            Browse our wide range of high-quality new vehicles. Whether you’re
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
                            <?php echo $result->num_rows ?> vehicles
                        </p>
                    </div>
                    <!-- end of result count -->
                    <!-- sort style page -->
                    <div class="col-3 offset-md-3 sort-style-page">
                        <span class="sort-style-text">
                            Sort by
                        </span>
                        <label class="sort-style-label">
                            <form method="GET" id="orderBy">
                                <div class="sort-select-option">
                                <!--to merge search filter with sorting box, not good, should use other way to do it-->
                                <input type="hidden" name="searchMake" value="<?= isset($_GET['searchMake']) && $_GET['searchMake']; ?>">
                                <input type="hidden" name="searchModel" value="<?= isset($_GET['searchModel']) && $_GET['searchModel']; ?>"> 
                                <input type="hidden" name="searchLocation" value="<?= isset($_GET['searchLocation']) && $_GET['searchLocation']; ?>">
                                <input type="hidden" name="minPrice" value="<?= isset($_GET['minPrice']) && $_GET['minPrice']; ?>">
                                <input type="hidden" name="maxPrice" value="<?= isset($_GET['maxPrice']) && $_GET['maxPrice']; ?>">
                                <input type="hidden" name="searchFueltype" value="<?= isset($_GET['searchFueltype']) && $_GET['searchFueltype']; ?>">
                                <input type="hidden" name="minMileage" value="<?= isset($_GET['minMileage']) && $_GET['minMileage']; ?>">
                                <input type="hidden" name="maxMileage" value="<?= isset($_GET['maxMileage']) && $_GET['maxMileage']; ?>">
                                <input type="hidden" name="searchTransmission" value="<?= isset($_GET['searchTransmission']) && $_GET['searchTransmission']; ?>">
                                <input type="hidden" name="searchColor" value="<?= isset($_GET['searchColor']) && $_GET['searchColor']; ?>">
                                <input type="hidden" name="searchBodytype" value="<?= isset($_GET['searchBodytype']) && $_GET['searchBodytype']; ?>">
                                <input type="hidden" name="searchSeats" value="<?= isset($_GET['searchSeats']) && $_GET['searchSeats']; ?>">
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
                                        <option value="vehicles.created_at DESC" window.location.productsListing 
                                            <?php if($orderBy == 'vehicles.created_at DESC'){
                                                echo "selected";
                                            } 
                                            ?>
                                        >Recently Added
                                        </option>
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
                        $path =  "productsListing.php";
                        $rowsPerPage = 10;
                        $pagingLink = getPagingLink($query, $path, $rowsPerPage, $searchUrl);
                        $resultP = mysqli_query($link, getPagingQuery($query, $rowsPerPage));
                        while($row = $resultP->fetch_assoc()) {
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
                                            <div href="#">
                                                <span class="product-location"><?php echo $row['location'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div href="" class="text-reset">
                                        <h5 class="card-title mb-3"><?php echo htmlentities($row['title']); ?></h5>
                                    </div>
                                    <div href="" class="text-reset">
                                        <p class="product-description"><?php echo htmlentities($row['subtitle']); ?></p>
                                        <span class="product-text-mileage"><?php echo htmlentities($row['mileage']) ?>km</span>
                                        <span class="product-text-reg"><?php echo htmlentities($row['rego']) ?> </span>
                                    </div>
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
                        <div class="col">
                        <h3 style="text-align:center">
                            <?php echo $pagingLink; // display paging links ?>
                        </h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mb-5"></div>
    </section>
    <?php include "footer.php" ?>

    <div class="clearfix"></div>
    <script src="js/sideBar.js" type="text/javascript"></script>
    <script src="js/vehicle.js" type="text/javascript"></script>
</body>

</html>