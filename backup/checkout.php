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
<title>Checkout::eStore</title>
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
<li> Checkout</li>
</ul>

<div class="row">
<!--Middle Part Start-->
<div id="content" class="col-sm-12">
<h2 class="title">Checkout</h2>
<div class="so-onepagecheckout ">
	<form action="admin/controller/OrderController.php" method="post">
<div class="col-left col-sm-3">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><i class="fa fa-user"></i> Your Shipping Details</h4>
			</div>
			<div class="panel-body">
				<fieldset id="account">
					<div class="form-group required">
						<label for="input-ship-name" class="control-label"> Name</label>
						<input type="text" class="form-control" id="input-ship-name" placeholder="Shipping Name" value="" name="ship_name">
					</div>
					<div class="form-group required">
						<label for="input-ship-mobile" class="control-label">Mobile</label>
						<input type="text" class="form-control" id="input-ship-mobile" placeholder="Shipping Mobile" value="" name="ship_mobile">
					</div>
					
				</fieldset>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><i class="fa fa-book"></i> Your Shipping Address</h4>
			</div>
			<div class="panel-body">
				<fieldset id="address" class="required">
					
					<div class="form-group required">
						<label for="input-ship-address" class="control-label">Address</label>
						<input type="text" class="form-control" id="input-ship-address" placeholder="Address" value="" name="ship_address">
					</div>
					
					<div class="form-group required">
						<label for="input-ship-city" class="control-label">City</label>
						<input type="text" class="form-control" id="input-ship-city" placeholder="City" value="" name="ship_city">
					</div>
					<div class="form-group required">
						<label for="input-ship-postcode" class="control-label">Post Code</label>
						<input type="text" class="form-control" id="input-ship-postcode" placeholder="Post Code" value="" name="ship_postcode">
					</div>
					<div class="form-group required">
						<label for="input-ship-country" class="control-label">Country</label>
						<select class="form-control" id="input-ship-country" name="ship_country">
							<option value=""> --- Please Select --- </option>
							
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>
							
						</select>
					</div>
					
					
					</fieldset>
				</div>
			</div>
		</div>
		<div class="col-right col-sm-9">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default no-padding">
						<div class="col-sm-6 checkout-shipping-methods">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
							</div>
							<div class="panel-body ">
								<p>Please select the preferred shipping method to use on this order.</p>
								<div class="radio">
									<label>
										<input type="radio" checked="checked" name="shipping_method" value="0.00" onclick="setShippingCharge(this.value)">
										Free Shipping - TK. 0.00</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="shipping_method" value="150.00" onclick="setShippingCharge(this.value)">
											Flat Shipping Rate - TK. 150.00</label>
										</div>
										
									</div>
								</div>
								<div class="col-sm-6  checkout-payment-methods">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
									</div>
									<div class="panel-body">
										<p>Please select the preferred payment method to use on this order.</p>
										<div class="radio">
											<label>
												<input type="radio" checked="checked" name="payment_method" value="COD" required="">Cash On Delivery</label>
											</div>
											
											<div class="radio">
												<label>
													<input type="radio" name="payment_method" value="sslcommerz" required="">SSLCOMMERZ</label>
												</div>
											</div>
										</div>
									</div>
									
									
									
								</div>
								
								
							
										
										<div class="col-sm-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
												</div>
												<div class="panel-body">
													<div class="table-responsive">
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
																<?php foreach($_SESSION["_cart"] as $key=>$cart) {
																?>
																<tr>
																	<td class="text-center"><a href="product.php?id=<?=$key?>"><img width="60px" src="admin/uploads/product/<?=$cart['image']?>" alt="<?=$cart['name']?>" title="<?=$cart['name']?>" class="img-thumbnail"></a></td>
																	<td class="text-left"><a href="product.php?id=<?=$key?>"><?=$cart['name']?></a></td>
																	<td class="text-left"><div class="input-group btn-block checkout" style="min-width: 100px;">
																		<input type="text" name="quantity" value="<?=$cart['quantity']?>" id="qnt-<?=$key?>" size="1" class="form-control">
																		<span class="input-group-btn">
																			<button type="submit" data-toggle="tooltip" title="Update" data-id="<?=$key?>" class="btn btn-primary update-cart"><i class="fa fa-refresh"></i></button>
																			<button type="button" data-toggle="tooltip" title="Remove" data-id="<?=$key?>" class="btn btn-danger delete-cart" ><i class="fa fa-times-circle"></i></button>
																		</span></div></td>
																		<td class="text-right">TK. <?=$cart['price']?></td>
																		<td class="text-right">TK. <?=$cart['price']* $cart['quantity']?></td>
																	</tr>
																	<?php } ?>
																</tbody>
																<tfoot>
																	<tr>
																		<td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
																		<td class="text-right">TK. <?=$total?></td>
																	</tr>
																	<tr>
																		<td class="text-right" colspan="4"><strong>Shipping Rate:</strong></td>
																		<td class="text-right" id="shipping_charge">TK. 0.00</td>
																	</tr>
																	
																	<tr>
																		<td class="text-right" colspan="4"><strong>Total:</strong></td>
																		<td class="text-right" id="total">TK. <?=$total?></td>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" name="sub_total" id="sub_total" value="<?=$total?>" required>
											
											<input type="hidden" name="total_amount" id="total_amount" value="<?=$total?>" required> 
											<div class="col-sm-12">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
													</div>
													<div class="panel-body">
														<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
														<br>
														<label class="control-label" for="confirm_agree">
															<input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
															<span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
															<input type="hidden" name="action" value="save_order">
															<div class="buttons">
																<div class="pull-right">
																	<input type="submit" class="btn btn-primary" value="Confirm Order" name="submit">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</form>
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
	
	function setShippingCharge(value){
		var sub_total = $("#sub_total").val();
		$("#shipping_charge").html("TK. " + value);
		var total = parseFloat(sub_total) + parseFloat(value);
		$("#total").html("TK. " + total);
		$("#total_amount").val(total);
		
		
	}
</script>

</body>
</html>