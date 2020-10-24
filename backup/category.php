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
							
							$getCategory = $category->getCategoryById($_GET['category_id']);
							$getCategories = $category->getCategories();
							$getChildCategories = $category->getCategoryByParentId($_GET['category_id']);

                             $categories_ids=[];

							if(count($getChildCategories) > 0){

								foreach($getChildCategories as $child)
									   {
									   	$categories_ids[] = $child['id'];
									   }

							}

                          array_push($categories_ids, $_GET['category_id']);

                         $new_categories_ids = implode(",", $categories_ids);
                         $getProducts = $product->getProductsByCategoryIds($new_categories_ids);
							?>
							<!DOCTYPE html>
							<html lang="en">
							<head>

							<!-- Basic page needs
							============================================ -->
							<title>Category</title>
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
	<link rel="stylesheet" type="text/css" href="css/category.css">
							</head>

							<body class="res layout-subpage banners-effect-1">
							<div id="wrapper" class="wrapper-full ">
							<!-- Header Container  -->
							<?php include("includes/header-inner.php"); ?>
							<!-- //Header Container  -->
							<!-- Main Container  -->
							<div class="main-container container">
							<ul class="header-main">
							<li class="home"><a href="#">Home   </a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li> <?=$getCategory['name']?></li>
							</ul>

							<div class="row">
							<!--Middle Part Start-->
							<div id="content" class="col-md-9 col-sm-8 type-3">
							<div class="products-category">
							<!-- Filters -->
							<!-- //end Filters -->
							<!--changed listings-->
							<div class="products-list grid">
								<?php foreach($getProducts as $key=>$product){ ?>
							<div class="product-layout">
							<div class="product-item-container">
							<div class="left-block">
							<div class="product-image-container  second_img ">
							<a href="product.php?id=<?=$product['id']?>" class="product-img"><img src="admin/uploads/product/<?=$product["image"]?>" alt=""></a>
							<!--Sale Label-->


							<div class="hover">
							<ul>
								<li class="icon-heart"><a class="wishlist" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('<?=$product["id"]?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></a></li>
								<li class="icon-exchange"><a class="compare" type="button" data-toggle="tooltip" title="" onclick="compare.add('<?=$product["id"]?>');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></a></li>
								<li class="icon-search"><a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">  <i class="fa fa-search" aria-hidden="true"></i></a></li>
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
							<span class="price-new">Tk. <?=$product['price']?></span>

							</div>
							<div class="description item-desc hidden">
							<?=$product['description']?>
							</div>
							</div>

							<div class="button-group">
							<button class="addToCart btn btn-default " type="button" data-toggle="tooltip" title="" onclick="cart.add('<?=$product['id']?>','<?=$product['price']?>', '<?=$product['name']?>', '<?=$product['image']?>', 1);" data-original-title="Add to Cart"> <span class="">Add to Cart</span></button>
							</div>
							</div><!-- right block -->
							</div>
							</div>
							<?php } ?>


							</div>				<!--// End Changed listings-->
							<!-- Filters -->
							
							<!-- //end Filters -->

							</div>

							</div>


							</div>
							<!--Middle Part End-->
							</div>
							<!-- //Main Container -->


							<!-- Footer Container -->
							<?php include("includes/footer-inner.php"); ?>
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

							<script type="text/javascript" src="js/themejs/homepage.js"></script>
							<script type="text/javascript" src="js/themejs/toppanel.js"></script>
							<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
							<script type="text/javascript" src="js/themejs/addtocart.js"></script>
							<script type="text/javascript" src="js/themejs/application.js"></script>
							<script type="text/javascript"><!--
							// Check if Cookie exists
							if($.cookie('display')){
							view = $.cookie('display');
							}else{
							view = 'grid';
							}
							if(view) display(view);
							//--></script> 
							</body>
							</html>