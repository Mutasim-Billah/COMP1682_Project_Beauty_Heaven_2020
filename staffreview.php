<?php 
 include 'parts/header.php'; ?>


    <div class="featured-page">
      <div class="container">
        <div class="row">
             <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Product Review</h1>
                        <br><br>
            </div>
          </div>
 




		 <?php 
$product_review = $fb->showStaffReview();
if($product_review){
	while ($row = $product_review->fetch_assoc()) { ?>
	    <div class="col-md-7 mb-4 p3" style="margin: 0 auto;border: 3px solid #007bff;padding: 20px">
			 <div style="background: #808080a6;border-radius: 10px;padding: 20px">
			    <h5 class="card-title" style="text-transform: uppercase;color: #ffffff"><?php
			     $cid = $row['customer_id']; 
			     $name = $cmr->singleCustomerName($cid);
			     if($name){
			     	$name = $name->fetch_assoc();
			     	echo $name['username'];
			     }
			     ?> </h5>
			    <p class="card-text mb-2" style="color:white;font-style: italic;">''<?php echo $row['details']; ?>''</p>
</div>
			    <?php
			    $pid = $row['staff_or_product_id'];
			    $pro = $stf-> singleStaffName($pid);
			    if($pro){
			    	$pro_s = $pro->fetch_assoc();?>
<div style="text-align: center;">
			    	<img height="200" style="padding:10px;" src="admin/<?php echo $pro_s['profile']; ?>" alt="">
			    	<h4><a style="text-decoration: none;" href="single-beauty.php?id=<?php echo $pro_s['id']; ?>"><?php echo $pro_s['name']; ?></a></h4>
			    	
			    </div>
			  <?php   }
			     ?>
			 <div class="rating_bottom" style="text-align: center;font-size: 30px; color: #ff8d00;">
			 	<?php
					for ($i = 1; $i <= $row['rating']; $i++) {
						echo "★";
					}
			 	 ?>
			 </div>
          </div>
		<?php	} } ?>

        </div>
      </div>
    </div>


 

  <?php include 'parts/footer.php'; ?>