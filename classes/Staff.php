<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Staff{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function staffRegistration($data){
		$name = $this->fm->validation($data['name']);
		$email = $this->fm->validation($data['email']);
		$phone = $this->fm->validation($data['phone']);
		$nid = $this->fm->validation($data['nid']);
		$pass = $this->fm->validation($data['pass']);
		$pass2 = $this->fm->validation($data['pass2']);

		$name = mysqli_real_escape_string($this->db->link, $name);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$phone = mysqli_real_escape_string($this->db->link, $phone);
		$nid = mysqli_real_escape_string($this->db->link, $nid);
		$pass = mysqli_real_escape_string($this->db->link, $pass);
		$pass2 = mysqli_real_escape_string($this->db->link, $pass2);
		
	if($pass != $pass2){
			$msg = "<span class='error'>Password Not Matching</span>";
			return $msg;
		}

	if(empty($name) || empty($email) || empty($phone) || empty($nid) || empty($pass) || empty($pass2)) {
			$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
		}else {

// var_dump($_POST);


		 $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['profile']['name'];
		    $file_size = $_FILES['profile']['size'];
		    $file_temp = $_FILES['profile']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		    if (empty($file_name)) {
		    	$msg = "<span class='error'>Please Select any Image !</span>";
				return $msg;
		    }elseif ($file_size >1048567) {
		     	$msg = "<span class='error'>Image Size should be less then 1MB!
		     </span>";
				return $msg;
		    } elseif (in_array($file_ext, $permited) === false) {

		     $msg = "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";
				return $msg;
		    } else{
				    move_uploaded_file($file_temp, $uploaded_image);
				   		$pass = md5($pass);

				$query = "INSERT INTO staff (name,email,phone,nid,pass,profile) VALUES('$name','$email', '$phone', '$nid', '$pass','$uploaded_image')";
				$reg_res = $this->db->insert($query);
				if($reg_res){
					echo "<script>window.location.replace('viewstaff.php')</script>";
					$msg = "<span class='success'>Registration Complete Successfully</span>";
					return $msg;
				}else {
					$msg = "<span class='error'>Your Mail is Listed Please Login!</span>";
					return $msg;
				}
		    }









	



		}

	
		



 }
 public function viewStaffM(){
 	$query = "SELECT * FROM staff";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewStaff_M($id){
 	$query = "SELECT * FROM staff WHERE id='$id'";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewStaffSalary($id){
 	$query = "SELECT * FROM staff_salary WHERE status=1 AND staff_id='$id'";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function totalViewStaffSalary($id){
 	$query = "SELECT COUNT(*) as count FROM staff_salary WHERE status=1 AND staff_id='$id'";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewStaffPaidSalary($id){
 	$query = "SELECT * FROM staff_salary WHERE status=2 AND staff_id='$id'";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function showStaffForChoice(){
 	$query = "SELECT * FROM staff WHERE work_status=1";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function singleStaffName($id){
 	$query = "SELECT * FROM staff WHERE id=$id";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function showStaffStatus($id){
 	$query = "SELECT * FROM staff WHERE id=$id";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewBeautician(){
 	$query = "SELECT * FROM staff LIMIT 4";
 	$qres = $this->db->select($query);
 	return $qres;
 }

 public function viewBeauticianAll(){
 	$query = "SELECT * FROM staff ORDER BY avr_rating DESC";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function updateStatusOnlu(){
 	$status = $_POST['work'];
 	$id = $_POST['stf_id'];

 	$query = "UPDATE staff SET work_status='$status' WHERE id=$id";
 	$qres = $this->db->update($query);
 	if($qres){
 		$msg = "<span class='success'>You are Now Working.</span>";
				return $msg;
 	}
 }
 public function deleteStaff($id){
 	$query = "DELETE FROM staff WHERE id='$id'";
 	$qres = $this->db->delete($query);
 	if($qres){
				$msg = "<span class='success'>Staff Deleted Successfully</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Failed to Delete!</span>";
				return $msg;
			}
 }

public function viewSalary($sid){
	$query = "SELECT * FROM staff_salary WHERE staff_id='$sid' AND status=1";
	$result = $this->db->select($query);
	if($result){
		return $result;
	}
}
public function updateBookingS($id){
	$query = "UPDATE staff_salary SET status=2 WHERE staff_id=$id AND status=1";
	$result = $this->db->update($query);
	if($result){
		echo "<script>window.location.replace('staffsalary.php')</script>";
	}
}

public function updatestaffPasword($data){
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
	$q = "UPDATE staff SET pass='$pass' WHERE id='$cid'";
	$res = $this->db->update($q);
	// var_dump($res);
	if($res){
		$msg = "<span class='success'>Updated Successfully</span>";
				return $msg;
	}

}
public function updateStaff($data){
	
	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nid = $data['nid'];
	$sid = $data['sid'];

	if(empty($name) || empty($email) || empty($phone) || empty($nid)) {
			$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
		}else {
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			    $file_name = $_FILES['image']['name'];
			    $file_size = $_FILES['image']['size'];
			    $file_temp = $_FILES['image']['tmp_name'];

			    $div = explode('.', $file_name);
			    $file_ext = strtolower(end($div));
			    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "uploads/".$unique_image;

		 if (empty($file_name)) {
		    	$update_q = "UPDATE staff SET name='$name', email='$email', phone='$phone', nid='$nid' WHERE id=$sid";
		    	$update_r = $this->db->update($update_q);
		    	if($update_r){
		    			$msg = "<span class='success'>Product Update Successfully</span>";
						return $msg;
		    		}else {
		    			$msg = "<span class='error'>Product Update Failed!</span>";
						return $msg;
		    		}
		   }else{
		   	$imgunset = "SELECT profile FROM staff WHERE id=$sid";
		   	$imgunset_r = $this->db->select($imgunset);
		   	// var_dump($imgunset_r);
		   	if($imgunset_r->type>0){
		   		$imgr = $imgunset_r->fetch_assoc();
				unlink($imgr['profile']);
				print_r($imgunset_r);
		   	}






			    if (empty($file_name)) {
			    	$msg = "<span class='error'>Please Select any Image !</span>";
					return $msg;
			    }elseif ($file_size >1048567) {
			     	$msg = "<span class='error'>Image Size should be less then 1MB!
			     </span>";
					return $msg;
			    } elseif (in_array($file_ext, $permited) === false) {

			     $msg = "<span class='error'>You can upload only:-"
			     .implode(', ', $permited)."</span>";
					return $msg;
			    } else{
					    move_uploaded_file($file_temp, $uploaded_image);

					    $update_q = "UPDATE staff SET name='$name', email='$email', phone='$phone', nid='$nid', profile='$uploaded_image' WHERE id=$sid";
		    			$update_r = $this->db->update($update_q);
					    if ($update_r) {
$msg = "<span class='success'>Product Update Successfully</span>";
						return $msg;

						 }else {
						   $msg = "<span class='error'>Product Not Inserted !</span>";
							return $msg;
						    }
			    }



		   }

		}

}


}