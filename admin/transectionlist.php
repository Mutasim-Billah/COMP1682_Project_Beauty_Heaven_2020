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
                      	$update = $prcs->updateTransection($id);
                      	if($update){
                      		echo $update;
                      	}
                      }
                       ?>
                    </p>
                    <div class="col-md-12">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order Id</th>
                  <th scope="col">Payment Getway</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
               

                   
                        $viewPerchs = $prcs->viewAllPurchase();
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
                    echo "Completed";
                  }
                   ?></td>
                  
<td><?php 
                  if($row['status']==1){?>
  <a class="btn btn-primary" href="?paid=<?php echo $row['id']; ?>">Confirm</a>
<?php } else{echo "Done";}?>
</td>
                </tr>
              <?php }} ?>
       
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