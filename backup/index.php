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
<title>Home::eStore</title>
<meta charset="utf-8">
<meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
<meta name="author" content="Magentech">
<meta name="robots" content="index, follow" />

<!-- Mobile specific metas
============================================ -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicon
============================================ -->
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
<link href="css/footer3.css" rel="stylesheet">
<link href="css/header3.css" rel="stylesheet">
<link id="color_scheme" href="css/home3.css" rel="stylesheet">
<!-- <link href="css/responsive.css" rel="stylesheet"> -->

</head>

<body class="common-home res layout-home3">

<div id="wrapper" class="wrapper-full banners-effect-8">



<!-- Header Container  -->
<?php include("includes/header.php"); ?>
<!-- //Header Container  -->
<!-- Block Spotlight1  -->
<section class="so-spotlight1 ">
<div class="container-fluid">
<div class="row">
<div class="slider-1">
<div class="col-sm-12 owl-slider-1">
<div class="owl-carousel" data-margin="0" data-loop="yes" data-nav="yes" data-dots="yes" data-items_xs="1" data-items_sm="1" data-items_md="1">
<div class="img-slider-1">
<a href="#"><img src="img/demo/slider/home-3/slider-1.jpg" alt=""></a>
</div>
<div class="img-slider-1">
<a href="#"><img src="img/demo/slider/home-3/slider-2.jpg" alt=""></a>
</div>
<div class="img-slider-1">
<a href="#"><img src="img/demo/slider/home-3/slider-3.jpg" alt=""></a>
</div>
</div>
</div>
</div>
</div>
</div>  
</section>
<section class="so-spotlight2">
<div class="modcontent clearfix">
<div class="policy-detail">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="banner-policy">
<div class="policy policy1">
<a href="#">
<div class="icon-policy"></div>
<div class="service-info">
<h3>Free Shipping & Return</h3>
<p>Free shipping on orders over $49</p>
</div>
</a>
</div>
<div class="policy policy2">
<a href="#">
<div class="icon-policy"></div>
<div class="service-info">
<h3>Money Guarantee</h3>
<p>30 days money back guarantee</p>
</div>
</a>
</div>
<div class="policy policy3">
<a href="#">
<div class="icon-policy"></div>
<div class="service-info">
<h3>Support 24/7</h3>
<p>We support online 24/24 on day</p>
</div>
</a>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
<!-- //Block Spotlight1  -->
<section class="so-spotlight3">
<div class="container-fluid">
<div class="col-sm-12 banners">
<div class="banner-left">
<a href="#"><img src="img/demo/banner/home-3/banner-1.jpg" alt=""></a>
</div>
<div class="banner-right">
<div class="banner-right-top">
<a href="#"><img src="img/demo/banner/home-3/banner-2.jpg" alt=""></a>
</div>
<div class="banner-right-bottom">
<div class="banner-right-bottom-1">
<a href="#"><img src="img/demo/banner/home-3/banner-3.jpg" alt=""></a>
</div>
<div class="banner-right-bottom-2">
<a href="#"><img src="img/demo/banner/home-3/banner-4.jpg" alt=""></a>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="so-spotlight4">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h3 class="modtitle3">New Arrivals</h3>
<hr>

<div class=" owl-carousel owl-new-arrivals " data-dots="no" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="3" data-items_md="3" data-margin="30">
<?php foreach($getProduct as $new_product){ 

   if($new_product['is_new']==1){
	?>
<div class="product-layout">
<div class="product-item-container">
<div class="left-block">
<div class="product-image-container  second_img ">
<a href="product.html" class="product-img"><img src="admin/uploads/product/<?php echo $new_product['image']; ?>" alt=""></a>
<!--Sale Label-->
<span class="new">New</span>

<div class="hover">
<ul>
<li class="icon-heart"><a class="wishlist"   data-toggle="tooltip" title="" onclick="wishlist.add('<?=$new_product['id']?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
<li class="icon-exchange"><a class="compare"   data-toggle="tooltip" title="" onclick="compare.add('<?=$new_product['id']?>');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
<li class="icon-search"><a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="right-block">
<div class="caption">
<h4><a href="product.html"><?php echo $new_product['name']; ?></a></h4>		
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
<span class="price-new">TK. <?php echo $new_product['price']; ?></span>

</div>
<div class="description item-desc hidden">
<p><?php echo $new_product['description']; ?> </p>
</div>
</div>

<div class="button-group">

<button class="addToCart btn btn-default "   data-toggle="tooltip" title="" onclick="cart.add('<?=$new_product['id']?>','<?=$new_product['price']?>', '<?=$new_product['name']?>', '<?=$new_product['image']?>', 1);" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>

</div>
</div><!-- right block -->
</div>
</div>
<?php } } ?>

