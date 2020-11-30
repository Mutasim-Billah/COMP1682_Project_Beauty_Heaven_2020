<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
        
          
            <div class="row">

              <?php $stock_check = $prd->productStockCheck();
              if($stock_check){
               ?>
              <div class="col-sm-12 grid-margin">
                <div class="card" style="background: radial-gradient(#ffc6c6, #b51313);">
                  <div class="card-body">
                    <h5>Product Restock Warning</h5>
                    <a class="btn btn-info" href="lasstock.php">View List</a>
                  </div>
                </div>
              </div>
              <?php } ?>

              <div class="col-sm-8 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earning By Date</h5>
                      <div class=" my-auto">
                    

                      <form action="month.php" method="POST">
                        <div class="monthdate" style="display: flex;">
                          <input type="date" name="date" class="form-control mr-3"> 
                        TO
                         <input type="date" name="date2"  class="form-control ml-3">
                        </div>
                        <button type="submit" name="submit" class="btn btn-info mt-2">Show</button>
                      </form>
                        </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earning Today</h5>
                      <div class=" my-auto">
                    

                      <form action="today.php" method="POST">
                        <div class="monthdate" style="display: flex;">
                          <input type="date" name="date" class="form-control mr-3"> 
                        </div>
                        <button type="submit" name="submit" class="btn btn-info mt-2">Show</button>
                      </form>
                        </div>
                  </div>
                </div>
              </div>
          

              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Product Sell</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">
                            TK 
                            <?php
                                $product = $prcs->viewTotalEarn();
                                if($product){
                                  $total = 0;
                                  while ($res = $product->fetch_assoc()) {
                                      $price = $res['total_cost'];
                                      $total = $total+$price;

                                  }
                                  echo $total2=$total;
                                }
                             ?>

                          </h2>
                        </div>
                    
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Get Delivery Cost</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">TK   <?php
                                $product = $prcs->viewTotalDeliveryCost();
                                if($product){
                                   $res = $product->fetch_assoc();
                                    $sell_number = $res['COUNT(*)'];
                                   echo $delivery = $sell_number * 120;
                                }
                             ?></h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Earn From Service</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">TK
                              <?php
                                $booking = $bk->viewServiceEarn();
                                if($booking){
                                  $total = 0;
                                  while ($res = $booking->fetch_assoc()) {
                                      $price = $res['price'];
                                      $total = $total+$price;

                                  }
                                  echo $total;
                                }
                             ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
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
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">TK
                              <?php
                                $booking = $bk->viewServiceEarn();
                                if($booking){
                                  $total = 0;
                                  while ($res = $booking->fetch_assoc()) {
                                      $price = $res['price'];
                                      $total = $total+$price;

                                  }
                                  echo $total + $delivery + $total2;
                                }
                             ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
   
            </div>
          
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>