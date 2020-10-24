<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
 include("dbconnection/dbconnection.php");
 include("model/marks.php");
 $roll = $_GET['roll'];
 $id = $_GET['id'];
 $marks = new Marks();
 
 $getMarks = $marks->getMarksByRoll($roll);
 $getStudentName = $marks->getMarksById($id);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Marks Sheet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Invoice</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Xadmino</a></li>
                                        <li><a href="#">Pages</a></li>
                                        <li class="active">Invoice</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="invoice-title">
                                                    <h4 class="pull-right">Roll # <?php echo $_GET['roll']; ?></h4>
                                                    <img src="assets/images/logo_dark.png" alt="logo" height="36">
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <address>
                                                            <?=$getStudentName['name']?>
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <address>
                                                            <strong>Shipped To:</strong><br>
                                                            Kenny Rigdon<br>
                                                            1234 Main<br>
                                                            Apt. 4B<br>
                                                            Springfield, ST 54321
                                                        </address>
                                                    </div>
                                                </div>
                                                
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong>Result summary</strong></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Subject</strong></td>
                                                                    <td class="text-center"><strong>Marks</strong></td>
                                                                    <td class="text-center"><strong>Grade</strong></td>
                                                                    <td class="text-right"><strong>Garde Point</strong></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php 
																 $sum = 0;
																 $number = 1;
																 $factor = 0;
																foreach($getMarks as $key=>$mark) {
                                      
																?>
                                                                <tr>
                                                                    <td><?php echo $mark['subject']; ?></td>
                                                                    <td class="text-center"><?php echo $mark['marks']; ?></td>
                                                                    <td class="text-center"><?php echo $marks->grade($mark['marks']); ?></td>
                                                                    <td class="text-right"><?php echo $point = $marks->gradePoint($mark['marks']); ?></td> 
                                                                </tr>
                                                                <?php 
																if($point=="0.00"){
																	$factor = 1;
																}
																
																$sum = $point + $sum;
																$number++;
																
																} ?>
																<tr>
                                                                    
                                                                    <td class="text-center" colspan="3">GPA=</td>
                                                                    <td class="text-right" ><?php echo $factor==0 ? ($sum/$number) : "F" ;?></td> 
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="hidden-print">
                                                            <div class="pull-right">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- panel body -->
                                </div> <!-- end panel -->

                            </div> <!-- end col -->

                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->

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
</html>