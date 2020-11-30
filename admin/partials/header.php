<?php
// if( Session::get('admin')!='admin'){
//   echo "<script>window.location.replace('login.php')</script>";} 

include './../lib/Session.php';
Session::checkSessionAdminStaff();

// include './../lib/Database.php';
include './../helpers/Format.php';

spl_autoload_register( function($class){
  include_once "./../classes/".$class.".php";
});

$fm = new Format();
$cmr = new Customer();
$stf = new Staff();
$prd = new Product();
$bk  = new Booking();
$other  = new Other();
$fb = new Feedback();
$prcs = new Purchase();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Heaven </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

        <style>
      
      .form-control:focus {
  background: #fff;
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php">BH Admin</a>
          <a class="sidebar-brand brand-logo-mini" href="index.php">BH</a>
        </div>
        <ul class="nav">
      <?php if(Session::get('admin_login')){ ?> 
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
          </li>
   
          <!-- staff manage -->
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple "></i>
              </span>
              <span class="menu-title">Staff Manage</span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="addstaff.php"><span class="menu-icon"> <i class="mdi mdi-account-plus"></i> </span>Add Staff</a></li>
              <li class="nav-item"> <a class="nav-link" href="viewstaff.php"><span class="menu-icon"> <i class="mdi mdi-account-multiple-outline "></i> </span>Staff List</a></li>
              <li class="nav-item"> <a class="nav-link" href="staffsalary.php"><span class="menu-icon"> <i class="mdi mdi-account-multiple-outline "></i> </span>Staff Salary</a></li>
             
              </ul>
            </div>
          </li>
<!-- product manage -->
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#product-manage" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class=" mdi mdi-pine-tree-box"></i>
              </span>
              <span class="menu-title">Product Manage</span>
            </a>
            <div class="collapse" id="product-manage">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="addproduct.php"><span class="menu-icon"> <i class="mdi mdi-plus"></i> </span>Add Product</a></li>
              <li class="nav-item"> <a class="nav-link" href="viewproduct.php"><span class="menu-icon"> <i class=" mdi mdi-format-list-bulleted-type"></i> </span>Product List</a></li>
              <li class="nav-item"> <a class="nav-link" href="viewservice.php"><span class="menu-icon"> <i class=" mdi mdi-format-list-bulleted-type"></i> </span>Service List</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="booking.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Booking List</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="orderlist.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Order List</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="transectionlist.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Transition History</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="productfeedback.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Product Feedback</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="stafffeedback.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Staff Feedback</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="contact.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Contact Message</span>
            </a>
          </li>

  <?php } ?>

          <?php if(Session::get('staff_id')){ ?> 
          <li class="nav-item menu-items">
            <a class="nav-link" href="profile.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="todo.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">ToDo</span>
            </a>
          </li>
          <?php } ?>
        
       
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php">PW Admin</a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              
              
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo Session::get('a_name') ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
               

                  <?php if(Session::get('staff_id')){ ?> 

                  <a class="dropdown-item preview-item" href="todo.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">To-do list</p>
                    </div>
                  </a>

                  <a class="dropdown-item preview-item" href="resetpassword.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Reset Password</p>
                    </div>
                  </a>
<?php } ?>

<?php
                // admin and staff logout
                if(isset($_GET['action']) && $_GET['action']=='logout'){
                  Session::destroy();
                }
 ?>

                  <div class="dropdown-divider"></div>
                  <a href="?action=logout" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>