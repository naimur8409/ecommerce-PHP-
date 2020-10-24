<?php
session_start();
 if(isset($_SESSION['_cart']) && array_key_exists($_POST['id'],  $_SESSION['_cart']))
		 {
		 	unset($_SESSION['_cart'][$_POST['id']]);
		 }



 $total = 0;
 $items = 0;
foreach($_SESSION['_cart'] as $key=>$cart)
	 {
	 	$total = $total + $cart['price'] * $cart['quantity'];
	 	$items++;

	 }

echo json_encode(['total'=>$total, 'items'=>$items, 'cart'=>$_SESSION['_cart']]);
?>