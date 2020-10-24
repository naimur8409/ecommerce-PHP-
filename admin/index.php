<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>KAPSC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/logo.png">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
                                    <h4 class="pull-left page-title">Dashboard</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">KAPSC</a></li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Total Subscription</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>2568</b></h3>
                                        <p class="text-muted"><b>48%</b> From Last 24 Hours</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Order Status</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>3685</b></h3>
                                        <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Unique Visitors</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>25487</b></h3>
                                        <p class="text-muted"><b>65%</b> From Last 24 Hours</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Monthly Earnings</h4>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class=""><b>$2779.7</b></h3>
                                        <p class="text-muted"><b>31%</b> From Last 1 month</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <h4 class="m-t-0">Revenue</h4>
                                        <ul class="list-inline m-t-30 widget-chart text-center">
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>5248</b></h4>
	                                			<h5 class="text-muted m-b-0">Marketplace</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                                <h4 class=""><b>321</b></h4>
	                                			<h5 class="text-muted m-b-0">Last week</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>964</b></h4>
	                                			<h5 class="text-muted m-b-0">Last Month</h5>
	                                		</li>
	                                	</ul>
                                        <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <h4 class="m-t-0">Email Sent</h4>
                                        <ul class="list-inline m-t-30 widget-chart text-center">
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>3654</b></h4>
	                                			<h5 class="text-muted m-b-0">Marketplace</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                                <h4 class=""><b>954</b></h4>
	                                			<h5 class="text-muted m-b-0">Last week</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>8462</b></h4>
	                                			<h5 class="text-muted m-b-0">Last Month</h5>
	                                		</li>
	                                	</ul>
                                        <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <h4 class="m-t-0">Monthly Subscriptions</h4>
                                        <ul class="list-inline m-t-30 widget-chart text-center">
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>3256</b></h4>
	                                			<h5 class="text-muted m-b-0">Marketplace</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                                <h4 class=""><b>785</b></h4>
	                                			<h5 class="text-muted m-b-0">Last week</h5>
	                                		</li>
	                                		<li>
                                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                                <h4 class=""><b>1546</b></h4>
	                                			<h5 class="text-muted m-b-0">Last Month</h5>
	                                		</li>
	                                	</ul>
                                        <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Customers Tables</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                    <th>Extn.</th>
                                                    <th>E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger</td>
                                                    <td>Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                    <td>5421</td>
                                                    <td>t.nixon@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett</td>
                                                    <td>Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                    <td>8422</td>
                                                    <td>g.winters@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton</td>
                                                    <td>Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    <td>$86,000</td>
                                                    <td>1562</td>
                                                    <td>a.cox@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Cedric</td>
                                                    <td>Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012/03/29</td>
                                                    <td>$433,060</td>
                                                    <td>6224</td>
                                                    <td>c.kelly@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Airi</td>
                                                    <td>Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                    <td>5407</td>
                                                    <td>a.satou@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Brielle</td>
                                                    <td>Williamson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2012/12/02</td>
                                                    <td>$372,000</td>
                                                    <td>4804</td>
                                                    <td>b.williamson@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod</td>
                                                    <td>Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012/08/06</td>
                                                    <td>$137,500</td>
                                                    <td>9608</td>
                                                    <td>h.chandler@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona</td>
                                                    <td>Davidson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Tokyo</td>
                                                    <td>55</td>
                                                    <td>2010/10/14</td>
                                                    <td>$327,900</td>
                                                    <td>6200</td>
                                                    <td>r.davidson@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Colleen</td>
                                                    <td>Hurst</td>
                                                    <td>Javascript Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>39</td>
                                                    <td>2009/09/15</td>
                                                    <td>$205,500</td>
                                                    <td>2360</td>
                                                    <td>c.hurst@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Sonya</td>
                                                    <td>Frost</td>
                                                    <td>Software Engineer</td>
                                                    <td>Edinburgh</td>
                                                    <td>23</td>
                                                    <td>2008/12/13</td>
                                                    <td>$103,600</td>
                                                    <td>1667</td>
                                                    <td>s.frost@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Jena</td>
                                                    <td>Gaines</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>30</td>
                                                    <td>2008/12/19</td>
                                                    <td>$90,560</td>
                                                    <td>3814</td>
                                                    <td>j.gaines@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Quinn</td>
                                                    <td>Flynn</td>
                                                    <td>Support Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2013/03/03</td>
                                                    <td>$342,000</td>
                                                    <td>9497</td>
                                                    <td>q.flynn@datatables.net</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div> <!-- End Row -->


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

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>