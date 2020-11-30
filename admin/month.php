<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
        
          
            <div class="row">
<div class="col-md-12">
	<h4 style="text-align: center;margin-bottom: 20px;">Earning Results From <span style="color: red"><?php if(isset($_POST['date'])){echo $fm->formatDateForBooking($_POST['date']);} ?></span> To <span style="color: red"><?php echo $fm->formatDateForBooking(date("Y/m/d")); ?></span></h2>
</div>


              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earning From Products</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    	<h2 class="mb-0">
                      	TK. <?php
                          $total2 = 0;
                      	if(isset($_POST)){
                      		// var_dump($_POST);
                      		$date = $_POST['date'];
                          $date2 = $_POST['date2'];
                      		    $product = $prcs->viewTotalEarnByDate($date,$date2);
                                if($product){
                                  $total = 0;

                                  while ($res = $product->fetch_assoc()) {
                                      $price = $res['total_cost'];
                                      $total = $total+$price;

                                  }
                                  echo $total2=$total;
                                }
                      	} ?>
                      	
                    </h2>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            

              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earning From Delivery Cost</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    	  <h2 class="mb-0">TK.   
                    	  	<?php
                    	  $date = $_POST['date'];
                          $date2 = $_POST['date2'];
                                $product = $prcs->viewTotalDeliveryCostByMonth($date,$date2);
                                if($product){
                                   $res = $product->fetch_assoc();
                                    $sell_number = $res['COUNT(*)'];
                                   echo $delivery = $sell_number * 120;
                                }
                             ?></h2>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earning From Service</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    	  <h2 class="mb-0">TK.   
                             	   <?php
                             	   $date = $_POST['date'];
                                  $date2 = $_POST['date2'];
                                $booking = $bk->viewServiceEarnByMonth($date,$date2);
                                if($booking){
                                  $total = 0;
                                  while ($res = $booking->fetch_assoc()) {
                                      $price = $res['price'];
                                      $total = $total+$price;

                                  }
                                  echo $total3 = $total;
                                }
                             ?>
                             </h2>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Earning</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    	  <h2 class="mb-0">TK.   
                             	    <?php
                             	  
                                // if(!isset($total3)){

                                //   echo $total3 + $delivery + $total2;
                                // }else {
                                //   echo $delivery + $total2;
                                // }

                                    if(!isset($total3)){

                                   $total3 =0;
                                }elseif (!isset($total2)) {
                                  $total2 = 0;
                                }elseif (!isset($delivery)) {
                                  $delivery=0;
                                }
                                // $total2 = 0;
                                echo $total2 + $total3 + $delivery;
                      
                             ?>
                             </h2>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            



            
          
   
            </div>
          
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>