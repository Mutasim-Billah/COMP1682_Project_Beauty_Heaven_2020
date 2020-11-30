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
              <h1>Featured Items</h1>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
     <?php
                $viewproduct = $prd->viewProductOnly();
                if($viewproduct){
                  
                  while ($row = $viewproduct->fetch_assoc()) {
                   
                  ?> 
            <div id="1" class="item new col-md-4">
              <a href="single-product.php?id=<?php echo $row['id']; ?>">
                <div class="featured-item">
                  <img src="admin/<?php echo $row['image']; ?>" alt="">
                  <h4><?php echo $row['name']; ?></h4>
                  <h6>TK. <?php echo $row['price']; ?></h6>
                </div>
              </a>
            </div>
        <?php }} ?>
        

          
        </div>
    </div>



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

  <?php include 'parts/footer.php' ?>