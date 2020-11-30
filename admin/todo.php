<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkstaffOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
             
            
       


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">To Do List</h4>
                    <p class="card-description"> 
                    	<!-- delete staff -->
              
                      <?php 
                      if(isset($_GET['complete'])){
                        $id = $_GET['complete'];
                        $com = $bk->updateBooking($id);
                        if($com){
                          echo $com;
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
                            <th> Date </th>
                            <th> Time </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       $id = Session::get('staff_id');
                       	$viewbooks = $bk->viewBookListForOneStaff($id);
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
                            <td>
                              <a  onclick="return confirm('Did You Completed This Work?')" class="btn btn-warning" href="?complete=<?php echo $row['id'] ?>">Mark as Done</a>
                             </td>
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