<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
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
             if (isset($_POST['update'])){
                $update = $stf->updateStaff($_POST);
                if(isset($update)){
                  echo $update;
                }
             }
           ?>


           
                    </p>
                    <?php
                    	if(isset($_GET['update'])){
                    		$id = $_GET['update'];
                    		$show_s = $stf->viewStaff_M($id);
                    		$row = $show_s->fetch_assoc();
                     ?>
                    <form method="POST" action="" class="forms-sample"  enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="exampleInputUsername1" name="name" placeholder="Username">
                        <input type="hidden" value="<?php echo $row['id']; ?>" class="form-control" id="exampleInputUsername1" name="sid" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" value="<?php echo $row['phone'] ?>" name="phone" class="form-control" id="exampleInputEmail1" placeholder="0123456789">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">National ID No.</label>
                        <input type="number" value="<?php echo $row['nid'] ?>" class="form-control" id="exampleInputEmail1" name="nid" placeholder="10203993933939">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pofile Pictures</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                        <img style="margin-top: 10px;margin-bottom: 10px;" height="100" src="<?php echo $row['profile']; ?>" alt="">
                      </div>
                     
                     
                      <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                <?php } ?>
                  </div>
                </div>
              </div>
            
       
          
            
       
           
            </div>
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>