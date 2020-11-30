<?php include 'parts/header.php'; ?>
<?php

if(!Session::get('cmrId')){
  echo "<script>window.location.replace('login.php')</script>";
}?>

    <div class="featured-page">
      <div class="container">
        <div class="row">
             <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Profile</h1>
                        <br><br>
            </div>
          </div>
<div class="col-md-12">
  
<?php
if(isset($_POST['update'])){
 
  $updaet = $cmr->updateCustomerPasword($_POST);
  if($updaet){
    echo $updaet;
  }
}?>

  
</div>
          <div class="col-md-5 card">
           <table class="table">
              <thead>
                <form action="" method="POST">
                <tr>
                  <th scope="col">Password:</th>
                  <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                  <th scope="col">Confirm Password:</th>
                  <td><input type="password" name="pass2"></td>
                </tr>
               <input type="hidden" name="cid" value="<?php echo Session::get('cmrId') ?>">
                <tr>
                  <td></td>
                  <td><input class="btn btn-info" type="submit" name="update" value="Reset"></td>
                </tr>
                </form>
              </thead>
            </table>
         </div> 
        
        </div>
      </div>
    </div>


 
<?php include 'parts/footer.php'; ?>