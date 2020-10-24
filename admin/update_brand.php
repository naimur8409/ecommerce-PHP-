<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  } 
 include("dbconnection/dbconnection.php");
 include("model/brand.php");
 $brand = new Brand();

 $id = $_GET['id'];
 $getBrand = $brand->getBrandById($id);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Brand::Update</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/logo.png">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

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
                                    <h4 class="pull-left page-title">Brand</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">KAPSC</a></li>
                                        <li><a href="#">Update</a></li>
                                        <li class="active">Brand Update</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Update Brand</h3></div>
                                    <div class="panel-body">
                    <form class="form-horizontal" action="controller/BrandController.php" role="form" method="post" enctype="multipart/form-data">
                                            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Name</label>
                                                <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" value="<?=$getBrand['name']; ?>" required>
                                                </div>
                                            </div>
   
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="status" required>
						<option value="">Select Status</option>
						<option value="1" <?php if($getBrand['status']==1){ echo "selected"; } ?> >Active</option>
						<option value="0" <?php if($getBrand['status']==0){ echo "selected"; } ?>>Inactive</option>
                                
                                                        
                                                </select>
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-2 control-label">Logo</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="" name="logo" value="">
                                                </div>
                                                <img src="uploads/brand/<?=$getBrand['logo']?>" width="100" alt="">
                                            </div>
                                  <input type="hidden" name="action" value="update_brand">
                                  <input type="hidden" name="id" value="<?=$getBrand['id']?>">
                                  <input type="hidden" name="old_logo" value="<?=$getBrand['logo']?>">
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

        <script src="assets/js/app.js"></script>

    </body>
    <?php unset($_SESSION['message']); ?>
</html>