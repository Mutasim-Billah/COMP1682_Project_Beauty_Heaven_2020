<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          
    

           <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Product</h4>
                    <p class="card-description">Update Product form</p>

                    <p>
                             <?php
             if (isset($_POST['update'])){
                $update = $prd->updateProduct($_POST);
                if(isset($update)){
                  echo $update;
                }
             }
           ?>

           <?php
           if(isset($_GET['update'])){
           	$pid = $_GET['update'];
           	$showProduct = $prd->showSingleProduct($pid);
           	if($showProduct){
           		$row=$showProduct->fetch_assoc();
           	}?>
                    </p>
                    <form method="POST" action="" class="forms-sample" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden"  name="pid" value="<?php echo $row['id']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Details</label>
                     
                        <textarea class="form-control" name="details" id="" cols="30" rows="4"><?php echo $row['details']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" value="<?php echo $row['price']; ?>" class="form-control" id="exampleInputEmail1" name="price" placeholder="00.00">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>

                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                         <img style="margin-top: 10px;margin-bottom: 10px;" height="100" src="<?php echo $row['image']; ?>" alt="">
                      </div>
                      
                 
                      <div class="form-group">
                        <label for="exampleInputPassword1">Quentity</label>
                        <input type="text"  value="<?php echo $row['quentity']; ?>" class="form-control" id="exampleInputPassword1" name="quentity" placeholder="01">
                      </div>
                   
                     
                      <button type="submit" name="update" class="btn btn-primary mr-2">Update Product</button>
                      <button class="btn btn-dark" type="reset">Cancel</button>
                    </form>
                <?php } ?>
                  </div>
                </div>
              </div>
            
       
          
            
       
           
            </div>
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>