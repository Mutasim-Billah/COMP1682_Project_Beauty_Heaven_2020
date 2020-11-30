<?php include 'partials/header.php'; ?>
        <!-- partial -->
         <?php Session::checkstaffOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
             



<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Work Status</h4>
                    <p>   <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                $updateSts = $stf->updateStatusOnlu($_POST);
                if(isset($updateSts)){
                  echo $updateSts;
                }
             }
           ?>
           </p>
                    <form class="forms-sample" method="POST" action="">
                      <div class="form-group">
                      	<?php
                        		$id = Session::get('staff_id');

                        	 $stf_stts = $stf->showStaffStatus($id);

                        	 if($stf_stts){ $stf_stts= $stf_stts->fetch_assoc(); ?>
                      	<input type="hidden" name="stf_id" value="<?php echo $id; ?>">
                        <select name="work" class="form-control" id="">
                        	
                        	 
	 	<option value="1" <?php if($stf_stts['work_status']==1){echo "selected";} ?>>Working</option>
	 	<option value="0" <?php if($stf_stts['work_status']==0){echo "selected";} ?>>Not Working</option>

	 <?php }?>
                        </select>
                        
                      </div>
                     
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>





<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Completed List</h4>
                    <p class="card-description"> 
                    	<!-- delete staff -->
              
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
                            <th>status</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       $id = Session::get('staff_id');
                       	$viewbooks = $bk->completedBookListForOneStaff($id);
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
                              Completed
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
          



</div></div>
            </div>
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>