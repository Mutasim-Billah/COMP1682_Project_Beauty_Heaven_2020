  <?php include 'parts/header.php' ?>
    <!-- Page Content -->
     <style type="text/css">
    /* 
        Use :not with impossible condition so inputs are only hidden 
        if pseudo selectors are supported. Otherwise the user would see
        no inputs and no highlighted stars.
    */
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }
    
    label[for]:hover {
        cursor: pointer;
    }
    
    .rating .stars label:before {
        content: "★";
        font-size: 20px;

    }
    
    .stars label {
        color: lightgray;
    }
    
    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }
    .start label{
      font-size: 16px;
    }
    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }
    
    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }
</style>
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">

          <?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $showSingle = $stf->singleStaffName($id);
  if($showSingle){
    $row = $showSingle->fetch_assoc();

  } } ?>
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1 style="text-transform: uppercase;"><?php echo $row['name']; ?></h1>

            </div>
          </div>
          <div class="col-md-12 text-center">
            <div class="single_butician">
              <img style="border-radius: 50px" width="200" class="img-fluid" src="admin/<?php  echo $row['profile']; ?>" />
            </div>
          </div>
          <div class="col-md-12">
            <div class="right-content">
            	<h1 style="text-align: center;color: #6f6f6f;text-transform: uppercase;margin-top: 15px;"><?php  echo $row['name']; ?></h1>
              <p style="text-align: center;"> Email: <b><?php  echo $row['email']; ?></b> | Phone: <b><?php  echo $row['phone']; ?></b></p>
               <div class="main-button text-center mb-3">
               
                <span style="font-size: 30px; color: #ff8d00;">
                    <?php
                      for ($i = 1; $i <= $row['avr_rating']; $i++) {
                        echo "★";
                      }
                     ?>
                   </span>
              </div>

<?php

   
 ?>
       
         
              <div class="down-content">
             
                <div class="share text-center">
                   <div class="sharethis-inline-share-buttons"></div>
                </div>
              </div> 
              <div class="down-content">
             
             	<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">

            <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</a>
				    <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Write your Review</a>
				    
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div style="margin-top: 20px;background: #d0d0d070;padding: 20px;border-radius: 10px;margin-bottom: 20px;border: 1px solid #52aff273;" class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<?php 
				if(Session::get('customre_login') == true){


				$id = Session::get('cmrId');
				$stf = $row['id'];
				$check = $fb->checkFeedback($id,$stf);
				if($check){
         
         $cid = Session::get('cmrId');
        $sid = $row['id'];
         $check_review = $fb->checkStaffFbAvailability($sid,$cid);
         if($check_review){
          echo "<p style='color:blue;font-size:18px;'>You have already Rated this!</p>";
        }else {
				 if(isset($_POST['submit'])){

				 	$cmr_id = Session::get('cmrId');
				 	$type = 1;
				 	$stf_id = $stf;
				 	$insertFb = $fb->insertFeedback($cmr_id,$stf_id,$type,$_POST);
				 	if($insertFb){
				 		echo $insertFb;
				 	}
				 }
				 ?>

				  	<form method="POST" action="">
					  <div class="form-group">
					    <fieldset class="rating">
                          <legend>Rating</legend>
                        
                          <input id="demo-1" type="radio" name="demo" value="1" required> 
                          <label for="demo-1">1 star</label>
                          <input id="demo-2" type="radio" name="demo" value="2" required>
                          <label for="demo-2">2 stars</label>
                          <input id="demo-3" type="radio" name="demo" value="3" required>
                          <label for="demo-3">3 stars</label>
                          <input id="demo-4" type="radio" name="demo" value="4" required>
                          <label for="demo-4">4 stars</label>
                          <input id="demo-5" type="radio" name="demo" value="5" required>
                          <label for="demo-5">5 stars</label>
                          
                          <div class="stars">
                              <label for="demo-1" aria-label="1 star" title="1 star"></label>
                              <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                              <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                              <label for="demo-4" aria-label="4 stars" title="4 stars"></label>
                              <label for="demo-5" aria-label="5 stars" title="5 stars"></label>   
                          </div>
                          
                      </fieldset>
					    <textarea name="review" class="form-control mt-2" cols="10" rows="3"></textarea>
					  </div>
					 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</form>
<?php 
}
}else {
	echo "<p style='color:blue;font-size:18px;'>You can Only Give Review after Get His/Her Service!</p>";
}
}else {
	echo "<p style='color:blue;font-size:18px;'>Please Login Before Write Review!</p>";
}
 ?>
				  </div>
				  <div  class="tab-pane fade  show active style_review" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				  	<?php 
				  	$id = $row['id'];
				  	$viewReview = $fb->viewReviewsStaff($id);
				  	if($viewReview){
				  		while ($res = $viewReview->fetch_assoc()) {
				  		    
				  		?>
				  		<div class="csrev" style="margin-top: 20px;background: #d0d0d070;padding: 20px;border-radius: 10px;margin-bottom: 20px;border: 1px solid #52aff273;">
				  			<h4 style="text-transform: uppercase;"><?php echo $res['username']; ?></h4>
                     <p style="font-size: 12px;margin-top: 0px">Rating: 
<span style="font-size: 30px; color: #ff8d00;">
                    <?php
                      for ($i = 1; $i <= $res['rating']; $i++) {
                        echo "★";
                      }
                     ?>
                   </span>

                     </p>
				  			<p><?php echo $res['details']; ?></p>
				  		</div>
				  
<?php } }else {
	echo "<p style='color:green;font-size:18px'>No Reviews Yet!</p>";
} ?>
				  </div>
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
    <script>
        (function(){
            var rating = document.querySelector('.rating');
            var handle = document.getElementById('toggle-rating');
            handle.onchange = function(event) {
                rating.classList.toggle('rating', handle.checked);
            };
        }());
    </script>
  <?php include 'parts/footer.php' ?>

