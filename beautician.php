<?php 
 include 'parts/header.php';

?>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Beautician</h1>
            </div>
          </div>
    
        </div>
      </div>
    </div> 

    <div class="featured container no-gutter">

        <div class="row posts">
     	<?php
	        $viewbuti = $stf->viewBeauticianAll();
	        if($viewbuti){
	          while ($row = $viewbuti->fetch_assoc()) { ?> 
            <div id="1" class="item new col-md-3">
              <a href="single-beauty.php?id=<?php echo $row['id']; ?>">
                <div class="featured-item">
                  <?php
                  if(strlen($row['profile'])<1){?>
                     <img src="assets/images/user.png" alt="">
                  <?php }else{ ?>
                    <img src="admin/<?php echo $row['profile']; ?>" alt="">
                  <?php }
                  ?>
                 
                  <h4 style="text-transform: uppercase;text-align: center;"><?php echo $row['name']; ?></h4>
                  <p style="text-align: center;font-weight: 600"><?php echo $row['email']; ?> | <?php echo $row['phone']; ?></p>
                   <p style="font-size: 30px; color: #ff8d00;text-align: center;">
                    <?php
                      for ($i = 1; $i <= $row['avr_rating']; $i++) {
                        echo "★";
                      }
                     ?>
                   </p>
                </div>
              </a>
            </div>
        <?php } } ?>
        </div>
    </div>




    

<!--     <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li class="current-page"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Featred Page Ends Here -->


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


  <?php include 'parts/footer.php' ?>