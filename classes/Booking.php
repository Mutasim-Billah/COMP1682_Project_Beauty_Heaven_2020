<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Session.php');

include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Booking{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	
 public function viewTime(){
 	$query = "SELECT * FROM working_time";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function bookingMethod($data){
 	$service = $this->fm->validation($data['service']);
 	$staff = $this->fm->validation($data['staff']);
 	$customer_id = $this->fm->validation($data['customer_id']);
 	$date = $data['date'];
 	$time = $this->fm->validation($data['time']);
 	$stype = $this->fm->validation($data['st']);

 	$service = mysqli_real_escape_string($this->db->link, $service);
 	$staff = mysqli_real_escape_string($this->db->link, $staff);
 	$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
 	// $date = mysqli_real_escape_string($this->db->link, $date);
 	$time = mysqli_real_escape_string($this->db->link, $time);

echo $date;
$sq = "SELECT * FROM product WHERE id=$service";
$sqr = $this->db->select($sq);
$price = $sqr->fetch_assoc();
$price = $price['price'];

 	$query = "INSERT INTO booking(service_id, customer_id, staff_id, booking_date, time_id,price,service_type) VALUES('$service', '$customer_id', '$staff', '$date', '$time','$price','$stype')";
			$insert_data = $this->db->insert($query);
		
			if($insert_data){
				echo "<script>alert('Booking Successfull');</script>";

			}else {
				echo "<script>alert('Sorry, Booking Failed!');</script>";
			}

 }

 public function viewBookList(){
 		$query = "SELECT * FROM booking ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewBookListCustomer($id){
 		$query = "SELECT * FROM booking WHERE customer_id=$id";
 	$qres = $this->db->select($query);
 	return $qres;
 }
 public function viewBookListForOneStaff($id){
 		$query = "SELECT * FROM booking WHERE staff_id=$id AND status=0 ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 
 public function completedBookListForOneStaff($id){
 		$query = "SELECT * FROM booking WHERE staff_id=$id AND status=1 ORDER BY id DESC";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 } 
 public function viewServiceEarn(){
 		$query = "SELECT * FROM booking WHERE status=1";
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}
 }
 public function viewServiceEarnByMonth($date,$date2){
 		$query = "SELECT * FROM booking WHERE status=1 AND DATE(created_at) BETWEEN '$date' AND '$date2'";
 		// var_dump($query);
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else{
 		echo 0;
 	}
 }
 public function viewServiceEarnByToday($date){
 		$query = "SELECT * FROM booking WHERE status=1 AND DATE(created_at) BETWEEN '$date' AND CURDATE()";
 		// var_dump($query);
 	$qres = $this->db->select($query);
 	if($qres){
 		return $qres;
 	}else{
 		echo 0;
 	}
 }
 
 public function updateBooking($id){
 		$query = "UPDATE booking SET status=1 WHERE id=$id";
 	$qres = $this->db->update($query);
 	if($qres){
 		$show_booking = "SELECT * FROM booking WHERE id='$id'";
 		$show_booking_r=$this->db->select($show_booking);
 		$sbr=$show_booking_r->fetch_assoc();
 		$staff_id = $sbr['staff_id'];
 		$salary = $sbr['price']/100*20;
 		$insert_salary = "INSERT INTO staff_salary(staff_id,salary)VALUES('$staff_id','$salary')";
 		$insert_salary_r = $this->db->insert($insert_salary);

 		echo "<script>window.location.replace('todo.php')</script>";
 	}
 }
 public function updateBookingPay($id,$amount){
 	$update = "UPDATE booking SET pay_type=1 WHERE id='$id'";
 	$update_results = $this->db->update($update);
 	if($update_results){
 		return $update_results;
 	}
 }
 

}