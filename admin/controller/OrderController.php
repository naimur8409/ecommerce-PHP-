<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/order.php");
include("../model/sslcommerz.php");
$order = new Orders();
$payment = new Sslcommerz();
switch($_POST['action']){

   case "save_order": 
   
  $order->customer_id = $_SESSION['_customer_id'];
  $order->ship_name = $_POST['ship_name'];
  $order->ship_mobile = $_POST['ship_mobile'];
  $order->ship_address = $_POST['ship_address'];
  $order->ship_city = $_POST['ship_city'];
  $order->ship_postcode = $_POST['ship_postcode'];
  $order->ship_country = $_POST['ship_country'];
  $order->shipping_method = $_POST['shipping_method'];
  $order->payment_method = $_POST['payment_method'];
  $order->amount = $_POST['total_amount'];
  $order->shipping_amount = $_POST['shipping_method'];
	$order_id = $order->save();
	
    if($order_id)
        	 {

            foreach ($_SESSION['_cart'] as $key => $cart) {
                $order->id = $order_id;
                $order->product_id = $key;
                $order->name = $cart['name'];
                $name[] = $cart['name'];
                $order->quantity = $cart['quantity'];
                $order->price = $cart['price'];
                $order->image = $cart['image'];
                $order_details_id = $order->saveOrderDetails();
            }
            
            $sms = "Dear ".$_SESSION['_customer_name']." your order has been placed!!";
            $mobile = $_SESSION['_customer_phone'];
            $send_sms = $order->sendSMS($mobile, $sms);
            
            $_SESSION['new_order_id'] = $order_id;

            $_POST['order_id'] = $order_id;
            $_POST['product_name'] = json_encode($name);
            $_POST['email'] = $_SESSION['_customer_email'];

            if($_POST['payment_method']=="sslcommerz"){
                 
                 $payment_information = $payment->requestSend($_POST);

                 $decode_value = json_decode($payment_information, true);

              header("Location:".$decode_value['GatewayPageURL']);
              exit();

            }else{

              header("Location:../../success.php");

            }

        	 
         }
     break;

   case "update_product":

  

   case "delete_product":
   
     $delete = $order->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Delete order successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../order_list.php");
	 
    
     break;

  default:

  header("Location:../login.php");

}





?>