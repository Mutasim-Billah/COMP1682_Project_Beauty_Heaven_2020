<?php include 'partials/header.php'; ?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          
    

           <div class="row">
             
            
       


<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product List</h4>
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
                            <th> Image </th>
                            <th> Type </th>
                            <th> Quentity </th>
                            <th> Issue Date </th>
                            <th> Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       	$viewproduct = $prd->viewProductList();
                       	if($viewproduct){
                       		$i=0;
                       		while ($row = $viewproduct->fetch_assoc()) {
                       		    $i++;
                       		?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php echo $row['name']; ?> </td>
                           
                            <td> <img src="<?php echo $row['image']; ?>" height='200' alt=""> </td>
                            <td> 
                            	<?php if($row['type']==1){
									echo "Product";
								}else {
									echo "Service";
								}
								 ?>
                             </td>
                            <td>
								<?php echo $row['quentity']; ?>
                            </td>
                               <td>
								<?php echo $fm->formatDate($row['updated_time']); ?>
                            </td>
                               <td>
								<?php echo $row['price']; ?>
                            </td>
                            <td><a  onclick="return confirm('are you sure you want to delete this?')" class="btn btn-danger" href="?del=<?php echo $row['id'] ?>">Delete</a> <a class="btn btn-info" href="editproduct.php?update=<?php echo $row['id'] ?>">Edit</a></td>
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