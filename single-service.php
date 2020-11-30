  <?php include 'parts/header.php' ?>
    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">

          <?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $showSingle = $prd->showSingleService($id);
  if($showSingle){
    $row = $showSingle->fetch_assoc();

  } } ?>
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Single Product</h1>
    
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <img class="img-fluid" src="admin/<?php  echo $row['image']; ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><?php  echo $row['name']; ?></h4>
              <h6>TK. <?php  echo $row['price']; ?></h6>
              <p><?php  echo $row['details']; ?></p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Book Now
              </button>
              <br><br>
              <div class="down-content">
             
                <div class="share">
                 <div class="sharethis-inline-share-buttons"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


  <br><br>
    <!-- Similar Ends Here -->


    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on PIXIE now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Godard four dollar toast prism, authentic heirloom raw denim messenger bag gochujang put a bird on it celiac readymade vice.</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->









    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <p>
                  <?php
           if(Session::get('customre_login')!=true){
           echo "<h2>Only Registred User Can Book!</h2>";
           }else{ ?>

           <?php
             if (isset($_POST['booking'])){
                $bookm = $bk->bookingMethod($_POST);
                if(isset($bookm)){
                  echo $bookm;
                  
                }
             }
           ?>
              </p>
            <form method="POST" action="">
              <div class="form-group">
                 <label for="exampleInputEmail1">Choice Service</label>
               <select name="service" id="" class="form-control">
                
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                
                </select>
              </div>

               <div class="form-group">
                <label for="exampleInputEmail1">Available Staff</label>
                <select name="staff" id="" class="form-control">
                     <?php
                        $showStaff = $stf->showStaffForChoice();
                        if($showStaff){
                          while ($row = $showStaff->fetch_assoc()) {?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                      <?php } }else {?>
                         <option value="">No One Is Online</option>
                      <?php }
                      ?>
                </select>
              </div>


    <div class="form-group">
                <label for="exampleInputEmail1">Service Type</label>
                <select name="st" id="" class="form-control">
                    <option value="1">Home Service</option>
                    <option value="2">Parlour Service</option>
                </select>
              </div>



           <input type="hidden" name="customer_id" value="<?php echo Session::get('cmrId') ?>">
             
             <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="date" name="date" class="form-control">
              </div>

             <div class="form-group">
                <label for="exampleInputEmail1">Time</label>
                <select name="time" class="form-control" id="">
                  <?php 
                  
                    $showTime = $bk->viewTime();
                    if($showTime){
                      while ($row = $showTime->fetch_assoc()) { 

                        ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['time'] ?></option>
                <?php }} ?>
                </select>
              </div>

              <button type="submit" name="booking" class="btn btn-primary">Submit</button>
            </form>

          <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>














  <?php include 'parts/footer.php' ?>