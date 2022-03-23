<div class="row">
                    <div class="pull-left col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="productsListing.php">Buy Car</a></li>
                                <?php 

                                $vehicleId = $_GET['vehicleId'];
                                $query = "SELECT * FROM vehicles WHERE vehicle_id = '$vehicleId'";
                                $result = mysqli_query($link, $query);
                                $row = mysqli_fetch_array($result);
                                $makeId = $row['make_id'];
                                $modelId = $row['model_id'];
                                $makeUrl = "searchMake=$makeId&searchModel=&searchLocation=&minPrice=&maxPrice=&searchFueltype=&minManufacturedYear=&maxManufacturedYear=&minMileage=&maxMileage=&searchTransmission=&searchColor=&sesarchBodytype=&searchSeats=&orderBy=vehicles.price+ASC&filterSearch=";

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
                            </ol>
                        </nav>
                    </div>
                </div>