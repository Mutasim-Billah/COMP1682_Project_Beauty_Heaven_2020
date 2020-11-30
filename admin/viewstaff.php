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
	$del = $stf->deleteStaff($id);
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
                            <th> Email </th>
                            <th> Phone </th>
                            <th> National Id </th>
                            <th>Work Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       	$viewStaff = $stf->viewStaffM();
                       	if($viewStaff){
                       		$i=0;
                       		while ($row = $viewStaff->fetch_assoc()) {
                       		    $i++;
                       		?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td>
                             <?php echo $row['email']; ?>
                            </td>
                            <td> <?php echo $row['phone']; ?> </td>
                            <td> <?php echo $row['nid']; ?> </td>
                            <td>
<?php if($row['work_status']==1){
	echo "Working";
}else {
	echo "Not Working";
}
 ?>
                            </td>
                            <td><a  onclick="return confirm('are you sure you want to delete this?')" class="btn btn-danger" href="?del=<?php echo $row['id'] ?>">Delete</a> <a class="btn btn-info" href="editstaff.php?update=<?php echo $row['id'] ?>">Edit</a></td>
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