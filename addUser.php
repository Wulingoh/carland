


<?php 
include "../../config.php";
if(isset($_POST['addUser'])){
  $email = $_POST['userEmail'];
  $name = $_POST['userName'];
  $password = $_POST['userPassword'];
  $role = $_POST['userRole'];

  $query = "INSERT INTO customers (user_Email, user_Name, user_Password, user_Role ) VALUES ('$email', '$name', '$password', '$role')";
  mysqli_query($link, $query);
  header("Location: usersIndex.php");


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>Manage Users</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="../admin.css">
  <link href="css/index.css" rel="stylesheet">

</head>

<body>
<div id="adminHeader">
    <div class="row">
        <div class="col col-lg-12" style="height: 100px;background:cadetblue">
             <img src="../../image/logo.png" style="height: 100px; float:left; padding-left: 50px;">
             <?php
             echo"<span style='float:right;color:white;font-size:30px;padding-right: 50px; padding-top:50px;'>Hi, ".$_SESSION['user_Name']."!"."</span>";
             ?>

        </div>
    </div>
</div>
<br>
<br>

<div class="adminSection">

    <div class="row justify-content-md-center">
        <div class="col" style="text-align: center;">
          <i class="fas fa-car menuIcon"></i>
          <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Cars</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-users menuIcon"></i>
        <a href="../users/usersIndex.php"><h3 style="padding-top: 20px;font-size:15px;">Admin Users</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-comments menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Reviews</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-coins menuIcon" ></i>
          <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Orders</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-hand-holding-usd menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Ivoices</h3></a>    
        </div>
        <div class="col" style="text-align: center;">
        <i class="fas fa-user-tie menuIcon"></i>
        <a href="#"><h3 style="padding-top: 20px;font-size:15px;">Admin Staff</h3></a>    
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div >
     <div class="row ">
       <div class="col" style="text-align: center;">
         <h2 style="color:cadetblue;">Add a new customer</h2>
       </div>
     </div>
     <br>
     <form method="POST">
       <div class="row justify-content-md-center">
       <div class="col col-lg-4">
       <div class="form-floating">
         <input type="email" class="form-control" name="userEmail" placeholder="name@example.com">
         <label for="email">User Email</label>
       </div>
       </div>
       </div>
       <br>
       <div class="row justify-content-md-center">
       <div class="col col-lg-4">
       <div class="form-floating">
         <input type="name" class="form-control" name="userName" placeholder="name">
         <label for="name">User Name</label>
       </div>
       </div>
       </div>
       <br>
       <div class="row justify-content-md-center">
       <div class="col col-lg-4">
       <div class="form-floating">
         <input type="password" class="form-control" name="userPassword" placeholder="password">
         <label for="password">User Password</label>
       </div>
       </div>
       </div>
       <br>
       <div class="row justify-content-md-center">
         <div class="col col-lg-4">
           <div class="form-floating">
             <select class="form-select" name="userRole" id="userRole"  aria-label="Floating label select example">
               <?php 
               $query = "SELECT * FROM user_role";
               $result = mysqli_query($link, $query);
               while($row = mysqli_fetch_array($result)){
                 extract($row);
               
               ?>
               
               <option value="<?php echo $user_Role; ?>"><?php echo $role; ?></option>
        
               <?php 
              }
              ?>
             </select>
             <label for="userRole">User Role</label>
           </div>
         </div>
       </div>
       <br>
       <div class="row justify-content-md-center">
         <div class="col col-lg-4">
           <button type="submit" class="btn" name="addUser" style="background: cadetblue;color:white;">Add User</button>

         </div>

       </div>


     </form>
      

  </div>    
</div>

<br>
<br>
<footer>
<div class="row">
        <div class="col col-lg-12" style="height: 100px;background:cadetblue">
            
             <?php
             echo"<span style='float:right;color:white;font-size:30px;padding-right: 50px; padding-top:20px;'><a href='../../logout.php' style='color:white;'>[Log Out]</a></span>";
             ?>

        </div>
    </div>

</footer>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>