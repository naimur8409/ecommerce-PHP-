<?php
session_start();
include("../admin/dbconnection/dbconnection.php");
include("../admin/model/review.php");
$review = new Review();
 if(!isset($_SESSION['_customer_id']) && empty($_SESSION['_customer_id'])){
   echo json_encode(['code'=>202, 'message'=>'Please sign-up or sign-in first!!']);
   exit();
 }

$review->customer_id = $_SESSION['_customer_id'];
$review->customer_name = $_SESSION['_customer_name'];
$review->product_id = $_POST['product_id'];
$review->review = $_POST['review'];
$review->rating = $_POST['rating'];
$id = $review->save();

if($id){
	echo json_encode(['code'=>200, 'message'=>'Thank your for review!. We will publish after admin approval!!']);
}
else{

	echo json_encode(['code'=>201, 'message'=>'Unable to subscribe!!']);
}

?>