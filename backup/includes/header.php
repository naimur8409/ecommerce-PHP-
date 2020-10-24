<header id="header" class=" variantleft type_3">
<!-- Header Top -->
<div class="header-top">
<div class="container-fluid">
<div class="row">
<div class="header-top-left form-inline  col-sm-6 col-xs-6 compact-hidden">
   <p class="p-2">Call Us: (+880) 1777 909090</p>
</div>
<div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-6 compact-hidden">

<div class="tabBlock" id="TabBlock-1">
<ul class="top-link list-inline">
<?php if(isset($_SESSION['_customer_name'])){ ?>
<li class="wishlist hidden-xs"><a href="#" id="wishlist-total" class="top-link-wishlist" title="Welcome Customer!"><span> Welcome <?=$_SESSION['_customer_name']?>! </span></a></li>
<li class="signin"><a href="my-account.php" class="top-link-checkout" title="Sign In"><span>My Account</span></a></li>
<li class="register"><a href="logout.php" title="Logout"><span>Logout</span></a></li>
<?php }else{ ?>
<li class="signin"><a href="login.php" class="top-link-checkout" title="Sign In"><span>Sign In</span></a></li>
<li class="register"><a href="register.php" title="Register"><span>Register</span></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- //Header Top -->

<!-- Header center -->
<div class="header-center left">
<div class="container-fluid">
<div class="row">
<!-- Logo -->
<div class="navbar-logo col-lg-3 col-md-12 col-sm-12 col-xs-12">
<a href="index.php"><img src="admin/assets/images/eStorelogo.png" width="50%" title="Your Store" alt="Your Store"></a>
</div>
<!-- //end Logo -->

<div class="megamenu-hori col-lg-8  col-md-10 col-sm-10 col-xs-6 ">
<div class="responsive so-megamenu ">
<nav class="navbar-default">
<div class=" container-megamenu  horizontal">

<div class="navbar-header">
<button   id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>	
</div>

<div class="megamenu-wrapper">
<span id="remove-megamenu" class="fa fa-times"></span>
<div class="megamenu-pattern">
<div class="container">
<ul class="megamenu " data-transition="slide" data-animationtime="250">
<li class="home hover">
	<p class="close-menu"></p>
	<a href="index.php" class="menu1">Home</a>
</li>
<?php foreach($getCategories as $key=>$value){

 if($value['parent_id']==0 && $value['status']==1){
 
 ?>
<li class="with-sub-menu hover">
	<a href="category.php?category_id=<?=$value['id']?>" class="clearfix menu1">
		<strong><?=$value['name']?></strong>
		
	</a>
  <?php 
  $getSubcategories = $category->getCategoryByParentId($value['id']);

   if(count($getSubcategories) > 0){

   ?>
	<div class="sub-menu" style="width: 30%; right: auto; display: none;">
		<div class="content" style="height: 160px; display: none;">
			<div class="row">
				<div class="col-md-6">
					<ul class="row-list">
						<?php foreach($getSubcategories as $subvalue){ ?>
						<li><a class="subcategory_item" href="category.php?category_id=<?=$subvalue['id']?>"><?=$subvalue['name']?></a></li>
                        <?php } ?>
						
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<?php } ?>
</li>
<?php 
	} 


} 

?>

<!--
<li class="with-sub-menu hover">
	<p class="close-menu"></p>
	<a href="#" class="clearfix menu1">
		<strong>Pages</strong>
		
	</a>
	<div class="sub-menu" style="width: 40%; right: auto; display: none;">
		<div class="content" style="height: 160px; display: none;">
			<div class="row">
				<div class="col-md-6">
					<ul class="row-list">
						<li><a class="subcategory_item" href="faq.html">FAQ</a></li>

						<li><a class="subcategory_item" href="sitemap.html">Site Map</a></li>
						<li><a class="subcategory_item" href="contact.html">Contact us</a></li>
						<li><a class="subcategory_item" href="banner-effect.html">Banner Effect</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="row-list">
						<li><a class="subcategory_item" href="about-us.html">About Us 1</a></li>
						<li><a class="subcategory_item" href="about-us-2.html">About Us 2</a></li>
						<li><a class="subcategory_item" href="about-us-3.html">About Us 3</a></li>
						<li><a class="subcategory_item" href="about-us-4.html">About Us 4</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</li>
<li class="with-sub-menu hover">
	<p class="close-menu"></p>
	<a href="#" class="clearfix menu1">
		<strong>Categories</strong>
		<span class="label"></span>
		
	</a>
	<div class="sub-menu" style="width: 100%; right: 0px; display: none;">
		<div class="content" style="height: 398px; display: none;">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-3 img img1">
							<a href="#"><img src="img/demo/cms/img1.jpg" alt="banner1"></a>
						</div>
						<div class="col-md-3 img img2">
							<a href="#"><img src="img/demo/cms/img2.jpg" alt="banner2"></a>
						</div>
						<div class="col-md-3 img img3">
							<a href="#"><img src="img/demo/cms/img3.jpg" alt="banner3"></a>
						</div>
						<div class="col-md-3 img img4">
							<a href="#"><img src="img/demo/cms/img4.jpg" alt="banner4"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<a href="#" class="title-submenu">Automotive</a>
					<div class="row">
						<div class="col-md-12 hover-menu">
							<div class="menu">
								<ul>
									<li><a href="#" class="main-menu">Car Alarms and Security</a></li>
									<li><a href="#" class="main-menu">Car Audio &amp; Speakers</a></li>
									<li><a href="#" class="main-menu">Gadgets &amp; Auto Parts</a></li>
									<li><a href="#" class="main-menu">More Car Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#" class="title-submenu">Electronics</a>
					<div class="row">
						<div class="col-md-12 hover-menu">
							<div class="menu">
								<ul>
									<li><a href="#" class="main-menu">Battereries &amp; Chargers</a></li>
									<li><a href="#" class="main-menu">Headphones, Headsets</a></li>
									<li><a href="#" class="main-menu">Home Audio</a></li>
									<li><a href="#" class="main-menu">Mp3 Players &amp; Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#" class="title-submenu">Jewelry &amp; Watches</a>
					<div class="row">
						<div class="col-md-12 hover-menu">
							<div class="menu">
								<ul>
									<li><a href="#" class="main-menu">Earings</a></li>
									<li><a href="#" class="main-menu">Wedding Rings</a></li>
									<li><a href="#" class="main-menu">Men Watches</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#" class="title-submenu">Bags, Holiday Supplies</a>
					<div class="row">
						<div class="col-md-12 hover-menu">
							<div class="menu">
								<ul>
									<li><a href="#" class="main-menu">Gift &amp; Lifestyle Gadgets</a></li>
									<li><a href="#" class="main-menu">Gift for Man</a></li>
									<li><a href="#" class="main-menu">Gift for Woman</a></li>
									<li><a href="#" class="main-menu">Lighter &amp; Cigar Supplies</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</li>

<li class="with-sub-menu hover">
	<p class="close-menu"></p>
	<a href="#" class="clearfix menu1">
		<strong>Accessories</strong>

		
	</a>
	<div class="sub-menu" style="width: 100%; display: none;">
		<div class="content" style="display: none;">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-6 static-menu">
							<div class="menu">
								<ul>
									<li>
										<a href="#" class="main-menu">Automotive</a>
										<ul>
											<li><a href="#">Car Alarms and Security</a></li>
											<li><a href="#">Car Audio &amp; Speakers</a></li>
											<li><a href="3#">Gadgets &amp; Auto Parts</a></li>
										</ul>
									</li>
									<li>
										<a href="#" class="main-menu">Smartphone &amp; Tablets</a>
										<ul>
											<li><a href="#">Accessories for i Pad</a></li>
											<li><a href="#">Apparel</a></li>
											<li><a href="#">Accessories for iPhone</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6 static-menu">
							<div class="menu">
								<ul>
									<li>
										<a href="#" class="main-menu">Sports &amp; Outdoors</a>
										<ul>
											<li><a href="#">Camping &amp; Hiking</a></li>
											<li><a href="#">Cameras &amp; Photo</a></li>
											<li><a href="#">Cables &amp; Connectors</a></li>
										</ul>
									</li>
									<li>
										<a href="#" class="main-menu">Electronics</a>
										<ul>
											<li><a href="#">Battereries &amp; Chargers</a></li>
											<li><a href="#">Bath &amp; Body</a></li>
											<li><a href="#">Outdoor &amp; Traveling</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<span class="title-submenu">Bestseller</span>
					<div class="row">
						<div class="col-sm-12 list-product">
							<div class="product-thumb">
								<div class="image pull-left">
									<a href="#"><img src="img/demo/shop/product/35.jpg" width="80" alt="Filet Mign" title="Filet Mign" class="img-responsive"></a>
								</div>
								<div class="caption">
									<h4><a href="#">Filet Mign</a></h4>
									<div class="rating-box">
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
									</div>
									<p class="price">$1,202.00</p>
								</div>
							</div>
						</div>
						<div class="col-sm-12 list-product">
							<div class="product-thumb">
								<div class="image pull-left">
									<a href="#"><img src="img/demo/shop/product/W1.jpg" width="80" alt="Dail Lulpa" title="Dail Lulpa" class="img-responsive"></a>
								</div>
								<div class="caption">
									<h4><a href="#">Dail Lulpa</a></h4>
									<div class="rating-box">
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class=""><i class="fa fa-star "></i></span>
										<span class="gray"><i class="fa fa-star "></i></span>
									</div>
									<p class="price">$78.00</p>
								</div>
							</div>
						</div>
						<div class="col-sm-12 list-product">
							<div class="product-thumb">
								<div class="image pull-left">
									<a href="#"><img src="img/demo/shop/product/141.jpg" width="80" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive"></a>
								</div>
								<div class="caption">
									<h4><a href="#">Canon EOS 5D</a></h4>

									<div class="rating-box">
										<span class="gray"><i class="fa fa-star "></i></span>
										<span class="gray"><i class="fa fa-star "></i></span>
										<span class="gray"><i class="fa fa-star "></i></span>
										<span class="gray"><i class="fa fa-star "></i></span>
										<span class="gray"><i class="fa fa-star "></i></span>
									</div>
									<p class="price">
										<span class="price-new">$60.00</span>
										<span class="price-old">$145.00</span>

									</p>
								</div>
							</div>
						</div>
					</div>
					

				</div>
			</div>
		</div>
	</div>
</li>
<li class="">
	<p class="close-menu"></p>
	<a href="blog-page.html" class="clearfix menu1">
		<strong>Blog</strong>
		<span class="label"></span>
	</a>
</li>
 -->
</ul>

</div>
</div>
</div>
</div>
</nav>
</div>
</div>

<!-- Secondary menu -->
<div class="col-lg-1 col-md-2 col-sm-2 col-xs-6 shopping_cart pull-left">
 <?php
   	$total = 0;
	$items = 0;
  if(isset($_SESSION['_cart']))
  	 {

		foreach($_SESSION['_cart'] as $key=>$cart)
			 {
			 	$total = $total + $cart['price'] * $cart['quantity'];
			 	$items++;

			 }
  	 }
  ?>
<!--cart-->
<div id="cart" class=" btn-group btn-shopping-cart">
<a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
<div class="shopcart">
<span class="handle pull-left"></span>
<span class="number-shopping-cart"><?=$items?></span>
</div>
</a>

<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">

<li>
<table class="table table-striped">
<tbody id="cart-details">
	<?php if(isset($_SESSION['_cart'])){

foreach($_SESSION['_cart'] as $key=>$cart)
	   {
	 ?>
<tr id="cart-list-<?=$key?>">
<td class="text-center" style="width:70px">
<a href="product.html"> <img src="admin/uploads/product/<?=$cart['image']?>" style="width:70px" alt="<?=$cart['name']?>" title="<?=$cart['name']?>" class="preview"> </a>
</td>
<td class="text-left"> <a class="cart_product_name" href="product.php?id=<?=$key?>"><?=$cart['name']?></a> </td>
<td class="text-center"> x<?=$cart['quantity']?> </td>
<td class="text-center"> TK. <?=$cart['price']?> </td>
<td class="text-right">
<a href="#" class="fa fa-edit"></a>
</td>
<td class="text-right">
<a onclick="cart.remove('<?=$key?>');" class="fa fa-times fa-delete"></a>
</td>
</tr>

<?php } } ?>
</tbody>
</table>
</li>
<li>
<div>
<table class="table table-bordered">
<tbody>
<tr>
<td class="text-left"><strong>Total</strong>
</td>
<td class="text-right" id="cart-total">TK. <?=$total?></td>
</tr>
</tbody>
</table>
<p class="text-right"> <a class="btn view-cart" href="cart.php"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.php"><i class="fa fa-share"></i>Checkout</a> </p>
</div>
</li>
</ul>
</div>
<div class="search">
<div class="btn-search">
<button class="btn btn-primary "   ><i class="fa fa-search search1" aria-hidden="true"></i></button>

</div>
<div class="input-search">
<form action="search.php" method="get" id="search-form">
<input type="text" name="search" id="search">
<button><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>
</div>

<!--//cart-->
</div>
</div>

</div>
</div>
<!-- //Header center -->
</header>