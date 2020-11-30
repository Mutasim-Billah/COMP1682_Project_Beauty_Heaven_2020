<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Other{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	
 public function singleTimeName($id){
 	$query = "SELECT * FROM working_time WHERE id=$id";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewOrderList(){
 	$query = "SELECT * FROM order_list ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function deliveryProduct($id){
 	$q = "UPDATE order_list SET status=2 WHERE id='$id'";
 	$qr = $this->db->update($q);
 	if($qr){
 	    echo "<script>window.location.replace('orderlist.php')</script>";
 	}else{
 		$msg = "<span class='error'>Failed To Update!</span>";
		return $msg;
 	}
 }
public function payService($data,$cid){
	$amount = $data['amount'];
  	$paytype = $data['paytype'];
  	$ac = $data['number'];
  	$tid = $data['transation_id'];

  	$query = "INSERT service_pay(cid,pay_type,account,tr_id,amount)VALUES('$cid', '$paytype', '$ac', '$tid','$amount')";
  	$result = $this->db->insert($query);
  	if($result){
  		return $result;
  	}
 }
public function viewPremiumCustomerData($id){
	$q = "SELECT COUNT(*) as count FROM product_purchess WHERE customer_id='$id'";
	$res = $this->db->select($q);
	if($res){
		return $res;
	}
}
public function sendContact($data){
	$name = $data['name'];
	$email = $data['email'];
	$subject = $data['subject'];
	$msg = $data['message'];

	$name = mysqli_real_escape_string($this->db->link, $name);
	$email = mysqli_real_escape_string($this->db->link, $email);
	$subject = mysqli_real_escape_string($this->db->link, $subject);
	$msg = mysqli_real_escape_string($this->db->link, $msg);

	if(empty($name) || empty($email) || empty($subject) || empty($msg)){
		$msg = "<span class='error'>Field Can't be Empty.</span>";
		return $msg;
	}else {
		$insert = "INSERT INTO contact (name,email,subject,message)VALUES('$name','$email','$subject','$msg')";
		$results = $this->db->insert($insert);
		if($results){
			$msg = "<span class='success'>Thank you for your Message.</span>";
			return $msg;
		}
	}

}
public function viewContactMessage(){
	$data = "SELECT * FROM contact";
	$result = $this->db->select($data);
	if($result){
		return $result;
	}
}
public function deleteContact($id){
	$query = "DELETE FROM contact WHERE id='$id'";
	$results = $this->db->delete($query);
	if($results){
		echo "<script>window.location.replace('contact.php')</script>";
	}
}
public function checkMail($data){
	$email = $data['email'];
	$checkemial = "SELECT * FROM customer WHERE email='$email'";
	$check_result = $this->db->select($checkemial);
	if($check_result){
		return $check_result;
	}else {
		$msg = "<span class='success'>This Email is not registred.</span>";
		return $msg;
	}
}
public function checkStaffMail($data){
	$email = $data['email'];
	$checkemial = "SELECT * FROM staff WHERE email='$email'";
	$check_result = $this->db->select($checkemial);
	if($check_result){
		return $check_result;
	}else {
		$msg = "<span class='success'>This Email is not registred.</span>";
		return $msg;
	}
}
public function insertPass($mail,$pass){
	$pass= md5($pass);
	$update = "UPDATE customer SET pass='$pass' WHERE email='$mail'";
	$result = $this->db->update($update);
	if($result){
		return $result;
	}else {
		$msg = "<span class='success'>Password Not Updated.</span>";
		return $msg;
	}
}public function updateStaffPass($mail,$pass){
	$pass= md5($pass);
	$update = "UPDATE staff SET pass='$pass' WHERE email='$mail'";
	$result = $this->db->update($update);
	if($result){
		return $result;
	}else {
		$msg = "<span class='success'>Password Not Updated.</span>";
		return $msg;
	}
}
}