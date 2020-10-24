<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/order.php");
$order = new Orders();

$order->payment_status = $_POST['payment_status'];
$order->status = $_POST['order_status'];
$update = $order->orderStatusUpdate($_POST['order_id']);

if($update)
  {
  	echo json_encode(['code'=>200, 'message'=>"Success"]);
  }
  else{
  	echo json_encode(['code'=>201, 'message'=>"Failed"]);
  }



?>