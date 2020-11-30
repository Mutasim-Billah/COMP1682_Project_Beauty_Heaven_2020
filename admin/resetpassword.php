<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkstaffOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          
    

           <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Staff Registration</h4>
                    <p class="card-description">Staff registration form</p>

                    <p>
                             <?php
		         
									if(isset($_POST['update'])){
									 
									  $updaet = $stf->updatestaffPasword($_POST);
									  if($updaet){
									    echo $updaet;
									  }
									}
							           ?>
                    </p>
                      <table class="table">
              <thead>
                <form action="" method="POST">
                <tr>
                  <th scope="col">Password:</th>
                  <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                  <th scope="col">Password 2:</th>
                  <td><input type="password" name="pass2"></td>
                </tr>
               <input type="hidden" name="cid" value="<?php echo Session::get('staff_id') ?>">
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
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>