<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
  include("dbconnection/dbconnection.php");
  include("model/category.php");
  include("model/brand.php");
  include("model/product.php");
  $category = new Category();
  $brand = new Brand();
  $product = new Product();
  $getCategories = $category->getCategories();
  $getBrands = $brand->getBrands();
  $getProduct = $product->getProductById($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Product::Add</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/logo.png">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- Summernote css -->
        <link href="assets/plugins/summernote/summernote.css" rel="stylesheet" />
        <!--bootstrap-wysihtml5-->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include("includes/topbar.php"); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <?php include("includes/sidebar.php"); ?>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <?php if($_SESSION['user_type']=='admin'){ ?>
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Product</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">eStore</a></li>
                                        <li><a href="#">Update</a></li>
                                        <li class="active">Product Update</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Update Product</h3></div>
                                    <div class="panel-body">
                    <form class="form-horizontal" action="controller/ProductController.php" role="form" method="post" enctype="multipart/form-data">
                                            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="name" value="<?=$getProduct['name']?>" required>
                                                </div>
                                            </div>
   
                                       
              
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="category_id" required>
													<option value="">Select Category</option>
		<?php foreach($getCategories as $key=>$category): ?>
<option value="<?php echo $category['id']; ?>" <?php if($getProduct['category_id']==$category['id']) echo "selected"; ?> ><?php echo $category['name']; ?></option>   
													 <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </div>

                                          <div class="form-group">
                                                <label class="col-sm-2 control-label">Brand</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="brand_id" required>
                                                    <option value="">Select Brand</option>
                                                    <?php foreach($getBrands as $key=>$brand): ?>
<option value="<?php echo $brand['id']; ?>" <?php if($getProduct['brand_id']==$brand['id']) echo "selected"; ?>><?php echo $brand['name']; ?></option>   
                                                     <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">SKU</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="sku" value="<?=$getProduct['sku']?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Price</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="price" value="<?=$getProduct['price']?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Quantity</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="quantity" value="<?=$getProduct['quantity']?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Description</label>
                                                <div class="col-md-10">
                                                    
                                                    <textarea name="description" class="wysihtml5 form-control" rows="9"><?=$getProduct['description']?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Image</label>
                                                <div class="col-md-10">
                                    <input type="file" name="image" >
                                    <img src="uploads/product/<?=$getProduct['image']?>" width="100" alt="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Is Feature</label>
                                                <div class="col-md-10">
    <input type="radio" name="is_feature" <?php if($getProduct['is_feature']==1) echo "checked"; ?> value="1"> Yes 
    <input type="radio" name="is_feature" <?php if($getProduct['is_feature']==0) echo "checked"; ?> value="0"> No
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Is New</label>
                                                <div class="col-md-10">
    <input type="radio" name="is_new" <?php if($getProduct['is_new']==1) echo "checked"; ?> value="1"> Yes 
    <input type="radio" name="is_new" <?php if($getProduct['is_new']==0) echo "checked"; ?> value="0"> No
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="status" required>
<option value="">Select Status</option>
<option value="1" <?php if($getProduct['status']==1) echo "selected"; ?>>Active</option>
<option value="0" <?php if($getProduct['status']==0) echo "selected"; ?>>Inactive</option>
                                
                                                        
                                                </select>
                                                </div>
                                            </div>
                                  <input type="hidden" name="action" value="update_product">
                                  <input type="hidden" name="id" value="<?=$getProduct['id']?>">
                                  <input type="hidden" name="old_image" value="<?=$getProduct['image']?>">
                                      <div class="form-group m-b-0">
                                                <div class="col-sm-offset-2 col-sm-9">
                                                  <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->


                        


                    </div> <!-- container -->

                </div> <!-- content -->
                <?php }else{
                    ?>
                    <div class="content">Permission Denied!!!</div>
                    <?php 
                } ?>
       <?php include("includes/footer.php"); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Wysihtml js -->
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

        <<!--Summernote js-->
        <script src="assets/plugins/summernote/summernote.min.js"></script>

        <script src="assets/js/app.js"></script>

        <script>

            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();

            
            });
        </script>

    </body>
    <?php unset($_SESSION['message']); ?>
</html>