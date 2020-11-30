<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          
    

           <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product Create</h4>
                    <p class="card-description">Product add form</p>

                    <p>
                             <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product'])){
                $add = $prd->addProduct($_POST);
                if(isset($add)){
                  echo $add;
                }
             }
           ?>
                    </p>
                    <form method="POST" action="" class="forms-sample" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Details</label>
                     
                        <textarea class="form-control" name="details" id="" cols="30" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="price" placeholder="00.00">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1"> Type</label>
                        <select name="type" class="form-control" id="">
                        	<option value="1">Product</option>
                        	<option value="2">Service</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Quentity</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="quentity" placeholder="01">
                      </div>
                   
                     
                      <button type="submit" name="product" class="btn btn-primary mr-2">Add Product</button>
                      <button class="btn btn-dark" type="reset">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            
       
          
            
       
           
            </div>
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>