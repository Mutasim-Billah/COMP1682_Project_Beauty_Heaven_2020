<?php 

include './../lib/Session.php';
Session::checkAdminStaffLogin();
include './../classes/Administrator.php';
$adm = new Administrator();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate"); 
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PW Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>


                <!-- login area -->
                 <p>   <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
                $adminLogin = $adm->administrationLogin($_POST);
                if(isset($adminLogin)){
                  echo $adminLogin;
                }
             }
           ?>
           </p>

                <form method="POST" action="login.php">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="user_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="pass" class="form-control">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                      <select  class="form-control" name="user_type" id="staffl">
                        <option value="0">Staff</option>
                        <option selected value="1">Admin</option>
                      </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                       <a style="color:red;display: none;" id="staff_forget" href="staff_fg.php">Forget Password?</a>
                    <script type="text/javascript">
                        document.getElementById('staffl').addEventListener('change', function () {
                        var style = this.value == 0 ? 'block' : 'none';
                        document.getElementById('staff_forget').style.display = style;
                        });
                    </script>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>