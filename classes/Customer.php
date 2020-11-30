<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Customer{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

// customer registration method 
	public function	customerResigtration($data){
		$name = $this->fm->validation($data['username']);
		$email = $this->fm->validation($data['email']);
		$phone = $this->fm->validation($data['phone']);
		$address = $this->fm->validation($data['address']);
		$pass = $this->fm->validation($data['pass']);

		$name = mysqli_real_escape_string($this->db->link, $name);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$phone = mysqli_real_escape_string($this->db->link, $phone);
		$address = mysqli_real_escape_string($this->db->link, $address);
		$pass = mysqli_real_escape_string($this->db->link, $pass);
		$pass = md5($pass);

		if($name == '' || $email  == '' || $phone  == '' || $address  == '' || $pass  == ''){
			$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
		}
		$mailquery = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
		$mailcheck = $this->db->select($mailquery);
		if($mailcheck){
			$msg = "<span class='error'>Your Mail is Listed Please Login!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO customer(username,email,phone, address, pass) VALUES('$name', '$email', '$phone', '$address', '$pass')";
			$insert_data = $this->db->insert($query);
			if($insert_data){
				$msg = "<span class='success'>Registration Complete Successfully</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Registration Failed!</span>";
				return $msg;
			}
		}
	}
// Customer login method 
	public function customerLoigin($data){
				$email = $this->fm->validation($data['email']);
				$pass = $this->fm->validation($data['pass']);
				$email = mysqli_real_escape_string($this->db->link, $email);
				$pass = mysqli_real_escape_string($this->db->link, $pass);
				$pass = md5($pass);
				if(empty($email) || empty($pass)){
					$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
				}else {
					$query = "SELECT * FROM customer WHERE email = '$email' AND pass='$pass'";
					$qres = $this->db->select($query);
					if($qres != false){
						$value = $qres->fetch_assoc();
						Session::set("customre_login", true);
						Session::set("cmrId", $value['id']);
						Session::set("cmrName", $value['username']);
						echo "<script>window.location.replace('index.php')</script>";
					}else {
						$msg = "<span class='error'> Email And Password Not Matching!</span>";
			return $msg;
					}
				}

	}

 public function singleCustomerName($id){
 	$query = "SELECT * FROM customer WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }
 public function viewCustoremCheckout($id){
 		$query = "SELECT * FROM customer WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function viewCustomersForProfile($id){
 		$query = "SELECT * FROM customer WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function updateCustomer($data, $id){
 	$name = $data['name'];
 	$email = $data['email'];
 	$phone = $data['phone'];
 	$address = $data['address'];

 	$name = $this->fm->validation($name);
 	$email = $this->fm->validation($email);
 	$phone = $this->fm->validation($phone);
 	$address = $this->fm->validation($address);

	$name = mysqli_real_escape_string($this->db->link, $name);
	$email = mysqli_real_escape_string($this->db->link, $email);
	$phone = mysqli_real_escape_string($this->db->link, $phone);
	$address = mysqli_real_escape_string($this->db->link, $address);

	$qry = "UPDATE customer SET username='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
	$qreyRes = $this->db->update($qry);
			if($qreyRes){
				$msg = "<span class='success'>Updated Successfully</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Failed To Update!</span>";
				return $msg;
			}
 }
public function updateCustomerPasword($data){
	$pass = $data['pass'];
	$pass2 = $data['pass2'];
	$cid = $data['cid'];
	if(empty($pass) || empty($pass2)){
		$msg = "<span class='error'>Password Can't be Empty!</span>";
				return $msg;
	}elseif ($pass!=$pass2) {
		$msg = "<span class='error'>Password Not Matching!</span>";
				return $msg;
	}
$pass = md5($pass);
	$q = "UPDATE customer SET pass='$pass' WHERE id='$cid'";
	$res = $this->db->update($q);
	// var_dump($res);
	if($res){
		$msg = "<span class='success'>Updated Successfully</span>";
				return $msg;
	}

}
 }
 ?>
