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
$product = new Product();
$brand = new Brand();
$category = new Category();
$getBrands = $brand->getBrands();
$getProduct = $product->getProducts();
$getCategories = $category->getCategories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <!-- Basic page needs
    ============================================ -->
    <title>My Account::KAPSC</title>
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

<body class="res layout-subpage">
	<div id="wrapper" class="wrapper-full ">
		<!-- Header Container  -->
		<?php include("includes/header-inner.php"); ?>
		<!-- //Header Container  -->
		<!-- Main Container  -->
		<div class="main-container container">
			<ul class="header-main ">
				<li class="home"><a href="#">Home   </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
				<li class="home"><a href="#">Account   </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
				<li>  My Account</li>
			</ul>
			
			<div class="row">
				<!--Middle Part Start-->
				<div class="col-sm-9" id="content">
					<h2 class="title">My Account</h2>
					<p class="lead">Hello, <strong><?=$_SESSION['_customer_name']?></strong></p>
					<form>
						<div class="row">
							<div class="col-sm-6">
								<fieldset id="personal-details">
									<legend>Personal Details</legend>
									<div class="form-group">
										<label for="input-firstname" class="control-label">Full Name : </label>
										 <?=$_SESSION['_customer_name']?>
									</div>
									
									<div class="form-group">
										<label for="input-email" class="control-label">E-Mail : </label>
										<?=$_SESSION['_customer_email']?>
									</div>
									<div class="form-group">
										<label for="input-telephone" class="control-label">Telephone : </label>
										<?=$_SESSION['_customer_phone']?>
									</div>
									<div class="form-group">
										<label for="input-telephone" class="control-label">Company : </label>
										<?=$_SESSION['_customer_company']?>
									</div>
									
								</fieldset>
								<br>
							</div>
							<div class="col-sm-6">
								<fieldset id="personal-details">
									<legend>Address</legend>
									<div class="form-group">
										<label for="input-firstname" class="control-label">Address : </label>
										 <?=$_SESSION['_customer_address']?>
									</div>
									
									<div class="form-group">
										<label for="input-email" class="control-label">City : </label>
										<?=$_SESSION['_customer_city']?>
									</div>
									<div class="form-group">
										<label for="input-telephone" class="control-label">Postcode : </label>
										<?=$_SESSION['_customer_postcode']?>
									</div>
									<div class="form-group">
										<label for="input-telephone" class="control-label">Country : </label>
										<?=$_SESSION['_customer_country']?>
									</div>
									
								</fieldset>
							</div>
						</div>
						


					</form>
				</div>
				<!--Middle Part End-->
				<!--Right Part Start -->
				<aside class="col-sm-3 hidden-xs" id="column-right">
					<h2 class="subtitle">Account</h2>
					<div class="list-group">
						<ul class="list-item">
							
							<li><a href="#">My Account</a>
							</li>
							<li><a href="#">Address Books</a>
							</li>
							<li><a href="wishlist.html">Wish List</a>
							</li>
							<li><a href="order-history.php">Order History</a>
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
							
						</ul>
					</div>
				</aside>
				<!--Right Part End -->
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