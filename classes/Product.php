<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Product{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addProduct($data){
		$name = $this->fm->validation($data['name']);
		$details = $this->fm->validation($data['details']);
		$price = $this->fm->validation($data['price']);
		$type = $this->fm->validation($data['type']);
		$quentity = $this->fm->validation($data['quentity']);
		

		$name = mysqli_real_escape_string($this->db->link, $name);
		$details = mysqli_real_escape_string($this->db->link, $details);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$type = mysqli_real_escape_string($this->db->link, $type);
		$quentity = mysqli_real_escape_string($this->db->link, $quentity);
	
		

	if(empty($name) || empty($details) || empty($price) || empty($type) || empty($quentity) ) {
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
				    $query = "INSERT INTO product (name,details,price,image,type,quentity)
				    VALUES('$name','$details','$price','$uploaded_image','$type','$quentity')";
				    $inserted_rows = $this->db->insert($query);
				    if ($inserted_rows) {

				   	echo "<script>window.location.replace('viewproduct.php')</script>";

					 }else {
					   $msg = "<span class='error'>Product Not Inserted !</span>";
						return $msg;
					    }
		    }
	}
 }
 public function updateProduct($data){
 	$pname = $data['name'];
 	$pid = $data['pid'];
 	$details = $data['details'];
 	$price = $data['price'];
 	$qnt = $data['quentity'];
 	// $image = $data['image'];
 	
 	if(empty($pname) || empty($details) || empty($price) || empty($qnt) ) {
			$msg = "<span class='error'> Fields Can't be Empty</span>";
			return $msg;
		}else{



				$permited  = array('jpg', 'jpeg', 'png', 'gif');
			    $file_name = $_FILES['image']['name'];
			    $file_size = $_FILES['image']['size'];
			    $file_temp = $_FILES['image']['tmp_name'];

			    $div = explode('.', $file_name);
			    $file_ext = strtolower(end($div));
			    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "uploads/".$unique_image;

		 if (empty($file_name)) {
		    	$update_q = "UPDATE product SET name='$pname', details='$details', price='$price', quentity='$qnt' WHERE id=$pid";
		    	$update_r = $this->db->update($update_q);
		    	if($update_r){
		    			$msg = "<span class='success' style='color:green'>Updated Successfully</span>";
						return $msg;
		    		// var_dump($update_q);
		    		}else {
		    			$msg = "<span class='error'>Product Update Failed!</span>";
						return $msg;
		    		}
		   }else{
		   	$imgunset = "SELECT * FROM product WHERE id=$pid";
		   	$imgunset_r = $this->db->select($imgunset);
		   	$imgr = $imgunset_r->fetch_assoc();
		   	unlink($imgr['image']);





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
					    $update_q = "UPDATE product SET name='$pname', details='$details', price='$price', quentity='$qnt',image='$uploaded_image' WHERE id=$pid";
		    			$update_r = $this->db->update($update_q);
					    if ($update_r) {
// var_dump($update_q);
					   	echo "<script>window.location.replace('viewproduct.php')</script>";

						 }else {
						   $msg = "<span class='error'>Product Not Inserted !</span>";
							return $msg;
						    }
			    }



		   }


		}

 }
 public function viewProductList(){
 	$query = "SELECT * FROM product WHERE type=1";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function productStockCheck(){
 	$query = "SELECT * FROM product WHERE quentity<=15";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewServiceList(){
 	$query = "SELECT * FROM product WHERE type=2";
 	$qres = $this->db->select($query);
 	return $qres;
 }

 public function viewProductOnly(){
 	$query = "SELECT * FROM product WHERE type=1";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }

 public function viewServiceOnly(){
 	$query = "SELECT * FROM product WHERE type=2 ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }
 public function showSingleProduct($id){
 	$query = "SELECT * FROM product WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }
 public function showSingleService($id){
 	$query = "SELECT * FROM product WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }

 public function showServiceForChoice(){
 	$query = "SELECT * FROM product WHERE type=2";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }
 public function singleServiceName($id){
 	$query = "SELECT * FROM product WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else {
 		echo "Problem Detected";
 	}
 	
 }
 public function viewProductForCart($id){

 	$query = "SELECT * FROM product WHERE id=$id";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 	
 }

 public function deleteProduct($id){


		  $getquery = "SELECT * FROM product WHERE id='$id'";
		   $getImg = $this->db->select($getquery);
		   if ($getImg) {
		    while ($imgdata = $getImg->fetch_assoc()) {
			    $delimg = $imgdata['image'];
			    // echo $delimg;
			    unlink($delimg);

			    	$query = "DELETE FROM product WHERE id='$id'";
 					$qres = $this->db->delete($query);

			    	echo "<script>window.location.replace('viewproduct.php')</script>";
				    }
			   }
		
 }

}
