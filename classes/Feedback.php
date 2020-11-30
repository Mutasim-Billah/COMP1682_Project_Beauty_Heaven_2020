<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath. '/../lib/Database.php');
include_once ($filepath. '/../helpers/Format.php'); ?>

<?php
class Feedback{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

public function checkFeedback($id,$stf){
	$query = "SELECT * FROM booking WHERE customer_id=$id AND staff_id=$stf";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function insertFeedback($cmr_id,$stf_id,$type,$data){
	          $rating = $data['demo'];
				 	$details = $data['review'];
	$qry = "INSERT INTO feedback(customer_id,staff_or_product_id,feedback_type,details,rating) VALUES('$cmr_id','$stf_id','$type', '$details','$rating')";
	$qry_res = $this->db->insert($qry);
	if($qry_res){


		
				$select_review_q = "SELECT AVG(rating) as rating FROM feedback WHERE feedback_type=2 AND staff_or_product_id='$stf_id' AND rating>0";
				$srr = $this->db->select($select_review_q);
				
				if($srr){
				 $srrs=$srr->fetch_assoc();
					     $rating = floatval($srrs['rating']);
					    
					    
					    $update_q = "UPDATE staff SET avr_rating='$rating' WHERE id='$stf_id'";
					    $update_q_r = $this->db->update($update_q);
					    if($update_q_r){
					    	$msg = "<span class='text-success'>Thank You For Your Important Comment.</span>";
								return $msg;
					    }

					
						
				}else{
					echo "error";
				}

				






			
			}else {
				$msg = "<span class='error'>Something Wrong, Try again!</span>";
				return $msg;
			}
}

public function insertFeedbackProduct($cmr_id,$pid,$type,$data){
					$details = $data['review'];
                    $rating = $data['demo'];
					if(empty($rating)){
						$msg = "<span class='error'>Rating can't be Empty!</span>";
								return $msg;
					}elseif (empty($details)) {
							$msg = "<span class='error'>Details can't be Empty!</span>";
								return $msg;
					}


	$details = mysqli_real_escape_string($this->db->link, $details);
	$qry = "INSERT INTO feedback(customer_id,staff_or_product_id,feedback_type,details,rating) VALUES('$cmr_id','$pid','$type', '$details','$rating')";
	$qry_res = $this->db->insert($qry);
	if($qry_res){
		
				$msg = "<span class='text-success'>Thank You For Your Important Comment.</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Something Wrong, Try again!</span>";
				return $msg;
			}
}
public function viewReviewsStaff($id){
		$query = "SELECT feedback.*, customer.username FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.id WHERE feedback.staff_or_product_id=$id AND feedback.feedback_type=1 ORDER BY rating DESC";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function checkProductFeedback($uid,$pid){
	$query = "SELECT * FROM order_list WHERE customer_id=$uid AND product_id=$pid";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function checkStaffFbAvailability($sid,$cid){
	$query = "SELECT * FROM feedback WHERE staff_or_product_id=$sid AND customer_id=$cid AND feedback_type=1";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function checkProductFbAvailability($pid,$cid){
	$query = "SELECT * FROM feedback WHERE staff_or_product_id=$pid AND customer_id=$cid AND feedback_type=2";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function viewReviewsProduct($id){
		$query = "SELECT feedback.*, customer.username FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.id WHERE feedback.staff_or_product_id=$id AND feedback.feedback_type=2";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function viewFeedBack(){
	$qry = "SELECT customer.username, feedback.* FROM feedback INNER JOIN customer ON  customer.id=feedback.customer_id WHERE feedback.feedback_type=2";
	$qres = $this->db->select($qry);
	if($qres){
		return $qres;
	}
}
public function viewFeedBackStaff(){
	$qry = "SELECT customer.username, feedback.* FROM feedback INNER JOIN customer ON  customer.id=feedback.customer_id WHERE feedback.feedback_type=1";
	$qres = $this->db->select($qry);
	if($qres){
		return $qres;
	}
}
public function deleteFeedback($id){
	$qry = "DELETE FROM feedback WHERE id=$id";
	$qres = $this->db->delete($qry);
	if($qres){
				$msg = "<span class='text-success'>Review Deleted.</span>";
				return $msg;
			}else {
				$msg = "<span class='error'>Something Wrong, Try again!</span>";
				return $msg;
			}
}
public function showProductReview(){
	$query = "SELECT * FROM feedback WHERE feedback_type=2 ORDER BY id DESC";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}
public function showStaffReview(){
	$query = "SELECT * FROM feedback WHERE feedback_type=1  ORDER BY id DESC";
	$qres = $this->db->select($query);
	if($qres){
		return $qres;
	}
}

 }
 ?>
