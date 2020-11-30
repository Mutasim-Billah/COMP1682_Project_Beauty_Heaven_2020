<?php include 'parts/header.php'; 




 if (isset($_GET['total'])){

 $total = $_GET['total'];

$id = Session::get('cmrId');
$user = $cmr -> viewCustoremCheckout($id);
$user = $user->fetch_assoc();
$name = $user['username'];
$email = $user['email'];
$phone = $user['phone'];
$address = $user['address'];

if(isset($_POST['pay'])){

	$pp = $prcs->addToPurchase($id,$total, $_POST);
	if($pp){
		// insert order
		$insert_order = $prcs -> insertIntoOrder($id);
		if($insert_order){
			echo "What is it";
		}
	}
}

?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="width: 25rem;margin: 0 auto;">
				<div class="card-body">
					<p style="font-weight: bold;">Bkash Payment account: 01112345678 & Roket Ac: 0123456789123</p><br>
					<form action="" method="POST">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">৳</span>
				  </div>
				  <input readonly type="text" name="amount" class="form-control" value="<?php echo $total; ?>">
				  <div class="input-group-append">
				    <span class="input-group-text">.00</span>
				  </div>
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Payment Type</label>
					  </div>
					  <select class="custom-select" name="paytype" id="inputGroupSelect01" required>
					    <option value="" selected>Choose...</option>
					    <option value="Bkash">Bkash</option>
					    <option value="Roket">Roket</option>
					  </select>
				</div>
					<div class="input-group mb-3">
					<input class="form-control" type="text" name="number" placeholder="Account Number" required>
					</div>
		<div class="input-group mb-3">
		<input class="form-control" type="text" name="transation_id" placeholder="Transation Id" required>
		</div>
		<div class="input-group mb-3">
			<textarea name="address" class="form-control" id="" cols="30" rows="2" placeholder="Shipping Address" required></textarea>
			
		</div>
		<p style="margin-bottom: 10px;color: red;">Note: Please Provide Your Shipping Address Here.</p>
		<button type="Submit" class="btn btn-primary" name="pay">Submit</button>
			</form>
					</div>
				</div>

		</div>
	</div>
</div>


<?php } ?>






<?php 
include "parts/footer.php";