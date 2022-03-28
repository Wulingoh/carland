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
    </div>
    <hr>
</div>