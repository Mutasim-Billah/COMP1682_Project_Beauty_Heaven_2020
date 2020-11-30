<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');

include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Administrator{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function administrationLogin($data){
		$name = $this->fm->validation($data['user_name']);
		$pass = $this->fm->validation($data['pass']);
		$type = $this->fm->validation($data['user_type']);

		$name = mysqli_real_escape_string($this->db->link, $name);
		$pass = mysqli_real_escape_string($this->db->link, $pass);
		$pass = md5($pass);

		if(empty($name) || empty($pass)){
			$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
		}
		if($type == 1){ //admin login
			$query = "SELECT * FROM admin WHERE admin = '$name' AND pass='$pass'";
					$qres = $this->db->select($query);
					if($qres != false){
							$value = $qres->fetch_assoc();
							Session::set("administrator", true);
							Session::set("admin_login", true);
							Session::set("a_name", $value['admin']);
							echo "<script>window.location.replace('index.php')</script>";
						}else {
						$msg = "<span class='error'> Email/Username And Password Not Matching!</span>";
							return $msg;
						}


			$msg = "<span class='error'> Admin Login </span>";
							return $msg;
		}elseif ($type==0) {//staff login
				$query = "SELECT * FROM staff WHERE email = '$name' AND pass='$pass'";
					$qres = $this->db->select($query);
					if($qres != false){
							$value = $qres->fetch_assoc();
							Session::set("administrator", true);
							Session::set("staff_login", true);
							Session::set("staff_id", $value['id']);
							Session::set("a_name", $value['name']);
							echo "<script>window.location.replace('index.php')</script>";
						}else {
						$msg = "<span class='error'> Email/Username And Password Not Matching!</span>";
							return $msg;
						}
			
		}


 }

}