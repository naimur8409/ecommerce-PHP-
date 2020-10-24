
<?php
session_start();
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
    <title>Cart::eStore</title>
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
	<link href="css/checkout.css" rel="stylesheet">
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
				<li> Shopping Cart</li>
			</ul>
			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-sm-12">
					<h2 class="title">Shopping Cart</h2>
					<div class="table-responsive form-group">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td class="text-center">Image</td>
									<td class="text-left">Product Name</td>
									<td class="text-left">Quantity</td>
									<td class="text-right">Unit Price</td>
									<td class="text-right">Total</td>
								</tr>
							</thead>
							<tbody>
								<?php 
                                  
								foreach($_SESSION['_cart'] as $k=>$cart){ ?>
								<tr>
									<td class="text-center"><a href="product.php?id=<?=$k?>"><img width="70px" src="admin/uploads/product/<?=$cart['image']?>" alt="<?=$cart['name']?>" title="<?=$cart['name']?>" class="img-thumbnail" /></a></td>
									<td class="text-left"><a href="product.php?id=<?=$k?>"><?=$cart['name']?></a><br />
									</td>
									
									<td class="text-left" width="200px"><div class="input-group btn-block quantity">
										<input type="text" name="quantity" id="qnt-<?=$k?>" value="<?=$cart['quantity']?>" size="1" class="form-control" />
										<span class="input-group-btn">
											<button type="submit" data-toggle="tooltip" data-id="<?=$k?>" title="Update" class="btn btn-primary update-cart"><i class="fa fa-clone"></i></button>
											<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger delete-cart" data-id="<?=$k?>"><i class="fa fa-times-circle"></i></button>
										</span></div></td>
										<td class="text-right">Tk. <?=$cart['price']?></td>
										<td class="text-right">Tk. <?=$cart['price'] * $cart['quantity']?></td>
									</tr>
									<?php 

                                  
								} ?>

									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-sm-4 col-sm-offset-8">
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td class="text-right">
													<strong>Total:</strong>
												</td>
												<td class="text-right">TK. <?=$total?> </td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="buttons">
								<div class="pull-left"><a href="index.php" class="btn btn-primary">Continue Shopping</a></div>
								<div class="pull-right"><a href="checkout.php" class="btn btn-primary">Checkout</a></div>
							</div>
						</div>
						<!--Middle Part End -->
						
					</div>
				</div>
				<!-- //Main Container -->
				

				<!-- Footer Container -->
				<?php include("includes/footer-inner.php"); ?>
					<!-- //end Footer Container -->

				</div>
				<!-- Social widgets -->
				<?php include("includes/footer-bottom.php"); ?>
					<!-- End Social widgets -->
				
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
	<script type="text/javascript">
		$(document).ready(function(){

          $(".update-cart").click(function(){

          	var id = $(this).attr("data-id");
            var quantity = $("#qnt-" + id).val();
            $.ajax({
            	url:"ajax/updatecart.php",
            	type:"post",
            	data: {id: id, quantity: quantity},
            	success: function(response){

                    location.reload();
            	}
            });

          });

          $(".delete-cart").click(function(){
            	 var id = $(this).attr("data-id");
            	 $.ajax({
            	 	url:"ajax/removetocart.php",
            	 	type:"post",
            	 	data:{id:id},
            	 	success: function(response){
            	 		location.reload();

            	 	}
            	 });
            });


		});
	</script>
	
</body>
</html>