<?php 
include "../../config.php";
include "../../checkLoginAdminRole.php";
$error_email = "";
$error_password = "";



if(isset($_POST['addUser'])){
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role = mysqli_real_escape_string($link, $_POST['role']);
    $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
    $hash = password_hash($password,  PASSWORD_DEFAULT);

    $queryCheck = "SELECT * From users WHERE user_email = '$email'";
    $resultCheck = mysqli_query($link, $queryCheck);
    $row_num = mysqli_num_rows($resultCheck); 

    if($row_num > 0) {

        $error_email = "This email already exists and not available. Please choose another one.";

    } else {

    if ($password == $cpassword){

    $query = "INSERT INTO `users`(`user_email`, `password_hash`, `user_fullname`, `user_role`) VALUES ('$email','$hash','$fullname','$role')";
    mysqli_query($link, $query);
    header("Location: index.php");

    } else {
        $error_password = "Passwords do not match";
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland/User</title>
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <script src="../../js/jquery-1.10.1.min.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../icon/bootstrap-icons.css" rel="stylesheet">
        

<script>        
function arrowChange1(){
   if(document.getElementById("arrowDown1").className == "bi bi-caret-down-fill"){
     document.getElementById("arrowDown1").className = "bi bi-caret-up-fill";
     
     
   } else {
     document.getElementById("arrowDown1").className = "bi bi-caret-down-fill";
    
    
   }

 }
function arrowChange2(){
   if(document.getElementById("arrowDown2").className == "bi bi-caret-down-fill"){
     document.getElementById("arrowDown2").className = "bi bi-caret-up-fill";
     
     
   } else {
     document.getElementById("arrowDown2").className = "bi bi-caret-down-fill";
    
    
   }

 }


</script>

</head>

<body>
  <section style="background-color: white;">
      <div class="container" >
         <div class="row">
             <div class="col">
                <br>
                <img src="../../images/logo4x.png" class="img-fluid float-left" style="width: 200px;">   
             </div>
             <div class="col" style="text-align: right;">
                <br><br>
                <p>Hi&nbsp;,<b><?php echo  $_SESSION['fullname'] ; ?></b>,&nbsp;welcom to the admin system!&nbsp;&nbsp;<a href="../../logout.php">[Log Out]</a></p>
             </div>
         </div>
         <br>
         <div class="row">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><span style="font-size: 20px;color:#2B6777;"><i class="bi bi-house-door"></i>Home</span></li>
                 <li class="breadcrumb-item" ><a href="index.php">User Management</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Add User</li>
              </ol>
             </nav>
         </div>
        
         <div class="row">
             <div class="col-lg-3" >
                 <div class="row">
                     <img src="../../images/admin-dashboardBar.png" class="img-fluid"/>
                 </div>
                 <br>

                <div class="row justify-content-center  "> 
                 <div class="col">
                 <a href="index.php" style="text-decoration: none;color:black">
                 <h5 ><b>User Management</b></h5> 
                 </a>                 
                 </div>
                 <div class="col-2">
                 <a data-toggle="collapse" href="#collapseUser" role="button" onclick="arrowChange1()" aria-expanded="false" aria-controls="collapseUser" >
                 <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown1" class="bi bi-caret-down-fill"></i></span>  
                 </a>
                 </div>
                </div>
                 <div class="collapse" id="collapseUser">
                    <h6 style="text-align: right;" >
                       <a href="addUser.php" style="text-decoration: none;color:black;"> Add new user</a>
                    <h6>
                 </div>
                 <hr>
                 
                <div class="row">
                 
                 <div class="col"> 
                  <a href="../vehicles/index.php" style="text-decoration: none;color:black">
                   <h5 >Vehicle Management</h5> 
                  </a>
                 </div>
                 <div class="col-2">
                 <a data-toggle="collapse" href="#collapseVehicle" href="addVehicle.php" role="button" onclick="arrowChange2()" aria-expanded="false" aria-controls="collapseVehicle" >
                  <span style="font-size: 20px;color:#2B6777;"><i id="arrowDown2" class="bi bi-caret-down-fill"></i></span>  
                 </a>
                 
                 </div>
                </div>
                 <div class="collapse" id="collapseVehicle">
                    <h6 style="text-align: right;" >
                       <a href="../vehicles/addVehicle.php" style="text-decoration: none;color:black;">Add new vehicle </a>
                    <h6>
                </div>
                 <hr>

             </div>
             <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
                 <div class="row">
                     <div class="col">
                        <h4>Add User</h4>
                     </div>                        
                 </div>
                 <hr>
                 <br>

                 <form method="POST" enctype="multipart/form-data" >
                   <div class="row"> 
                       <div class="form-group col-6">
                         <label for="fullname">Full Name</label>
                         <input type="name" class="form-control" name="fullname">
                       </div>
                   </div>
                   
                   <div class="row"> 
                       <div class="form-group col-6">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" name="email">
                         <small id="emailConfirm" class="form-text text-muted"><?php echo $error_email; ?></small>
                       </div>
                   </div>

                   <div class="row"> 
                       <div class="form-group col-6">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password">
                       </div>
                   </div>

                   <div class="row"> 
                       <div class="form-group col-6">
                         <label for="cpassword">Confirm Password</label>
                         <input type="password" class="form-control" name="cpassword">
                         <small id="emailConfirm" class="form-text text-muted"><?php echo $error_password; ?></small>
                       </div>
                   </div>

                   <div class="row"> 
                       <div class="form-group col-6">
                         <label for="role">User Role</label>
                         <select class="form-control" name="role">
                             <option value="customer">Customer</option>
                             <option value="admin">Admin</option>
                         </select>
                       </div>
                   </div>
                   <br>

                   <div class="row">
                      <div class="form-group col-3">
                        <button type="submit" class="btn"  name="addUser" style="background-color: #2B6777;color:white;">Add User</button>
                      </div>
                    </div>



                 </form>
                 

             </div>



         </div>


      </div>
  </section>


</body>
</html>