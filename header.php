<?php
session_start();
include 'inc.php';
if (isset($_SESSION['IS_LOGIN'])) {
} else {
  redirect('login.php');
}
$active = '';
$formactive = '';
$addCarActive = '';
$PassChange = '';
if($_SERVER['PHP_SELF']==ROOT.'/readmore.php' || $_SERVER['PHP_SELF']==ROOT.'/' ||$_SERVER['PHP_SELF']==ROOT.'/index.php'){
  $active = 'active';
}elseif($_SERVER['PHP_SELF']==ROOT.'/form.php'){
  $formactive = 'active';
}elseif($_SERVER['PHP_SELF']==ROOT.'/addCar.php'){
  $addCarActive = 'active';
}elseif($_SERVER['PHP_SELF']==ROOT.'/change_passwprd.php'){
  $PassChange = 'active';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo COMPANY; ?> Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.min.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="assets/images/favicon.ico"/>
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>

        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['NAME'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item <?php echo $active?>">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item <?php echo $formactive?>">
            <a class="nav-link" href="form.php">
              <i class="mdi mdi-account-plus menu-icon"></i>
              <span class="menu-title">New Customer</span>
            </a>
          </li>
          <li class="nav-item <?php echo $addCarActive?>">
            <a class="nav-link" href="addCar.php">
              <i class="mdi mdi-car menu-icon"></i>
              <span class="menu-title">Add Car</span>
            </a>
          </li>
          <li class="nav-item <?php echo $PassChange?>">
            <a class="nav-link" href="change_passwprd.php">
              <i class="mdi mdi-textbox-password menu-icon"></i>
              <span class="menu-title">Change Password</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">