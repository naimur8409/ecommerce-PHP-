<?php
session_start();
include("admin/dbconnection/dbconnection.php");
include("admin/model/brand.php");
include("admin/model/product.php");
include("admin/model/category.php");
$productObj = new Product();
$brand = new Brand();
$category = new Category();
$getBrands = $brand->getBrands();
$product = $productObj->getProductById($_GET['id']);
$categoryName = $category->getCategoryById($product['category_id']);

$productImages = $productObj->getProductsAdditionalImage($product['id']);
$getCategories = $category->getCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic page needs
    ============================================ -->
    <title><?=$product['name']?></title>
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
    <link href="js/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/themecss/lib.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<!-- Theme CSS
	============================================ -->
	<link href="css/themecss/so_megamenu.css" rel="stylesheet">
	<link href="css/themecss/so-categories.css" rel="stylesheet">
	<link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
	<link id="color_scheme" href="css/theme.css" rel="stylesheet">
	<!-- <link href="css/responsive.css" rel="stylesheet"> -->
	<link href="css/footer1.css" rel="stylesheet">
	<link href="css/header1.css" rel="stylesheet">


	<!-- Include Libs & Plugins
	============================================ -->
	
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
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- Theme files
	============================================ -->
	<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="js/themejs/addtocart.js"></script>
	<script type="text/javascript" src="js/themejs/application.js"></script>
	
</head>