</div>

</div>
</div>
</div>
</section>

<!-- <section class="so-spotlight5">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="collections">
<div class="collection-item">
<a href="#"><img src="img/demo/collections/home-3/collection-1.jpg" alt="">
<div  class="btn btn-primary">swims</div></a>
</div>
<div class="collection-item">
<a href="#"><img src="img/demo/collections/home-3/collection-2.jpg" alt="">
<div   class="btn btn-primary">Leather Bags</div></a>
</div>
<div class="collection-item">
<a href="#"><img src="img/demo/collections/home-3/collection-3.jpg" alt="">
<div   class="btn btn-primary">fashions</div></a>
</div>
<div class="collection-item">
<a href="#"><img src="img/demo/collections/home-3/collection-4.jpg" alt="">
<div   class="btn btn-primary">Shoes</div></a>
</div>
<div class="collection-item">
<a href="#"><img src="img/demo/collections/home-3/collection-5.jpg" alt="">
<div   class="btn btn-primary">Accessories</div></a>
</div>
</div>
</div>
</div>
</div>
</section> -->


<section class="so-spotlight6">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h3 class="modtitle3">Featured Products</h3>
<hr>
<div class="text">
<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
<p>incididunt ut labore et dolore magna aliqua</p> -->
</div>
<div class=" owl-carousel owl-featured-products " data-dots="no" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="3" data-items_md="4" data-margin="30">
<?php foreach($getProduct as $key=>$product){

  if($product['is_feature']==1){
 ?>
<div class="product-layout">
<div class="product-item-container">
<div class="left-block">
<div class="product-image-container  second_img ">
<a href="product.php?id=<?=$product['id']?>" class="product-img"><img src="admin/uploads/product/<?=$product['image']?>" alt=""></a>
<!--Sale Label-->
<!-- <span class="new">New</span> -->

<div class="hover">
<ul>
<li class="icon-heart"><a class="wishlist"   data-toggle="tooltip" title="" onclick="wishlist.add('<?=$product['id']?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
<li class="icon-exchange"><a class="compare"   data-toggle="tooltip" title="" onclick="compare.add('<?=$product['id']?>');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
<li class="icon-search"><a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.php">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="right-block">
<div class="caption">
<h4><a href="product.php?id=<?=$product['id']?>"><?=$product['name']?></a></h4>		
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
<span class="price-new">TK. <?=$product['price']?></span>

</div>
<div class="description item-desc hidden">
 <?=$product['description']?>
</div>
</div>

<div class="button-group">
<button class="addToCart btn btn-default "   data-toggle="tooltip" title="" onclick="cart.add('<?=$product['id']?>','<?=$product['price']?>', '<?=$product['name']?>', '<?=$product['image']?>', 1);" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
</div>
</div><!-- right block -->
</div>
</div>
<?php } } ?>

</div>

</div>
</div>
</div>
</section>
<section class="so-spotlight8">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="brand">
<div class="owl-carousel owl-brand" data-margin="15" data-nav="yes" data-dots="no" data-loop="yes" data-items_xs="2" data-items_sm="4" data-items_md="6">
	<?php foreach($getBrands as $brand){ ?>
<div class="item-brand">
<a href="#"><img src="admin/uploads/brand/<?=$brand['logo']?>" alt="" width="170" height="130"></a>
</div>
<?php } ?>


</div>
</div>
</div>
</div>
</div>
</section>



<script type="text/javascript">
<!--
var $typeheader = 'header-home3';
//-->
</script>

<!-- Footer Container -->
<?php include("includes/footer.php"); ?>
</div>


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
<script type="text/javascript" src="js/modernizr/modernizr-2.6.2.min.js"></script>


<!-- Theme files
============================================ -->
<script type="text/javascript" src="js/themejs/application.js"></script>
<script type="text/javascript" src="js/themejs/homepage.js"></script>
<script type="text/javascript" src="js/themejs/toppanel.js"></script>
<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>

<script type="text/javascript" src="js/themejs/addtocart.js"></script>	
<script type="text/javascript" src="js/themejs/pathLoader.js"></script>	


</body>
</html>