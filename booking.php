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
                  <th scope="col">Service</th>
                  <th scope="col">Staff</th>
                  <th scope="col">Price</th>
                  <th scope="col">Service Type</th>
                  <th scope="col">Payment Status</th>
                </tr>
              </thead>
              <tbody>
                 <?php
                 $id = Session::get('cmrId');
                        $viewbooks = $bk->viewBookListCustomer($id);
                        if($viewbooks){
                          $i=0;
                          while ($row = $viewbooks->fetch_assoc()) {
                              $i++;
                          ?> 
                <tr>
                  <th scope="row"> <?php echo $i; ?></th>
                  <td>
                    
                      <?php
                         $sid = $row['service_id']; 
                         if($sid){
                         $sname = $prd -> singleServiceName($sid);
                         $sname_r = $sname->fetch_assoc();
                         if($sname_r){
                          echo $sname_r['name'];
                         }

                      } ?> 

                  </td>
                  <td>
                    
                     <?php
                           $stid = $row['staff_id']; 
                           if($stid){
                           $stname = $stf -> singleStaffName($stid);
                           $stname = $stname->fetch_assoc();
                           if($stname){
                            echo $stname['name'];
                           }
                         }
                          ?>

                  </td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php if($row['service_type']==0){
                      echo "Parlor Service";
                  }else {
                    echo "Home Service";
                  } ?></td>
                  <td><?php
                    if($row['pay_type']==1){
                      echo "Paid";
                    }else { ?>
<a class="btn btn-info" href="paybooking.php?paid=<?php echo $row['id']; ?>&amount=<?php echo $row['price']; ?>">Paid Now</a>                      
                    <?php }

                   ?></td>
                 
                  

                </tr>
              <?php }}else {
                echo "<h2>Please Login Your Account Or if New Create Account!</h2>";
              } ?>
       
              </tbody>
            </table>
         </div> 
        </div>
      </div>
    </div>


 

  <?php include 'parts/footer.php'; ?>