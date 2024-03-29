<?php
// *************************search filter query section****************************
$searchUrl = "";
$filter = array();
$searchUrl = "";

if (isset($_GET['searchMake']) && $_GET['searchMake']) {

    $make_id = $_GET['searchMake'];
    $query = "SELECT * FROM vehicle_make WHERE make_id = '$make_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $make = $row['make'];
    $filter[] = " make = '$make'";
    $searchUrl = $searchUrl . "&searchMake=" . $_GET['searchMake'];
}
if (isset($_GET['searchModel']) && $_GET['searchModel']) {
    $model_id = $_GET['searchModel'];
    $query = "SELECT * FROM vehicle_model WHERE model_id = '$model_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $model = $row['model'];
    $filter[] = " model = '$model'";
    $searchUrl = $searchUrl . "&searchModel=" . $_GET['searchModel'];
}
if (isset($_GET['searchLocation']) && $_GET['searchLocation']) {
    $location_id = $_GET['searchLocation'];
    $query = "SELECT * FROM vehicle_location WHERE location_id = '$location_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $location = $row['location'];
    $filter[] = "location = '$location'";
    $searchUrl = $searchUrl . "&searchLocation=" . $_GET['searchLocation'];
}
if (isset($_GET['minPrice']) && $_GET['minPrice']) {
    $minprice = $_GET['minPrice'];
    $filter[] = "price > $minprice";
    $searchUrl = $searchUrl . "&minPrice=" . $_GET['minPrice'];
}
if (isset($_GET['maxPrice']) && $_GET['maxPrice']) {
    $maxprice = $_GET['maxPrice'];
    $filter[] = "price < $maxprice";
    $searchUrl = $searchUrl . "&maxPrice=" . $_GET['maxPrice'];
}


if (isset($_GET['searchFueltype']) && $_GET['searchFueltype']) {
    $fueltype_id = $_GET['searchFueltype'];
    $query = "SELECT * FROM vehicle_fueltype WHERE fueltype_id = '$fueltype_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $fueltype = $row['fueltype'];
    $filter[] = "fueltype = '$fueltype'";
    $searchUrl = $searchUrl . "&searchFuelType=" . $_GET['searchFueltype'];
}
    if (isset($_GET['minManufacturedYear']) && $_GET['minManufacturedYear']){
    $minyear = $_GET['minManufacturedYear'];
    $filter[] = "year > $minyear"; 
    $searchUrl = $searchUrl . "&minManufacturedYear=" . $_GET['minManufacturedYear'];

}
if (isset($_GET['maxManufacturedYear']) && $_GET['maxManufacturedYear']){
    $maxyear = $_GET['maxManufacturedYear'];
    $filter[] = "year < $maxyear ";
    $searchUrl = $searchUrl . "&maxManufacturedYear=" . $_GET['maxManufacturedYear']; 

}
if (isset($_GET['minMileage']) && $_GET['minMileage']) {
    $minmile = $_GET['minMileage'];
    $filter[] = "mileage > $minmile";
    $searchUrl = $searchUrl . "&minMileage=" . $_GET['minMileage'];
}
if (isset($_GET['maxMileage']) && $_GET['maxMileage']) {
    $maxmile = $_GET['maxMileage'];
    $filter[] = "mileage < $maxmile ";
    $searchUrl = $searchUrl . "&maxMileage=" . $_GET['maxMileage'];
}
if (isset($_GET['searchTransmission']) && $_GET['searchTransmission']) {
    $transmission_id = $_GET['searchTransmission'];
    $query = "SELECT * FROM vehicle_transmission WHERE transmission_id = '$transmission_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $transmission = $row['transmission'];
    $filter[] = "transmission = '$transmission'";
    $searchUrl = $searchUrl . "&searchTransmission=" . $_GET['searchTransmission'];
}
if (isset($_GET['searchColor']) && $_GET['searchColor']) {
    $color_id = $_GET['searchColor'];
    $query = "SELECT * FROM vehicle_color WHERE color_id = '$color_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $color = $row['color'];
    $filter[] = "color = '$color'";
    $searchUrl = $searchUrl . "&searchColor=" . $_GET['searchColor'];
}
if (isset($_GET['searchBodytype']) && $_GET['searchBodytype']) {
    $bodytype_id = $_GET['searchBodytype'];
    $query = "SELECT * FROM vehicle_bodytype WHERE bodytype_id = '$bodytype_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $bodytype = $row['bodytype'];
    $filter[] = "bodytype = '$bodytype'";
    $searchUrl = $searchUrl . "&searchBodytype=" . $_GET['searchBodytype'];
}
if (isset($_GET['searchSeats']) && $_GET['searchSeats']) {
    $seats_id = $_GET['searchSeats'];
    $query = "SELECT * FROM vehicle_seats WHERE seats_id = '$seats_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $seats = $row['seats'];
    $filter[] = "seats = '$seats'";
    $searchUrl = $searchUrl . "&searchSeats=" . $_GET['searchSeats'];
}

