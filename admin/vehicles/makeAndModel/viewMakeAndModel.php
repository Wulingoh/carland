<?php
include_once "../../../config.php";
// include "../../lib/image-creation.php";
include  "../../../queryHelpers.php";



$makeId = $_GET['makeId'];
$query = "SELECT make_id, make, brand_logo FROM vehicle_make WHERE make_id = '$makeId'";

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
    <title>Carland/Vehicle Management/View Vehicles</title>
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
                        <li class="breadcrumb-item active" aria-current="page">View Make And Model</li>
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
                            <a href="../users/addUser.php" style="text-decoration: none;color:black;"> Add new user</a>
                        </h6>
                    </div>
                    <hr>

                    <div class="row">

                        <div class="col mb-3">
                            <a href="index.php" style="text-decoration: none;color:black">
                                <h5><b>Vehicle Management</b></h5>
                            </a>
                        </div>
                        <div class="col-2">
                            <a data-toggle="collapse" href="#collapseVehicle" href="addVehicle.php" role="button" onclick="arrowChange2()" aria-expanded="false" aria-controls="collapseVehicle">
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
                <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
                    <div class="row">
                        <div class="col">
                            <h4>View Make and Model Details</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col">
                            <h3>Make:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $makeId = $row['make_id'];
                            $make = $row['make'];
                            $brandLogo = $row['brand_logo'];
                            $fetchModelList = fetchModelList($makeId);
                        ?>
                            <div class="col-5">
                                <h5><b><?php echo $make; ?></b></h5>
                            </div>
                            <div class="col">
                                <a href="../vehicles/makeAndModel/editMakeAndModel.php?makeId=<?php echo $makeId; ?>"><i class="bi bi-pencil-fill"></i>&nbsp;&nbsp;Edit</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>

                    <div class="row">
                        <img class="img-fluid" src="../vehicles/uploads/<?php echo $brandLogo; ?>" width="300" />
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col">
                            <h3>Model:</h3>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul> 
                            <?php foreach ($fetchModelList as $key => $modelList) {
                            ?>
                                <li>
                                <?php echo $modelList['model']; ?>
                                </li>
                                <?php 
                                }
                                ?>
                            </ul> 
                        </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>