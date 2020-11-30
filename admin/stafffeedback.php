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
                      	$del = $prd->deleteFeedback($id);
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
                            <th> Customer Name </th>
                            <th> Feedback Type </th>
                            <th> Details </th>
                            <th> Created At </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       	$viewfb = $fb->viewFeedBackStaff();
                       	if($viewfb){
                       		$i=0;
                       		while ($row = $viewfb->fetch_assoc()) {
                       		    $i++;
                       		?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php echo $row['username']; ?> </td>
                           
                            <td> 
                             
                            <?php
                                 $type = $row['feedback_type']; 
                                 if($type==1){
                                echo 'Staff';
                               }else {
                                 echo "Product";
                               }
                                ?>
                             </td>
                          
                            <td> 
                                 <?php  echo $fm->textShorten($row['details'], 50);   ?>
                             </td>
                            
                               <td>
								<?php echo $fm->formatDateForBooking($row['created_at']); ?>
                            </td>
                               
                           
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