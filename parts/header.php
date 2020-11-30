<?php 
include 'lib/Session.php';
Session::init();
 $sid = session_id();
include 'helpers/Format.php';

spl_autoload_register( function($class){
  include_once "classes/".$class.".php";
});

$fm = new Format();
$cmr = new Customer();
$prd = new Product();
$stf = new Staff();
$bk = new Booking();
$cart = new Cart();
$prcs = new Purchase();
$fb = new Feedback();
$ot = new Other();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Parlor World - Best Beaty parlor in BD</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
<link rel="icon" type="image/ico" sizes="16x16" href="assets/images/favicon.ico">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<style>
  
  .success{
    color: green;
  }
  .error{
    color: red;
  }

</style>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fbb6944a1a75400120b330c&product=inline-share-buttons" async="async"></script>
  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span style="font-size: 12px">Email: parlorworld@mail.com | Phone: 0123456789</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">



            <li class="nav-item 
            <?php // check current link is active
              $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='index'){echo "active";} ?>
            ">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item 
            <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='products'){echo "active";} ?>
            ">
              <a class="nav-link" href="products.php">Products</a>
            </li>

            <li class="nav-item
 <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='services'){echo "active";} ?>
            ">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item
 <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='beautician'){echo "active";} ?>
            ">
              <a class="nav-link" href="beautician.php">Beauticians</a>
            </li>


            <li class="nav-item
 <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='about'){echo "active";} ?>
            ">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item
 <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='contact'){echo "active";} ?>
            ">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>


          



  <div class="dropdown ml-2">
              <a class="btn dropdown-toggle" style="font-size: 12px; text-transform: uppercase;
              color: #1e1e1e; 
 <?php //check current link is active
             $path = $_SERVER['SCRIPT_FILENAME']; $path = basename($path, '.php'); if($path=='staffreview' || $path=='productreview'){echo "color:#3a8bcd";} ?>
              " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Review
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size: 12px">
                <a class="dropdown-item" href="productreview.php">Product Review</a>
                <a class="dropdown-item" href="staffreview.php">Staff Review</a>
           
              </div>
            </div>






            <?php
            // $login = Session::get('')
            if(Session::get('customre_login')!=true){
             ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Sign Up/Login</a>
            </li>
            <?php }else { ?>
           <div class="dropdown ml-2">
              <a class="btn btn-secondary dropdown-toggle loginbtn" style="font-size: 12px" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php echo Session::get('cmrName'); ?>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="font-size: 12px">
                <a class="dropdown-item" href="booking.php">Booking</a>
                <a class="dropdown-item" href="order.php">Order List</a>
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="passwordreset.php">Password Reset</a>
                <!-- Logout options here -->
            <?php    if(isset($_GET['customer_id'])){
                Session::destroy();
              }?>


                <a class="dropdown-item" href="?customer_id=<?php echo Session::get('cmrId'); ?>">LogOut</a>
              </div>
            </div>
          <?php }?>
          <?php
          $sid = session_id();
          $checkCart = $cart->checkCart($sid);  
          if($checkCart){
           ?> <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
          
</a>
            </li>
          <?php } ?>

          </ul>
        </div>
      </div>
    </nav>