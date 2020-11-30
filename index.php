<?php 
 include 'parts/header.php';
 include 'parts/banner.php';

?>


<?php
if(Session::get('cmrId')){
  $id= Session::get('cmrId');
  $viewPremiumCustomer = $ot->viewPremiumCustomerData($id);
  if($viewPremiumCustomer){
    $res = $viewPremiumCustomer->fetch_assoc();
    $res_show = $res['count'];
    if($res_show >= 5){ ?>
 <div class="subscribe-form" style="padding:20px 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Congratulation, <span style="text-transform: uppercase;"><?php echo Session::get('cmrName'); ?></span></h1>
              <h4>You are Our Lucky Customer, <span style="font-size: 30px;color:white;">20%</span> Off for Your Next Purchase</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
   <?php }
  }
}
 ?>





    <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Gallery</h1>
            </div>
          </div>
            <div class="row gallery">
            
              
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/1.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/2.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/3.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/4.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/5.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/6.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/7.jpg" alt="Item 1">
                </div>
               
                <div class="featured-item col-md-3">
                  <img class="img-flex" src="gallery/8.jpg" alt="Item 1">
                </div>
            
      
            </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->

    <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Products</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="product_slide owl-carousel owl-theme">
             <?php
                $viewproduct = $prd->viewProductOnly();
                // var_dump($viewproduct);
                if($viewproduct){
                  
                  while ($row = $viewproduct->fetch_assoc()) {
                   
                  ?> 
              <a href="single-product.php?id=<?php echo $row['id']; ?>">
                <div class="featured-item">
                  <img src="admin/<?php echo $row['image']; ?>" alt="Item 1">
                  <h4><?php echo $row['name']; ?></h4>
                  <h6>TK. <?php echo $row['price']; ?></h6>
                </div>
              </a>
             <?php }} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->


    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>30% OFF For Return Customer</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Integer vel turpis ultricies, lacinia ligula id, lobortis augue. Vivamus porttitor dui id dictum efficitur. Phasellus vel interdum elit.</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                 
                    <div class="col">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Register Now!</button>
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
  <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Services</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="product_slide owl-carousel owl-theme">
             
                 <?php
                $viewproduct = $prd->viewServiceOnly();
                if($viewproduct){
                  
                  while ($row = $viewproduct->fetch_assoc()) {
                   
                  ?> 
              <a href="single-service.php?id=<?php echo $row['id']; ?>">
                <div class="featured-item">
                  <img src="admin/<?php echo $row['image']; ?>" alt="Item 1">
                  <h4><?php echo $row['name']; ?></h4>
                  <h6>TK. <?php echo $row['price']; ?></h6>
                </div>
              </a>
             <?php }} ?>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->


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
              <p>Integer vel turpis ultricies, lacinia ligula id, lobortis augue. Vivamus porttitor dui id dictum efficitur. Phasellus vel interdum elit.</p>
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



    <?php include 'parts/footer.php' ?>