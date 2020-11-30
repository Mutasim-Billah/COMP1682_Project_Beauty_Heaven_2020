<?php 
 include 'parts/header.php'; ?>


    <div class="featured-page">
      <div class="container">
        <div class="row">
             <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Order History</h1>
                        <br><br>
            </div>
          </div>
 
          <div class="col-md-12">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order Id</th>
                  <th scope="col">Payment Getway</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(Session::get('customre_login')==true){

                      $uid=Session::get('cmrId');
                        $viewPerchs = $prcs->viewPurchase($uid);
                        $i=0;
                       
                        if($viewPerchs){
                          while ($row = $viewPerchs->fetch_assoc()) { $i++; ?>
                <tr>
                  <th scope="row"> <?php echo $i; ?></th>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php echo $row['payment_type']; ?></td>
                  <td><?php echo $row['total_cost']; ?></td>
                  <td><?php 
                  if($row['status']==1){
                  echo "Pending";
                  }else {
                    echo "Paid";
                  }
                   ?></td>
                  

                </tr>
              <?php }}}else {
                echo "<h2>Please Login Your Account Or if New Create Account!</h2>";
              } ?>
       
              </tbody>
            </table>
         </div> 
        </div>
      </div>
    </div>


 

  <?php include 'parts/footer.php'; ?>