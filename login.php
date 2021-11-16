<?php
session_start();
include 'inc.php';
$msg = '';
if (isset($_POST['submit'])) {
    $username = mres($_POST['username']);
    $password = mres($_POST['password']);

    $sql = "select * from admin where username = '{$username}' and password = '{$password}'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['IS_LOGIN'] = 'yes';
        $_SESSION['NAME'] = $row['username'];
        // $msg = 'yes';
        redirect('index.php');
    }else{
        $msg = "Please enter valid login details";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo COMPANY; ?> ADMIN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/ico" href="assets/images/favicon.ico"/>
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="assets/images/logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit">SIGN IN</button>
                </div>
                
              </form>
              <p class="msg"><?php echo $msg; ?></p>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>
</html>