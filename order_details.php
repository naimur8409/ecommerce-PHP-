<?php
session_start();
if(empty($_SESSION["_customer_id"]))
{
header("Location:login.php");
exit();
}

unset($_SESSION['_cart']);

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
$getOrder = $order->getOrdersById($_GET['id']);
$getOrderDetails = $order->getOrderDetailsByOrderId($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <!-- Basic page needs
    ============================================ -->
    <title>Success::KAPSC</title>
    <meta charset="utf-8">
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

<body class="common-home res layout-subpage">
	<div id="wrapper" class="wrapper-full ">
		<!-- Header Container  -->
		<?php include("includes/header-inner.php"); ?>
		<!-- //Header Container  -->
		<!-- Main Container  -->
		<div class="main-container container">
			<ul class="header-main ">
				<li class="home"><a href="#">Home   </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
				<li> Order Infomation</li>
			</ul>
			
			<div class="row">
				
				<!--Middle Part Start-->
				<div id="content" class="col-sm-12">
					<h2 class="title">Order Information</h2>

					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td colspan="2" class="text-left">Order Details</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width: 50%;" class="text-left"> <b>Order ID:</b> #<?=$_SESSION['new_order_id']?>
									<br>
									<b>Date Added:</b> <?=$getOrder['created_at']?></td>
									<td style="width: 50%;" class="text-left"> <b>Payment Method:</b> <?=$getOrder['payment_method']?>
										<br>
										<b>Shipping Method:</b> <?=$getOrder['shipping_method']?> </td>
									</tr>
								</tbody>
							</table>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
										<td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-left"><?=$_SESSION['_customer_name']?>
											<br><?=$_SESSION['_customer_address']?>
											<br><?=$_SESSION['_customer_city']?>
											<br><?=$_SESSION['_customer_postcode']?>
											<br><?=$_SESSION['_customer_country']?></td>
											<td class="text-left"><?=$getOrder['ship_name']?>
												<br><?=$getOrder['ship_address']?>
												<br><?=$getOrder['ship_city']?>
												<br><?=$getOrder['ship_postcode']?>
												<br><?=$getOrder['ship_country']?></td>
											</tr>
										</tbody>
									</table>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<td class="text-left">Product Name</td>
													<td class="text-right">Quantity</td>
													<td class="text-right">Price</td>
													<td class="text-right">Total</td>
													<td style="width: 20px;"></td>
												</tr>
											</thead>
											<tbody>
												<?php foreach($getOrderDetails as $product){ ?>
												<tr>
													<td class="text-left"><?=$product['name']?> </td>
													<td class="text-right"><?=$product['quantity']?></td>
													<td class="text-right">TK. <?=$product['price']?></td>
													<td class="text-right">TK. <?=$product['price']*$product['quantity']?></td>
													<td style="white-space: nowrap;" class="text-right"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="#" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
														<a class="btn btn-danger" title="" data-toggle="tooltip" href="return.html" data-original-title="Return"><i class="fa fa-reply"></i></a>
													</td>
												</tr>
                                                <?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td class="text-right"><b>Sub-Total</b>
													</td>
													<td class="text-right">TK. <?=$getOrder['amount']-$getOrder['shipping_amount']?></td>
													<td></td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td class="text-right"><b>Shipping Rate</b>
													</td>
													<td class="text-right">TK. <?=$getOrder['shipping_amount']?></td>
													<td></td>
												</tr>
												
												<tr>
													<td colspan="2"></td>
													<td class="text-right"><b>Total</b>
													</td>
													<td class="text-right">TK. <?=$getOrder['amount'];?></td>
													<td></td>
												</tr>
											</tfoot>
										</table>
									</div>
									
									<div class="buttons clearfix">
										<div class="pull-right"><a class="btn btn-primary" href="index.php">Continue</a>
										</div>
									</div>



								</div>
								<!--Middle Part End-->
						
								</div>
							</div>
							<!-- //Main Container -->


							<!-- Footer Container -->
						<?php include("includes/footer-inner.php"); ?>
	<!-- //end Footer Container -->

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