<body class="res layout-subpage banners-effect-7">
	<div id="wrapper" class="wrapper-full ">
		<!-- Header Container  -->
		<?php include("includes/header-inner.php"); ?>
		<!-- //Header Container  -->
		<!-- Main Container  -->
		<div class="main-container container">
			<ul class="header-main type-1">
				<li class="home"><a href="#">Home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li class="home"><a href="#"><?=$categoryName['name']?><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="#"><?=$product['name']?></a></li>
			</ul>

			<div class="row">
				<!--Middle Part Start-->
				<div id="content " class="col-md-12 col-sm-12 type-1">

					<div class="product-view row">
						<div class="left-content-product col-lg-9 col-xs-12">
							<div class="row">
								<div class="content-product-left class-honizol col-md-6 col-sm-12 col-xs-12 ">
									<div class="large-image  ">
										<img itemprop="image" class="product-image-zoom" src="admin/uploads/product/<?=$product['image']?>" data-zoom-image="admin/uploads/product/1571407567note-7-fe-blue-coral.jpg" title="Bint Beef" alt="Bint Beef">
									</div>
									<div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider owl-carousel " data-nav='yes' data-loop="yes" data-margin="10" data-items_xs="2" data-items_sm="3" data-items_md="4">
								 <?php foreach($productImages as $key=>$image){ ?>
								 <a data-index="<?=$key?>" class="img thumbnail " data-image="admin/uploads/product/<?=$image['image_name']?>" title="Bint Beef">

									<img src="admin/uploads/product/<?=$image['image_name']?>" title="Bint Beef" alt="Bint Beef">
										</a>
                                  <?php } ?>
										
									</div>

								</div>

								<div class="content-product-right col-md-6 col-sm-12 col-xs-12">
									<div class="title-product">
										<h1><?=$product['name']?></h1>
									</div>
									<!-- Review -->
									<div class="box-review form-group">
										<div class="ratings">
											<div class="rating-box">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star gray"></i>
											</div>
										</div>

									</div>
									<div class="product-box-desc">
										<ul>
											<li>45 inch HD Touch Screen (1280 x 720)</li>
											<li>Android 4.4 KitKat OS</li>
											<li>1.4 GHz Quad Core™ Processor</li>
											<li>20 MP front and 28 megapixel CMOS rear camera</li>
										</ul>
									</div>
									<div class="product-label form-group">
										<div class="stock">
											<span>Availability:</span> <span class="instock">In Stock</span>
											<p>SKU: <?=$product['sku']?></p>
										</div>
										<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
											<span class="price-new" itemprop="price"><?=$product['price']?></span>
											<span class="price-old">TK. <?=$product['price']?></span>
										</div>

									</div>
									<div id="product">
										<div class="form-group box-info-product">
											<div class="option quantity">
												<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
													<label>Qty:  </label>
													<input class="form-control" id="quantity" type="text" name="quantity" value="1">
													
													<span class="input-group-addon product_quantity_down"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
													<span class="input-group-addon product_quantity_up"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
													
												</div>
											</div>
											<div class="info-product-right">
												<div class="cart">
													<input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="cart.add('<?=$product['id']?>','<?=$product['price']?>', '<?=$product['name']?>', '<?=$product['image']?>');" data-original-title="Add to Cart">
												</div>
												<div class="add-to-links wish_comp">
													<ul class="blank list-inline">
														<li class="wishlist">
															<a class="icon" data-toggle="tooltip" title="" onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
															</a>
														</li>
														<li class="compare">
															<a class="icon" data-toggle="tooltip" title="" onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>


										</div>

									</div>
									<!-- end box info product -->
									<div class="share">
										<p>Share This:</p>
										<div class="share-icon">
											<ul>
												<li class="facebook"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li class="twitter"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li class="google"><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
												<li class="skype"><a href=""><i class="fa fa-skype" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>

								</div>					</div>
								<div class="row">
									<div class="col-sx-12">
										<div class="producttab ">
											<div class="tabsslider  col-xs-12">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
													<li class="item_nonactive "><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
													<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
													<li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
												</ul>
												<div class="tab-content col-xs-12">
													<div id="tab-1" class="tab-pane fade active in">
														

                                                      <?=$product['description']?>
													</div>
													<div id="tab-review" class="tab-pane fade  in">
														<form>
															<div id="review">
																<table class="table table-striped table-bordered">
																	<tbody>
																		<tr>
																			<td style="width: 50%;"><strong>Super Administrator</strong></td>
																			<td class="text-right">29/07/2015</td>
																		</tr>
																		<tr>
																			<td colspan="2">
																				<p>Best this product opencart</p>
																				<div class="ratings">
																					<div class="rating-box">
																						<i class="fa fa-star"></i>
																						<i class="fa fa-star"></i>
																						<i class="fa fa-star"></i>
																						<i class="fa fa-star"></i>
																						<i class="fa fa-star gray"></i>
																					</div>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<div class="text-right"></div>
															</div>
															<h2 id="review-title">Write a review</h2>
															<div class="contacts-form">
																<div class="form-group"> <span class="icon icon-user"></span>
																	<input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}"> 
																</div>
																<div class="form-group"> <span class="icon icon-bubbles-2"></span>
																	<textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
																</div> 
																<span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>

																<div class="form-group">
																	<b>Rating</b> <span>Bad</span>&nbsp;
																	<input type="radio" name="rating" value="1"> &nbsp;
																	<input type="radio" name="rating" value="2"> &nbsp;
																	<input type="radio" name="rating" value="3"> &nbsp;
																	<input type="radio" name="rating" value="4"> &nbsp;
																	<input type="radio" name="rating" value="5"> &nbsp;<span>Good</span>

																</div>
																<div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
															</div>
														</form>
													</div>
													<div id="tab-4" class="tab-pane fade">
														<a href="#">Monitor</a>,
														<a href="#">Apple</a>				
													</div>
													<div id="tab-5" class="tab-pane fade">
														<p>Lorem ipsum dolor sit amet, consetetur
															sadipscing elitr, sed diam nonumy eirmod
															tempor invidunt ut labore et dolore
															magna aliquyam erat, sed diam voluptua.
															At vero eos et accusam et justo duo
															dolores et ea rebum. Stet clita kasd
															gubergren, no sea takimata sanctus est
															Lorem ipsum dolor sit amet. Lorem ipsum
															dolor sit amet, consetetur sadipscing
															elitr, sed diam nonumy eirmod tempor
															invidunt ut labore et dolore magna aliquyam
															erat, sed diam voluptua. </p>
															<p>At vero eos et accusam et justo duo dolores
																et ea rebum. Stet clita kasd gubergren,
																no sea takimata sanctus est Lorem ipsum
																dolor sit amet. Lorem ipsum dolor sit
																amet, consetetur sadipscing elitr.</p>
																<p>Sed diam nonumy eirmod tempor invidunt
																	ut labore et dolore magna aliquyam erat,
																	sed diam voluptua. At vero eos et accusam
																	et justo duo dolores et ea rebum. Stet
																	clita kasd gubergren, no sea takimata
																	sanctus est Lorem ipsum dolor sit amet.</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<section class="col-lg-3 hidden-sm hidden-md hidden-xs slider-products">
											<div class="module latest-product titleLine">
												<h3 class="modtitle">Latest Product</h3>
												<hr>
												<hr>
												<hr>
												<div class="modcontent ">
													<div class="product-latest-item">
														<div class="media">
															<div class="media-left">
																<a href="product.html"><img src="img/demo/shop/product/product-3.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 78px; height: 104px;"></a>
															</div>
															<div class="media-body">
																<div class="caption">
																	<h4><a href="product.html">Sunt Molup</a></h4>

																	<div class="price">
																		<span class="price-new">$100.00</span>
																	</div>
																	<div class="ratings">
																		<div class="rating-box">
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
													<div class="product-latest-item">
														<div class="media">
															<div class="media-left">
																<a href="product.html"><img src="img/demo/shop/product/product-1.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 78px; height: 104px;"></a>
															</div>
															<div class="media-body">
																<div class="caption">
																	<h4><a href="product.html">Et Spare</a></h4>

																	<div class="price">
																		<span class="price-new">$99.00</span>
																	</div>
																	<div class="ratings">
																		<div class="rating-box">
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class="gray"><i class="fa fa-star "></i></span>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
													<div class="product-latest-item">
														<div class="media">
															<div class="media-left">
																<a href="product.html"><img src="img/demo/shop/product/product-2.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 78px; height: 104px;"></a>
															</div>
															<div class="media-body">
																<div class="caption">
																	<h4><a href="product.html">Cisi Chicken</a></h4>

																	<div class="price">
																		<span class="price-new">$59.00</span>
																	</div>
																	<div class="ratings">
																		<div class="rating-box">
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class="gray"><i class="fa fa-star"></i></span>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
													<div class="product-latest-item transition">
														<div class="media">
															<div class="media-left">
																<a href="product.html"><img src="img/demo/shop/product/product-4.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 78px; height:104px;"></a>
															</div>
															<div class="media-body">
																<div class="caption">
																	<h4><a href="product.html">Kevin Labor</a></h4>
																	<div class="price">
																		<span class="price-new">$245.00</span>
																	</div>
																	<div class="ratings">
																		<div class="rating-box">
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class=""><i class="fa fa-star "></i></span>
																			<span class="gray"><i class="fa fa-star"></i></span>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>


												</div>

											</div>
											<div class="module">
												<div class="modcontent clearfix">
													<div class="banners">
														<div>
															<a href="#"><img src="img/demo/cms/left-image-static.png" alt="left-image"></a>
														</div>
													</div>

												</div>
											</div>
										</section>
									</div>
									<!-- Related Products -->
									<div class="related-product ">
										<h3 class="modtitle">Related Products  </h3>
										<hr>
										<hr>
										<hr>
										<div class="related-product-owl">
											<div class=" owl-carousel related-owl " data-nav="yes" data-loop="yes" data-margin="30" data-items_xs="1" data-items_sm="4" data-items_md="5">
												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-1.jpg" alt=""></a>
																<!--Sale Label-->
																
																<span class="sale">-25%</span>
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #01</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$43.00</span>
																	<span class="price-old">$75.00</span>		   
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-3.jpg" alt=""></a>
																<!--Sale Label-->
																
																<span class="sale">-25%</span>
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #02</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$74.00</span> 	
																	<span class="price-old">$122.00</span>   
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-2.jpg" alt=""></a>
																<!--Sale Label-->
																
																<span class="sale">-50%</span>
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #03</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$78.00</span> 
																	<span class="price-old">$154.00</span>
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-5.jpg" alt=""></a>
																<!--Sale Label-->
																
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #04</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$78.00</span> 
																	
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>

												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-4.jpg" alt=""></a>
																<!--Sale Label-->
																
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #05</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$85.00</span> 
																	
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-7.jpg" alt=""></a>
																<!--Sale Label-->
																
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #06</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$68.00</span> 
																	
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-6.jpg" alt=""></a>
																<!--Sale Label-->
																<span class="new">New</span>
																
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #07</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$58.00</span> 
																	
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>


												<div class="product-layout">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img ">
																<a href="product.html" class="product-img"><img src="img/demo/shop/product/product-6.jpg" alt=""></a>
																<!--Sale Label-->
																
																<div class="hover">
																	<ul>
																		<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
																		<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('42');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
																		<li class="icon-search"><a class="quickview iframe-link " data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html">Dummy product #08</a></h4>		
																<div class="ratings">
																	<div class="rating-box">
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class=""><i class="fa fa-star "></i></span>
																		<span class="gray"><i class="fa fa-star "></i></span>
																	</div>
																</div>

																<div class="price">
																	<span class="price-new">$74.00</span> 
																	
																</div>
																<div class="description item-desc hidden">
																	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
																</div>
															</div>

															<div class="button-group">
																<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('42', '1');" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
															</div>
														</div><!-- right block -->
													</div>
												</div>

											</div>
										</div>
									</div>

									<!-- end Related  Products-->


								</div>


							</div>
							<!--Middle Part End-->
						</div>
						<!-- //Main Container -->
						

						
						<!-- Footer Container -->
						<?php include("includes/footer-inner.php"); ?>
							</div>
							<!-- Social widgets -->
                         <?php include("includes/footer-bottom.php"); ?>	<!-- End Social widgets -->
					</body>
					</html>