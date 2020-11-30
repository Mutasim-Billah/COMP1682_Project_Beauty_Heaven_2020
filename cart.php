<?php 
 include 'parts/header.php'; ?>


<?php
// Delete from cart
if(isset($_GET['del'])){
	$id = $_GET['del'];
	$del = $cart->DelCart($id);
}

 ?>
   <div class="single-product">
      <div class="container">
        <div class="row">
        	<div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Cart</h1>
              <?php

              if(isset($_GET['login']) && $_GET['login']=='false')
              {
              	echo "<h2 style='color:red;font-size:20px;'>Please Login For Confirm Order!</h2>";
              }

               ?>
                 <p>
                  <?php
		             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
		                $cartUpdate = $cart->updateCart($_POST);
		                if(isset($cartUpdate)){
		                  echo $cartUpdate;
		                }
		             }
		           ?>
                    </p>
              	<div class="table">
              		<table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Image </th>
                            <th> Quentity </th>
                            <th> price </th>
                            <th>Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php
                       // view cart data
                      
                       	$viewCart = $cart->viewCart($sid);
                       	if($viewCart){
                       		$i=0;
                       		$total = 0;
                       		while ($row = $viewCart->fetch_assoc()) {
                       		    $i++;
                       		    $pid = $row['product_id'];
                       		    $qt = $row['quentity'];
                       		    $price = $row['price'];

                       		    // view product according to product id
                       		    $viewProduct = $prd->viewProductForCart($pid);

                       		    $viewProduct = $viewProduct->fetch_assoc();
                       		?> 
                          <tr>
                            <td class="py-1">
                            <?php echo $i; ?>
                            </td>
                            <td> <?php echo $viewProduct['name']; ?> </td>
                           
                            <td> <img src="admin/<?php echo $viewProduct['image']; ?>" height='40' alt=""> </td>
                          
                            <td>
                            	<form action="" method="POST" style="width: 155px;">
                            		<input type="hidden" name="pid" value="<?php echo $row['product_id']; ?>">
                            		<input type="hidden" name="cid" value="<?php echo Session::get('cmrId'); ?>">
                            		<input type="hidden" name="price" value="<?php  echo $viewProduct['price']; ?>">
                            		<input style="width: 40%;float: left;" class="form-control" type="number" name="qt" value="<?php echo $qt; ?>" min='1'>
								<button type="submit" class="btn btn-info" name="update">Update</button>
                            	</form>
                            </td>
                               <td>
								<?php echo $price; 
								$total = $total + $price;
								?> ৳
                            </td>
                            <td>
                            	<a  onclick="confirm('are you sure you want to delete this?')" class="btn btn-danger" href="?del=<?php echo $row['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                          </tr>
                          <?php } } ?>



                        </tbody>
                      </table>
              	</div>
              <div class="checkoutt" style="width: 100%;display: inline-block;">
              		<table style="float: right;width: 400px;" class="table">
              	
                    <?php
if(Session::get('cmrId')){
  $id= Session::get('cmrId');
  $viewPremiumCustomer = $ot->viewPremiumCustomerData($id);
  if($viewPremiumCustomer){
    $res = $viewPremiumCustomer->fetch_assoc();
    $res_show = $res['count'];
    if($res_show >= 5){ ?>
                  <tr>
                    <td>Total Price</td>
                    <td><?php if(isset($total)){ echo $total; }?> ৳</td>
                  </tr>
              		<tr>
                  <tr>
                    <td style="color:green;font-weight: bold;">Regular Customer Discount</td>
                    <td><?php if(isset($total)){ echo $discount = $total/100*20; }?> ৳</td>
                  </tr>
                  <tr>

              			<td>Delivery</td>
              			<td><?php echo $cost = 120; ?> ৳</td>
              		</tr>
              		<tr>
              			<td>Grand Total</td>
              			<td><b>  <?php if(isset($total)){ echo $total = $total + $cost-$discount; } ?> ৳</b></td>
              		</tr>
                <?php }else {?>
                     <tr>
                    <td>Total Price</td>
                    <td><?php if(isset($total)){ echo $total; }?> ৳</td>
                  </tr>
                  <tr>

                    <td>Delivery</td>
                    <td><?php echo $cost = 120; ?> ৳</td>
                  </tr>
                  <tr>
                    <td>Grand Total</td>
                    <td><b> <?php if(isset($total)){ echo $total = $total + $cost; } ?> ৳</b></td>
                  </tr>
                <?php }}} ?>
              	</table>
              </div>
             
              	<div class="button_forcart">

              		<a style="" href="products.php" class="btn btn-primary">Continue Shopping</a>
              		<a style="float: right;" href="confirm.php?total=<?php  if(isset($total)){echo $total;} ?>" class="btn btn-info" target="_blank">Procced to Checkout</a>
              	</div>
              </div>
            </div>
        </div>
    </div>
</div>
  
    <!-- Subscribe Form Ends Here -->

  <?php include 'parts/footer.php' ?>