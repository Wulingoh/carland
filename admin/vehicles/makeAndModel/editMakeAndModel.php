<?php
include_once "../../../config.php";
// include "../../lib/image-creation.php";
include  "../../../queryHelpers.php";

$makeId = $_GET['makeId'];

//update car
if (isset($_POST['updateMakeAndModel'])) {
    $makeId = mysqli_real_escape_string($link, $_POST['make']);
    $modelId = mysqli_real_escape_string($link, $_POST['model']);

    if ($_FILES['img']['tmp_name'] != "") {
        $imgName = $_FILES['img']['name'];
        $ext = strrchr($imgName, ".");
        $newName = md5(rand() * time()) . $ext;
        $imgPath = CAR_IMG_DIR . $newName;
        $tmpName = $_FILES['img']['tmp_name'];
        createThumbnail($tmpName, $imgPath, CAR_IMG_WIDTH);

        $query = "UPDATE vehicle_make SET make_id ='$makeId', make ='$make', brand_logo ='$brandLogo' WHERE make_id = '$makeId' ";

        mysqli_query($link, $query);
    } else {
        $query = "UPDATE vehicle_make SET make_id ='$makeId', make ='$make' WHERE make_id = '$makeId' ";
        mysqli_query($link, $query);
    }

    header("Location: index.php");
}

$query = "SELECT make_id, make, brand_logo FROM vehicle_make WHERE make_id = '$makeId' ";

$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();

$make = $row['make'];
// $model = $row['model'];
$brandLogo = $row['brand_logo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Make And Model</li>
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
                            <a href="../users/addUser.php" style="text-decoration: none;color:black;"> Add New User</a>
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
                            <h4>Edit Make and Model Details</h4>
                        </div>
                    </div>
                    <hr>
                    <form method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="form-group col-10">
                                <select id="make" name="make" class="form-control">
                                    <option value="<?php echo $makeId; ?>"><?php echo $make; ?></option>
                                    <?php
                                    $queryMake = "SELECT * FROM vehicle_make";
                                    $resultMake = mysqli_query($link, $queryMake);
                                    while ($rowMake = mysqli_fetch_array($resultMake)) {
                                        extract($rowMake);

                                    ?>
                                        <option value="<?php echo $makeId; ?>"><?php echo $make; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-10">
                                <select class="form-control" name="model" id="model">
                                    <option value="<?php echo $brandLogo; ?>"><?php echo $brandLogo; ?></option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-10">
                                <table class="table table-hover">
                                    <caption>List of Model</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Model</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Prius</th>
                                            <td>
                                                <button class="btn btn-primary edit" type="button" id="model_id" name="model" data-toggle="modal" data-target="#editModel">
                                                    Edit
                                                </button> 
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="javascript:deleteModel(<?php echo $modelId; ?>)">Delete</a>&nbsp;&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <br>
                        <div class="row">
                            <div class="form-group col-4">
                                <button type="submit" class="btn" name="updateMakeAndModel" style="background-color: #2B6777;color:white;">Update Make And Model</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-dialog modal-dialog-centered" id="editModel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</body>

</html>