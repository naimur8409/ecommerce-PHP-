<?php
session_start();
if(empty($_SESSION["_customer_id"]))
{
header("Location:login.php");
exit();
}

include("admin/dbconnection/dbconnection.php");
include("admin/model/brand.php");
include("admin/model/product.php");
include("admin/model/category.php");
include("admin/model/order.php");
$product = new Product();
$brand = new Brand();
$category = new Category();
$order = new Orders();
$getBrands = $brand->getBrands();
$getProduct = $product->getProducts();
$getCategories = $category->getCategories();

$orders = $order->getOrderByCustomerId($_SESSION['_customer_id']);

$order_status = ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancel'];

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
    <!-- Basic page needs
    ============================================ -->
    <title>Order History::eStore</title>
    
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Google web fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/themecss/lib.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    
	<!-- Theme CSS
	============================================ -->
	<link href="css/themecss/so_megamenu.css" rel="stylesheet">
	<link href="css/themecss/so-categories.css" rel="stylesheet">
	<link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
	<link href="css/footer1.css" rel="stylesheet">
	<link href="css/header1.css" rel="stylesheet">
	<link id="color_scheme" href="css/theme.css" rel="stylesheet">
	
	<!-- <link href="css/responsive.css" rel="stylesheet"> -->
	
	
	
</head>

<body class="res layout-subpage">
	<div id="wrapper" class="wrapper-full ">
		<!-- Header Container  -->
		<?php include("includes/header-inner.php"); ?>
		<!-- //Header Container  -->
		<!-- Main Container  -->
		<div class="main-container container">
			<ul class="header-main ">
				<li class="home"><a href="#">Home   </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
				<li> Order History</li>
			</ul>
			
			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-sm-9">
					<h2 class="title">Order History</h2>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<td class="text-center">Order ID</td>
									<td class="text-center">Customer Name</td>
									<td class="text-center">Payment Status</td>
									<td class="text-center">Order Status</td>
									<td class="text-center">Payment Method</td>
									<td class="text-center">Date Added</td>
									<td class="text-right">Total</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php 
                                
								foreach ($orders as $key => $value) {
								 ?>
								<tr>
									
									<td class="text-center">#<?=$value['id']?></td>
									<td class="text-center">
										<?=$_SESSION['_customer_name']?>
									</td>
									<td class="text-center"><?=$value['payment_status']?></td>
									<td class="text-center"><?=$order_status[$value['status']]?></td>
									<td class="text-center"><?=$value['payment_method']?></td>
									<td class="text-center"><?=$value['created_at']?></td>
									<td class="text-right">TK. <?=$value['amount']?></td>
									<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="order_details.php?id=<?=$value['id']?>" data-original-title="View"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								<?php } ?>
								
							</tbody>
						</table>
					</div>

				</div>
				<!--Middle Part End-->
				<!--Right Part Start -->
				<aside class="col-sm-3 hidden-xs" id="column-right">
					<h2 class="subtitle">Account</h2>
					<div class="list-group">
						<ul class="list-item">
							
							</li>
							<li><a href="#">Forgotten Password</a>
							</li>
							<li><a href="#">My Account</a>
							</li>
							<li><a href="#">Address Books</a>
							</li>
							<li><a href="wishlist.html">Wish List</a>
							</li>
							<li><a href="#">Order History</a>
							</li>
							<li><a href="#">Downloads</a>
							</li>
							<li><a href="#">Reward Points</a>
							</li>
							<li><a href="#">Returns</a>
							</li>
							<li><a href="#">Transactions</a>
							</li>
							<li><a href="#">Newsletter</a>
							</li>
							<li><a href="#">Recurring payments</a>
							</li>
						</ul>
					</div>			</aside>
					<!--Right Part End -->
				</div>
			</div>
			<!-- //Main Container -->
			

			<!-- Footer Container -->
			<?php include("includes/footer-inner.php"); ?>
			</div>
			<!-- Social widgets -->
			<?php include("includes/footer-bottom.php"); ?>	<!-- End Social widgets -->
<!-- Include Libs & Plugins
	============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/themejs/libs.js"></script>
	<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
	
	
	<!-- Theme files
	============================================ -->
	
	
	<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="js/themejs/addtocart.js"></script>
	<script type="text/javascript" src="js/themejs/application.js"></script>
	
	
</body>
</html>