if (count($filter) == 0) {
    $filter[] = "1=1";
}

$orderBy = "vehicles.price ASC";
if (isset($_GET["orderBy"])) {
    $orderByOption = array("vehicles.price ASC", "vehicles.price DESC", "vehicles.created_at DESC", "vehicles.mileage DESC", "vehicles.mileage ASC");
    $orderByKey = array_search($_GET["orderBy"], $orderByOption);
    $orderBy = $orderByOption[$orderByKey];
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
        WHERE
        ";

$query .= implode(" && ", $filter);

$query .= " ORDER BY $orderBy";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>
<script>
    $(document).ready(function() {
        $('#searchMake').on('change', function() {
            var makeId = $(this).val();
            if (makeId) {
                $.ajax({
                    type: 'POST',
                    url: 'admin/vehicles/displayModel.php',
                    data: 'make_id=' + makeId,
                    success: function(html) {
                        $('#searchModel').html(html);

                    }

                });
            } else {
                $('#searchModel').html('<option value="">Select make first</option>');
            }

        });
    });
</script>
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="sidebar-wrapper">
        <nav class="navbar sidebar-header">
            <div class="row">
                <div class="col">
                    <h4>Filters</h4>
                </div>
                <div class="col-9"><a href="productsListing.php">Reset Filter</a></div>
            </div>
        </nav>
        <form method="GET" action="productsListing.php">
            <div class="list-group list-group-flush mt-4">
                <!-- Collapse 1 -->
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#make" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Make & Model</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="make" class="collapse list-group list-group-flush">
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
                                            <option value="<?= $make_id; ?>" <?php if (isset($_GET['filterSearch'])) {if ($_GET['searchMake'] == $make_id) {echo "selected"; }} ?>><?= $make; ?></option>
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
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#location" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Location</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="location" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content ml-5">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="searchLocation" id="searchLocation">
                                        <option value="">Any</option>
                                        <?php
                                        $queryLocation = "SELECT * FROM vehicle_location";
                                        $resultLocation  = mysqli_query($link, $queryLocation);
                                        while($rowLocation = mysqli_fetch_array($resultLocation)){
                                            extract($rowLocation);
                                            ?>
                                            <option value="<?= $rowLocation['location_id']; ?>"
                                              <?php if(isset($_GET['filterSearch'])){
                                                  if($_GET['searchLocation'] == $rowLocation['location_id']){
                                                        echo "selected";
                                                  }
                                              } ?>
                                            ><?= $rowLocation['location']; ?></option>
                                            <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#price" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Price</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="price" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">
                                <span class="sidebar-text">From</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="minPrice">
                                        <option value="">Any</option>
                                        <?php
                                        $price = 0;
                                        while ($price < 200000) {
                                            $price = $price + 10000;
                                        ?>
                                            <option value="<?= $price; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['minPrice'] == $price) {echo 'selected';} ?>>$<?= number_format($price); ?></option>
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
                                <span class="sidebar-text">To</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="maxPrice">
                                        <option value="">Any</option>
                                        <?php
                                        $price = 0;
                                        while ($price < 200000) {
                                            $price = $price + 10000;
                                        ?>
                                            <option value="<?= $price; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['maxPrice'] == $price) {echo 'selected';} ?>>$<?= number_format($price); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#fueltype" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Fuel Type</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="fueltype" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option ml-5">
                                    <select class="selectpicker sidebar-selectpicker" name="searchFueltype" id="searchFueltype">
                                        <option value="">Any</option>
                                        <?php
                                        $queryFuel = "SELECT * FROM vehicle_fueltype";
                                        $resultFuel  = mysqli_query($link, $queryFuel);
                                        while ($rowFuel = mysqli_fetch_array($resultFuel)) {
                                            extract($rowFuel);
                                        ?>
                                            <option value="<?= $rowFuel['fueltype_id']; ?>" <?php if (isset($_GET['filterSearch'])) {if ($_GET['searchFueltype'] == $rowFuel['fueltype_id']) {echo "selected";}} ?>><?= $rowFuel['fueltype']; ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#year" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Year</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="year" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">
                                <span class="sidebar-text">From</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="minManufacturedYear">
                                        <option value="">Any</option>
                                        <?php
                                        $year = 1980;
                                        while ($year < 2020) {
                                            $year = $year + 10;
                                        ?>
                                        <option value="<?= $year; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['minManufacturedYear'] == $year) {echo 'selected';} ?>><?= $year; ?></option>
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
                                <span class="sidebar-text">To</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="maxManufacturedYear">
                                        <option value="">Any</option>

                                        <?php
                                        $year = 1980;
                                        while ($year < 2020) {
                                            $year = $year + 10;
                                        ?>
                                            <option value="<?= $year; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['maxManufacturedYear'] == $year) {echo 'selected';} ?>><?= $year; ?></option>
                                        <?php
                                        }
                                        ?>
                                        <option value="<?php echo date('Y'); ?>" <?php if (isset($_GET['filterSearch']) && $_GET['maxManufacturedYear'] == date('Y')) {echo 'selected';} ?>>Current Year</option>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#mileage" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Mileage</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="mileage" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">
                                <span class="sidebar-text">From</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="minMileage">
                                        <option value="">Any</option>
                                        <?php
                                        $mileage = 0;
                                        while ($mileage < 200000) {
                                            $mileage = $mileage + 10000;
                                        ?>
                                            <option value="<?= $mileage; ?>" 
                                            <?php if (isset($_GET['filterSearch']) && $_GET['minMileage'] == $mileage) { echo 'selected';} ?>><?= number_format($mileage); ?>km</option>
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
                                <span class="sidebar-text">To</span>
                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="maxMileage">
                                        <option value="">Any</option>

                                        <?php
                                        $mileage = 0;
                                        while ($mileage < 200000) {
                                            $mileage = $mileage + 10000;
                                        ?>
                                            <option value="<?= $mileage; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['maxMileage'] == $mileage) {echo 'selected';} ?>><?= number_format($mileage); ?>km</option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#transmission" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Transmission</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="transmission" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option ml-5">
                                    <select class="selectpicker sidebar-selectpicker" name="searchTransmission">
                                        <option value="">Any</option>

                                        <?php
                                        $queryT = "SELECT * FROM vehicle_transmission";
                                        $resultT = mysqli_query($link, $queryT);
                                        foreach ($resultT as $rowT) // try different way to fetch the row array
                                        {
                                        ?>
                                            <option value="<?= $rowT['transmission_id']; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['searchTransmission'] == $rowT['transmission_id']) : ?> selected <?php endif; ?>><?= $rowT['transmission']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#color" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Color</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="color" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option ml-5">
                                    <select class="selectpicker sidebar-selectpicker" name="searchColor">
                                        <option value="">Any</option>
                                        <?php
                                        $queryC = "SELECT * FROM vehicle_color";
                                        $resultC = mysqli_query($link, $queryC);
                                        foreach ($resultC as $rowC) {
                                        ?>
                                            <option value="<?= $rowC['color_id']; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['searchColor'] == $rowC['color_id']) : ?> selected <?php endif; ?>><?= $rowC['color']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#bodytype" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Body Type</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="bodytype" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content ml-5">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option">
                                    <select class="selectpicker sidebar-selectpicker" name="searchBodytype">
                                        <option value="">Any</option>
                                        <?php
                                        $queryB = "SELECT * FROM vehicle_bodytype";
                                        $resultB = mysqli_query($link, $queryB);
                                        foreach ($resultB as $rowB) {
                                        ?>
                                            <option value="<?= $rowB['bodytype_id']; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['searchBodytype'] == $rowB['bodytype_id']) : ?> selected <?php endif; ?>><?= $rowB['bodytype']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>


                <a class="list-group-item list-group-item-action py-2 ripple collapsed" aria-current="true" data-toggle="collapse" href="#seats" aria-expanded="true" aria-controls="collapseExample2" role="button">
                    <span>Seats</span>
                    <i class="bi bi-chevron-compact-down rotate-icon"></i>
                </a>
                <ul id="seats" class="collapse list-group list-group-flush">
                    <li class="list-group-item py-1">
                        <div class="sidebar-inner-content">
                            <label class="sidebar-style-label">

                                <div class="sidebar-select-option ml-5">
                                    <select class="selectpicker sidebar-selectpicker" name="searchSeats">
                                        <option value="">Any</option>
                                        <?php
                                        $queryS = "SELECT * FROM vehicle_seats";
                                        $resultS = mysqli_query($link, $queryS);
                                        foreach ($resultS as $rowS) {
                                        ?>
                                            <option value="<?= $rowS['seats_id']; ?>" <?php if (isset($_GET['filterSearch']) && $_GET['searchSeats'] == $rowS['seats_id']) : ?> selected <?php endif; ?>><?= $rowS['seats']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="orderBy" value="<?= $orderBy; ?>">
            <nav class="navbar sidebar-footer justify-content-center">
                <button type="submit" class="btn" name="filterSearch" style="background:#2B6777 ;color:white;width:100%;">Search Car</button>
            </nav>
        </form>
    </div>
</nav>