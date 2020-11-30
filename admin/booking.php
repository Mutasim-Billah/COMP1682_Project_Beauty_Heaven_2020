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
                      if(isset($_GET['del'])){
                        $id = $_GET['del'];
                        $del = $prd->deleteProduct($id);
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
                            <th> Staff Name </th>
                            <th>Type</th>
                            <th> Date </th>
                            <th> Time </th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                        $viewbooks = $bk->viewBookList();
                        if($viewbooks){
                          $i=0;
                          while ($row = $viewbooks->fetch_assoc()) {
                              $i++;
                          ?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php
                             $sid = $row['service_id']; 
                             if($sid){
                             $sname = $prd -> singleServiceName($sid);
                             $sname_r = $sname->fetch_assoc();
                             if($sname_r){
                              echo $sname_r['name'];
                             }else{
                              echo "On Vacation";
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
                                  echo $cname_r['username'];
                                 }
                               }
                                ?>
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
                            <td>
                              <?php
                                if($row['service_type']==1){
                                  echo "Home Service";
                                }else {
                                  echo "Parlour Service";
                                }
                               ?>
                            </td> 
                               <td>
                <?php echo $fm->formatDateForBooking($row['booking_date']); ?>
                            </td>
                               <td>
                
                          <?php 
                          $tid = $row['time_id'] ;
                          if($tid){
                           
                                 $time_name = $other -> singleTimeName($tid);
                                 $time_name = $time_name->fetch_assoc();
                                 if($time_name){
                                  echo $time_name['time'];
                                 }
                          }

                                ?>
                            </td>
                            <td><?php if($row['status']==1){echo "Completed";}else {
                              echo "Not Completed";
                            } ?></td>
                            <td><a  onclick="return confirm('are you sure you want to delete this?')" class="btn btn-danger" href="?del=<?php echo $row['id'] ?>">Delete</a></td>
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