<?php 
include 'parts/header.php'; 

if(isset($_GET['paid']) && isset($_GET['amount'])){

  $id = $_GET['paid'];
  $amount = $_GET['amount'];
  if(isset($_POST['pay'])){
  	
  	$cid = Session::get('cmrId');
  	$insert_pay = $ot-> payService($_POST,$cid);
  	if($insert_pay){
  		  $updateBook = $bk->updateBookingPay($id,$amount);
	echo "<script>window.location.replace('booking.php')</script>";
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
				    <span class="input-group-text">$</span>
				  </div>
				  <input readonly type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
				  <div class="input-group-append">
				    <span class="input-group-text">.00</span>
				  </div>
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Payment Type</label>
					  </div>
					  <select class="custom-select" name="paytype" id="inputGroupSelect01">
					    <option selected>Choose...</option>
					    <option value="Bkash">Bkash</option>
					    <option value="Roket">Roket</option>
					  </select>
				</div>
					<div class="input-group mb-3">
					<input class="form-control" type="text" name="number" placeholder="Account Number">
					</div>
		<div class="input-group mb-3">
		<input class="form-control" type="text" name="transation_id" placeholder="Transation Id">
		</div>
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