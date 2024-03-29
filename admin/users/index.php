<?php
include "../../config.php";
include "../../checkLoginAdminRole.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carland</title>
  <link href="../../css/bootstrap.css" rel="stylesheet">
  <script src="../../js/jquery-1.10.1.min.js"></script>
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../icon/bootstrap-icons.css" rel="stylesheet">

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
          <p>Hi&nbsp;,<b><?php echo  $_SESSION['fullname']; ?></b>,&nbsp;Welcome to the Admin system!&nbsp;&nbsp;<a href="../../logout.php">[Log Out]</a></p>
        </div>
      </div>
      <br>
      <div class="row">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><span style="font-size: 20px;color:#2B6777;"><i class="bi bi-house-door"></i>Home</span></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
          </ol>
        </nav>
      </div>

      <div class="row">
        <?php include "sideBarNavUser.php" ?>
        <div class="col" style="padding-left: 50px;border-left:2px solid #E2E8F0;">
          <div class="row">
            <div class="col">
              <h4>User Overview</h4>
            </div>
            <div class="col-3">
              <button type="button" style="color:white;background-color: #2B6777;" class="btn" onclick="document.location='addUser.php'">Add new user</button>
            </div>
          </div>
          <br>
          <div class="row">
            <table class="table table-hover " style="font-size: 12px;">
              <thead style="background-color: #2B6777;color:white;">
                <tr>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <?php
              $query = "SELECT * FROM users  ";
              $result = mysqli_query($link, $query);
              while ($row = mysqli_fetch_array($result)) {
                $user_id = $row['user_id'];
                $email = $row['user_email'];
                $password = $row['password_hash'];
                $fullname = $row['user_fullname'];
                $role = $row['user_role'];
              ?>
                <tbody id="userTable">
                  <tr>
                    <td><?php echo $fullname; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $role; ?></td>
                    <td>
                      <a type="button" data-toggle="modal" data-target="#editmodal<?php echo $user_id; ?>">Edit</a>&nbsp;&nbsp;&nbsp;

                      <a href="javascript:deleteUser(<?php echo $user_id; ?>)">Delete</a>
                    </td>
                  </tr>
                </tbody>
                <div class="modal fade" id="editmodal<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="updateImgLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updateImgLabel">Update User Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="updateUserModal.php">
                          <input name="user_id" type="hidden" value="<?php echo $user_id; ?>">
                          <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                          </div>
                          <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Reset Password">
                          </div>
                          <div class="form-group">
                            <label for="role">User Role</label>
                            <select class="form-control" name="role">
                              <option value="customer" <?php if ($role == 'customer') echo 'selected' ?>>Customer</option>
                              <option value="admin" <?php if ($role == 'admin') echo 'selected' ?>>Admin</option>
                            </select>
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="modalUpdate">Update</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </table>
          </div>

        </div>



      </div>


    </div>
  </section>
  <script src="../../admin/adminJs/adminJs.js" type="text/javascript"></script>
</body>

</html>