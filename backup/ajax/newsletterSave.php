<?php
include("../admin/dbconnection/dbconnection.php");
include("../admin/model/customer.php");
$customer = new Customer();
echo $_POST['email'];
$customer->email = $_POST['email'];
$newsleter_id = $customer->newsLetter();

if($newsleter_id){
	echo json_encode(['code'=>200, 'message'=>'Thank your for subscribe!!']);
}
else{

	echo json_encode(['code'=>201, 'message'=>'Unable to subscribe!!']);
}

?>