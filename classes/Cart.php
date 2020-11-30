<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Cart{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	
 public function addToCart($data){
 		$pid = $this->fm->validation($data['pid']); // product id
 		$sid = $this->fm->validation($data['sid']); // Session id
 		$cid = $this->fm->validation($data['cid']); // customr id
 		$qnt = $this->fm->validation($data['qnt']); // quentity
 		$price = $this->fm->validation($data['price']); // price id

		$pid = mysqli_real_escape_string($this->db->link, $pid);
		$qnt = mysqli_real_escape_string($this->db->link, $qnt);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$total = $price * $qnt;

		if(empty($qnt)){
			$msg = "<span class='error'> Quentity Can't be Empty</span>";
			return $msg;
		}else {
			$query = "INSERT INTO cart(product_id, session_id, quentity, price, customer_id)VALUES
			('$pid','$sid', '$qnt','$total', '$cid')";
			$qr = $this->db->insert($query);
			if($qr){
				echo "<script> alert('Successfully Added');</script>";
				echo "<script>window.location.replace('products.php')</script>";

			}else {
				$msg = "<span class='error'> Failed to Add, Try Again!</span>";
			return $msg;
			}
		}
 }
 public function checkCart($id){
 		$query = "SELECT * FROM cart WHERE session_id='$id'";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function checkCartProduct($sid,$pid){
 		$query = "SELECT * FROM cart WHERE session_id='$sid' AND product_id=$pid";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function viewCart($sid){
 	$query = "SELECT * FROM cart WHERE session_id='$sid'";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function viewCartCheckout($sid){
 	$query = "SELECT * FROM cart WHERE session_id='$sid'";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 } 
 public function DelCart($id){
 	$query = "DELETE FROM cart WHERE id=$id";
 	$qres = $this->db->delete($query);
 	if($qres){
 		echo "<script>window.location.replace('cart.php')</script>";
 	}
 }
 public function updateCart($data){
 	$pid = $this->fm->validation($data['pid']); // cart id
 	$cid = $this->fm->validation($data['cid']); // cart id
 	$qt = $this->fm->validation($data['qt']); // quentity
 	$price = $this->fm->validation($data['price']); // quentity
 	$price = $price * $qt;
 	$query = "UPDATE cart SET quentity=$qt, price=$price WHERE customer_id='$cid' AND product_id='$pid'";
 	$qres = $this->db->update($query);
 	if($qres){
 		echo "<script>window.location.replace('cart.php')</script>";
 	}
 }

}