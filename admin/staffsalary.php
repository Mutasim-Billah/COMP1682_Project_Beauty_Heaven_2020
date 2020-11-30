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
if(isset($_GET['paid'])){
	$id = $_GET['paid'];
	$updatebook = $stf->updateBookingS($id);
	if($updatebook){
		echo $updatebook;
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
                            <th>Total Work</th>
                            <th>Paid Salary</th>
                            <th>Due Salary</th>
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
<?php 
$sid = $row['id'];
$salary = $stf->totalViewStaffSalary($sid);
if($salary){

 $tw=$salary->fetch_assoc();

	  printf($tw['count']);

	
	
	
}else{
  echo "0";
}

 ?>
                         </td>                            <td>
<?php 
$sid = $row['id'];
$salary = $stf->viewStaffPaidSalary($sid);
if($salary){
  $total = 0;
  while ($rows = $salary->fetch_assoc()) {
      $price = $rows['salary'];
      $total = $total + $price; ?>

  
  <?php }
    echo $total;
  
}else{
  echo "0";
}

 ?>
                         </td>
                            <td>
<?php 
$sid = $row['id'];
$salary = $stf->viewStaffSalary($sid);
if($salary){
  $total = 0;
  while ($rows = $salary->fetch_assoc()) {
      $price = $rows['salary'];
      $total = $total + $price; ?>

  
  <?php }
    echo $total;
  
}else{
  echo "0";
}

 ?>
                         </td>
                         <td>
                          <?php 
                          $salary = $stf->viewStaffSalary($sid);
                          if($salary){ ?>

                          <a  onclick="return confirm('Do you want to Paid this?')" class="btn btn-info" href="?paid=<?php echo $row['id'] ?>">Paid Now</a>
                        <?php }else {
                          echo "Waiting";
                        } ?>

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