<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
             
            
       


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Manage</h4>
                    <p class="card-description"> 
                      <!-- delete staff -->
                      <?php 
                      if(isset($_GET['delivery'])){
                        $id = $_GET['delivery'];
                        $del = $other->deliveryProduct($id);
                        if($del){
                          echo $del;
                        }
                      }
                       ?>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Customer Name </th>
                            <th> Address </th>
                            <th> Quentity </th>
                            <th> Created At </th>
                            <th> Price </th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                        $viewOrder = $other->viewOrderList();
                        if($viewOrder){
                          $i=0;
                          while ($row = $viewOrder->fetch_assoc()) {
                              $i++;
                          ?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php
                             $pid = $row['product_id']; 
                             if($pid){
                             $sname = $prd -> singleServiceName($pid);
                             $sname_r = $sname->fetch_assoc();
                             if($sname_r){
                              echo $sname_r['name'];
                             }

}

                            ?> </td>
                           
                            <td> 
                            <?php
                                 $cid = $row['customer_id']; 
                                 if($cid){
                                 $cname = $cmr -> singleCustomerName($cid);
                                 $cname_r = $cname->fetch_assoc();
                                 if($cname_r){
                                  echo $cname_r['username']; ?>
                               
                             </td>
                             <td>
                               <?php echo $cname_r['address'];  }  } ?>
                             </td>
                            <td> 
                            
                                 <?php
                                 echo $row['quentity']; 
                              
                                ?>
                             </td>
                            
                               <td>
                <?php echo $fm->formatDateForBooking($row['created_at']); ?>
                            </td>
                               <td>
                          <?php  echo  $row['price'] ; ?>
                            </td>
                            <td><?php if($row['status']==1){?>
                             <a  onclick="return confirm('are you sure you want to Deliver Product?')" class="btn btn-info" href="?delivery=<?php  echo  $row['id'] ; ?>">Send Product</a>
                            <?php }else {
                              echo "delivered";
                            } ?></td>
                         
                          </tr>
                          <?php }}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>