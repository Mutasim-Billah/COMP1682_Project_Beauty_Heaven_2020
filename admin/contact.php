<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
             
            
       


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Message</h4>
                    <p class="card-description"> 
                      <!-- delete staff -->
                    <?php
                    	if(isset($_GET['delete'])){
                    		$id = $_GET['delete'];
                    		$delete = $other->deleteContact($id);
                    		if($delete){
                    			echo $delete;
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
                            <th> Subject </th>
                            <th> Message </th>
                            <th>Actin</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                        $viewOrder = $other->viewContactMessage();
                        if($viewOrder){
                          $i=0;
                          while ($row = $viewOrder->fetch_assoc()) {
                              $i++;
                          ?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php echo $row['name']; ?> </td>
                           
                            <td> <?php echo $row['email']; ?></td>
                            <td> <?php echo $row['subject'];  ?> </td>
                            <td> <?php echo $row['message'];  ?></td>
                            
                               
                               
                            <td><a  onclick="return confirm('are you sure want to Delete?')" class="btn btn-danger" href="?delete=<?php  echo  $row['id'] ; ?>">Delete</a>
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
          
         
    </div></div>
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>