
<header id="header" class=" variantleft type_1">
<!-- Header Top -->
<div class="header-top">
<div class="container">
<div class="row">
<div class="header-top-left form-inline col-sm-6 col-xs-6 compact-hidden">
<p class="p-2">Call Us: (+880) 1777 909090</p>
</div>
<div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-6 compact-hidden">
<div class="tabBlock1" id="TabBlock-1">
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
<div class="container">
<div class="row">
<!-- Logo -->
<div class="navbar-logo col-md-3 col-sm-12 col-xs-7">
<a href="index.php"><img src="admin/assets/images/logo.png" width="50%" title="Your Store" alt="Your Store"></a>
</div>
<!-- //end Logo -->

<!-- Search -->
<div id="sosearchpro" class="col-xs-12 col-sm-8 col-md-5 search-pro">

<form method="GET" action="search.php">
<div id="search0" class="search input-group">
<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search product..." name="search" id="search">
<span class="input-group-btn">
<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
</span>
</div>

</form>

</div>
<!-- //end Search -->

<!-- Secondary menu -->
<div class="col-md-4 col-sm-4 col-xs-5 shopping_cart pull-right">
<div class="header-text hidden-xs">
<p><i class="fa fa-phone" aria-hidden="true"></i>	   Call Us: (+880) 1777 909090</p>
</div>
<!--cart-->
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
<div id="cart" class=" btn-group btn-shopping-cart">
<a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
<div class="shopcart">
<span class="handle pull-left"></span>
<span class="number-shopping-cart"><?=$items?></span>
<span class="title">My Cart</span>
<p class="text-shopping-cart cart-total-full"> TK <?=$total?> </p>
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
				<td class="text-right" id="cart-total">TK <?=$total?></td>
			</tr>
		</tbody>
	</table>
	<p class="text-right"> <a class="btn view-cart" href="cart.php"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.php"><i class="fa fa-share"></i>Checkout</a> </p>
</div>
</li>
</ul>
</div>
<!--//cart-->
</div>
</div>

</div>
</div>
<!-- //Header center -->

<!-- Header Bottom -->
<div class="header-bottom">
<div class="container">
<div class="row">


<!-- Main menu -->
<div class="megamenu-hori header-bottom-right  col-md-12 col-sm-12 col-xs-12 ">
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
					<a href="index.php" class="menu1">Home  </a>
					
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


				
			</ul>

		</div>
	</div>
</div>
</div>
</nav>
</div>
</div>
<!-- //end Main menu -->

</div>
</div>

</div>

<!-- Navbar switcher -->
<!-- //end Navbar switcher -->

</header>
