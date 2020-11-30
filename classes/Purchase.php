<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Purchase{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addToPurchase($id,$total,$data){
		$paytype = $data['paytype'];
		$account = $data['number'];
		$oid = $data['transation_id'];
		$address = $data['address'];
		if(empty($account) || empty($oid) || empty($address)){
				$msg = "<span class='error'>Please Provide All Information.</span>";
				return $msg;
		}else{
			$query = "INSERT INTO product_purchess(customer_id,payment_type,total_cost,status,order_id,account,shipping_address) VALUES('$id', '$paytype', '$total', 1, '$oid','$account','$address')";
			$insert_data = $this->db->insert($query);
			if($insert_data){

				$msg = "<span class='success'>Order Completed Successfully.</span>";
				return $msg;
	
			}else {
				$msg = "<span class='error'>Failed to Add!</span>";
				return $msg;
			}
		}
		
	}
	public function viewPid($sid){
 	$query = "SELECT * FROM cart WHERE session_id='$sid'";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {

 		echo "<span class='error'>Some Thing Wrong!</span>";
 		var_dump($qres);
 		echo $sid;
 
 	}
 }
 public function insertReviewList($pid,$uid){
 	$query = "INSERT INTO review_list(uid,pid) VALUES('$uid', '$pid')";
			$insert_data = $this->db->insert($query);
			if($insert_data){
				$msg = "<span class='success'> Successfull</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Failed!</span>";
				return $msg;
			}
 }
 public function delCart($id){
 	$del = "DELETE FROM cart WHERE customer_id=$id";

 	$delRes = $this->db->delete($del);
 	 	var_dump($del);
 	 	echo "func";
 } 
 public function viewPurchase($id){
 		$query = "SELECT * FROM product_purchess WHERE customer_id='$id' ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function updateTransection($id){
 		$query = "UPDATE product_purchess SET status='2' WHERE id='$id'";
 	$qres = $this->db->update($query);
 		if($qres){
				echo "<script> alert('Successfully Updated');</script>";
				echo "<script>window.location.replace('transectionlist.php')</script>";

			}else {
				$msg = "<span class='error'> Failed to Add, Try Again!</span>";
			return $msg;
			}
 }
 public function viewAllPurchase(){
 		$query = "SELECT * FROM product_purchess ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function decreaseProduct($pid,$qnt){
 	$query = "SELECT * FROM product WHERE id=$pid";
 	$qres = $this->db->select($query);
 	$qres = $qres->fetch_assoc();
 	$total_qnt = $qres['quentity'];
 	$total = $total_qnt - $qnt;

 	$update = "UPDATE product SET quentity=$total WHERE id=$pid";
 	$upres = $this->db->update($update);
 }
public function viewTotalEarn(){
	$qry = "SELECT * FROM product_purchess";
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}
}
public function viewTotalEarnByDate($date,$date2){

	$qry = "SELECT total_cost FROM product_purchess WHERE DATE(created_at) BETWEEN '$date' AND '$date2'";
	// var_dump($qry);
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}else{
 		echo 0;
 	}
}
public function viewTotalEarnToday($date){

	$qry = "SELECT total_cost FROM product_purchess WHERE DATE(created_at) BETWEEN '$date' AND CURDATE()";
	// var_dump($qry);
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}else{
 		echo 0;
 	}
}
public function viewTotalDeliveryCost(){
	$qry = "SELECT COUNT(*) FROM product_purchess";
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}
}
public function viewTotalDeliveryCostByMonth($date,$date2){
	$qry = "SELECT COUNT(*) FROM product_purchess WHERE DATE(created_at) BETWEEN '$date' AND '$date2'";
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}
}
public function viewTotalDeliveryCostByToday($date){
	$qry = "SELECT COUNT(*) FROM product_purchess WHERE DATE(created_at) BETWEEN '$date' AND CURDATE()";
	$res = $this->db->select($qry);
	if($res){
		return $res;
	}
}



public function insertIntoOrder($id){

$viewCart = "SELECT * FROM cart WHERE customer_id=$id";
				$viewCartR = $this->db->select($viewCart);
				if($viewCartR){
					while ($cp = $viewCartR->fetch_assoc()) {
						$pid = $cp['product_id'];
						$cid = $cp['customer_id'];
						$qnt = $cp['quentity'];
						$price = $cp['price'];

// select spacific quentity
						$product_quentity = "SELECT quentity FROM product WHERE id=$pid";
						$product_quentity_res = $this->db->select($product_quentity);
						$product_q_r= $product_quentity_res->fetch_assoc();
						$p_q_r = $product_q_r['quentity'];
						$t_p_q = $p_q_r - $qnt;
// update quentity 
						$product_qnt_update = "UPDATE product SET quentity=$t_p_q WHERE id=$pid";
						$udate_q = $this->db->update($product_qnt_update);

						$addQ = "INSERT INTO order_list(product_id, customer_id, quentity, price, status)VALUES('$pid', '$cid', '$qnt', '$price', '1')";
						$addR = $this->db->insert($addQ);
						if($addR){
							$delet = "DELETE FROM cart WHERE customer_id=$cid AND product_id=$pid";
							$del_res = $this->db->delete($delet);
						}
						
					}

					// redirect aftere success
					echo "<script>window.location.replace('order.php')</script>";
				}

}



}