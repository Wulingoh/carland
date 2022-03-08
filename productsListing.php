<?php 
include "config.php";
include "returnPage.php";

$orderBy = "cars.Price ASC";
if(isset($_GET["orderBy"])) {
    $orderBy = $_GET['orderBy'];
}

$query = "SELECT * FROM `cars`INNER JOIN car_make ON cars.make_ID = car_make.make_ID INNER JOIN car_model ON cars.model_ID = car_model.model_ID INNER JOIN car_color ON cars.color_ID = car_color.color_ID INNER JOIN car_fueltype ON cars.fuelType_ID = car_fueltype.fuelType_ID INNER JOIN car_safety ON cars.safety_ID = car_safety.safety_ID ORDER BY $orderBy;";

$result = mysqli_query($link, $query) or die(mysqli_error($link));


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
                        <h4 class="main-title">Carland Cars</h4>
                        <p class="main-content">
                            Browse our wide range of high-quality new and <a href="#">used cars</a>. Whether you’re
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
                    <div class="col-4 sort-style-page btn-group btn-group-toggle" data-toggle="buttons" >
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
                                    <select name="orderBy" onchange='submitSelectpicker()'class="selectpicker" data-width="150px">
                                        <option value="cars.Price ASC" 
                                        window.location.productsListing <?php if($orderBy == 'cars.Price ASC'){ echo "selected"; } ?>
                                        >Lowest Price</option>
                                        <option value="cars.Price DESC"
                                        window.location.productsListing <?php if($orderBy == 'cars.Price DESC'){ echo "selected"; } ?>
                                        >Highest Price</option>
                                        <option value="">Recently Added</option>
                                        <option value="cars.Mileage DESC">Highest Mileage</option>
                                        <option value="cars.Mileage ASC">Lowest Mileage</option>
                                    </select>
                                </div>
                            </form>
                            
                        </label>
                    </div>
                    <!-- end of sort style page -->
                </div>
                <!-- end of sort style page row -->
                <?php
                while ($row = mysqli_fetch_array($result)){
                $carId = $row['car_ID'];
                ?>
                <div class="row product-list no-gutters">
                    <div class="col-lg-4 col-md-12">
                        <div class="card ml-3 card-style">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                                <div class="card-img-overlay d-flex justify-content-end h-25">
                                    <a href="javascript:" class="favourite-heart btn btn-default" name="addToFavourite" id="favouriteBtn" data-carid="<?php echo $row['car_ID'] ?>">
                                        <i class="bi bi-balloon-heart-fill" att="0" style="<?php echo $favourite ?"DF4E3C":"white"?> font-size: 20px"></i>
                                    </a>
                                </div>
                                <div class="mask">
                                    <div class="d-flex justify-content-end">
                                        <a href="#">
                                            <span class="product-location">Christchurch</span>
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
                                    <h5 class="card-title mb-3"><?php echo $row['car_title']; ?></h5>
                                </a>
                                <a href="" class="text-reset">
                                    <p class="product-description"><?php echo $row['car_subtitle']; ?></p>
                                    <span class="product-text-mileage">28,650km</span>
                                    <span class="product-text-reg">2017 reg</span>
                                </a>
                                <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                            </div>
                            <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3" onclick="window.location.href='productDetail.php?carID=<?php echo $row['car_ID']; ?>'"><i class="bi bi-eye pr-2"></i> View This Car</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="card ml-3 card-style">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                                <div class="card-img-overlay d-flex justify-content-end h-25">
                                    <a href="#" class="card-link text-danger like">
                                        <i class="bi bi-heart"></i>
                                    </a>
                                </div>
                                <div class="mask">
                                    <div class="d-flex justify-content-end">
                                        <a href="#">
                                            <span class="product-location">Christchurch</span>
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
                                    <h5 class="card-title mb-3">BMW 3 Series</h5>
                                </a>
                                <a href="" class="text-reset">
                                    <p class="product-description">2L M Sport Shadow Edition 320d</p>
                                    <span class="product-text-mileage">28,650km</span>
                                    <span class="product-text-reg">2017 reg</span>
                                </a>
                                <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                            </div>
                            <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3"><i class="bi bi-eye pr-2"></i> View This Car</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card ml-3 card-style">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                                <div class="card-img-overlay d-flex justify-content-end h-25">
                                    <a href="#" class="card-link text-danger like">
                                        <i class="bi bi-heart"></i>
                                    </a>
                                </div>
                                <div class="mask">
                                    <div class="d-flex justify-content-end">
                                        <a href="#">
                                            <span class="product-location">Christchurch</span>
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
                                    <h5 class="card-title mb-3">BMW 3 Series</h5>
                                </a>
                                <a href="" class="text-reset">
                                    <p class="product-description">2L M Sport Shadow Edition 320d</p>
                                    <span class="product-text-mileage">28,650km</span>
                                    <span class="product-text-reg">2017 reg</span>
                                </a>
                                <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                            </div>
                            <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3"><i class="bi bi-eye pr-2"></i> View This Car</a>
                        </div>
                    </div>
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