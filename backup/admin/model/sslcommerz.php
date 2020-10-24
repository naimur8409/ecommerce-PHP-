<?php
class Sslcommerz{

 private $store_id ="testbox";
 private $store_password ="qwerty";
 private $direct_api_url ="https://sandbox.sslcommerz.com/gwprocess/v4/api.php";
 private $success_url = "http://localhost/estore/success.php";
 private $fail_url = "http://localhost/estore/failed.php";
 private $cancel_url = "http://localhost/estore/cancel.php";

 public function requestSend($post_data){

$data = array();
$data['store_id'] = $this->store_id;
$data['store_passwd'] = $this->store_password;
$data['total_amount'] = $post_data['total_amount'];
$data['currency'] = "BDT";
$data['tran_id'] = $post_data['order_id'];
$data['success_url'] = $this->success_url;
$data['fail_url'] = $this->fail_url;
$data['cancel_url'] = $this->cancel_url;

# CUSTOMER INFORMATION
$data['cus_name'] = $post_data['ship_name'];
$data['cus_email'] = $post_data['email'];
$data['cus_add1'] = $post_data['ship_address'];
$data['cus_add2'] = "Dhaka";
$data['cus_city'] = "Dhaka";
$data['cus_state'] = "Dhaka";
$data['cus_postcode'] = "1000";
$data['cus_country'] = "Bangladesh";
$data['cus_phone'] = $post_data['ship_mobile'];
$data['cus_fax'] = "";

# SHIPMENT INFORMATION
$data['ship_name'] = $post_data['ship_name'];
$data['ship_add1 '] = "Dhaka";
$data['ship_add2'] = "Dhaka";
$data['ship_city'] = "Dhaka";
$data['ship_state'] = "Dhaka";
$data['ship_postcode'] = "1000";
$data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$data['value_a'] = "";
$data['value_b '] = "";
$data['value_c'] = "";
$data['value_d'] = "";


$data['emi_option'] = "0";
$data['shipping_method'] = "NO";
$data['product_name'] = $post_data['product_name'];
$data['product_category'] = 'ecommorce';
$data['product_profile'] = "general";


# REQUEST SEND TO SSLCOMMERZ

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $this->direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
    curl_close( $handle);
    $sslcommerzResponse = $content;
} else {
    curl_close( $handle);
    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
    exit;
}

 return $sslcommerzResponse;
 }


 public function paymentValidation($post_data){


$val_id=urlencode($post_data['val_id']);
$store_id=urlencode($this->store_id);
$store_passwd=urlencode($this->store_password);
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	return true;

} else {

	return false;
}


 }


	
}



?>