<?php
include_once "../../../config.php";
include "../../../lib/image-creation.php";
include  "../../../queryHelpers.php";




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland/Vehicle Management</title>
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

        function deleteVehicle(vehicleId) {
            if (confirm("Are you sure you want to delete this Vehicle?")) {
                window.location.href = "../vehicles/deleteVehicle.php?vehicleId=" + vehicleId;
            }

        }

        $(document).ready(function() {
            $("#carSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#carTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
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
                        <li class="breadcrumb-item active" aria-current="page">Vehicle Management</li>
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

                        <div class="col">
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
                        <div class="col p-0">
                            <h4>Make And Model</h4>
                        </div>
                        <div class="col-4">
                            <button type="button" style="color:white;background-color: #2B6777;" class="btn" onclick="document.location='addMakeAndModel.php'">Add Make and Model</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-hover " style="font-size: 12px;">
                            <thead style="background-color: #2B6777;color:white;">
                                <tr>
                                    <th scope="col">Make</th>
                                    <th scope="col">Brand Logo</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <?php
                            $query = "SELECT * FROM vehicle_make ";
                            $result = mysqli_query($link, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                extract($row);
                                $makeId = $row['make_id'];
                                $make = $row['make'];
                                $brandLogo = $row['brand_logo'];

                                $fetchModelList = fetchModelList($makeId);
                            ?>
                                <tbody id="carTable">
                                    <tr>
                                        <td><?php echo $make; ?></td>
                                        <td><img src="../vehicles/uploads/<?php echo $brandLogo; ?>" width="100" class="img-fluid"></td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <a href="../vehicles/makeAndModel/viewMakeAndModel.php?makeId=<?php echo $makeId; ?>">View</a> &nbsp;&nbsp;&nbsp;
                                            <a href="../vehicles/makeAndModel/editMakeAndModel.php?makeId=<?php echo $makeId; ?>">Edit</a> &nbsp;&nbsp;&nbsp;
                                            <a href="javascript:deleteMakeAndModel(<?php echo $makeId; ?>)">Delete</a>&nbsp;&nbsp;&nbsp;
                                        </td>

                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>