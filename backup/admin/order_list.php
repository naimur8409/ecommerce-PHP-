<?php
session_start();
if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
header("Location:login.php");
exit();
}
include("dbconnection/dbconnection.php");
include("model/order.php");
$order = new Orders();
$getOrders = $order->getOrders();
$order_status = ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancel']
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Order::List</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="Admin Dashboard" name="description" />
<meta content="ThemeDesign" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- DataTables -->
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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
                <h4 class="pull-left page-title">Orders</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">eStore</a></li>
                    <li><a href="#">Order</a></li>
                    <li class="active">List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">List of Ordes</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>

                                    <tr>
									    <td>Order ID</td>
                                        <th>Shipping Name</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Payment Method</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
            <?php foreach($getOrders as $key=>$value): ?>
                    <tr>
					    <td>#<?php echo $value['id']; ?></td>
                        <td><?php echo $value['ship_name']; ?></td>
                        <td><?php echo $value['payment_status']; ?></td>
                        <td><?php echo $order_status[$value['status']]; ?></td>
                        <td><?php echo $value['payment_method']; ?></td>
                        <td><?php echo $value['created_at']; ?></td>
                        <td>TK. <?php echo $value['amount']; ?></td>
                        <td>
						<a href="update_product.php?id=<?=$value['id'] ?>" class="btn btn-success btn-sm">View</a>
						<a href="javascript:void(0)" class="btn btn-info btn-sm update-status" data-toggle="modal" data-target="#custom-width-modal" data-id="<?php echo $value['id']; ?>">Update</a>
						</td>
                     </tr>
                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->


    


</div> <!-- container -->

</div> <!-- content -->

<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none">
                                                        <div class="modal-dialog" style="width:55%">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="custom-width-modalLabel">Order Status</h4>
                                                                     <div class="alert alert-danger hide" id="message"></div>
                                                                </div>
                                                                <div class="modal-body">
                                                                   
                                                                    <div class="form-group mb-2">
                                                <label class="col-sm-2 control-label">Order Status</label>
                                                <div class="col-sm-10">
                                                <select class="form-control" id="order_status" name="order_status" required>
                                                                                <option value="">Select Status</option>
                                                                                <option value="0">Pending</option>
                                                                                <option value="1">Processing</option>
                                                                                <option value="2">Shipped</option>
                                                                                <option value="3">Delivered</option>
                                                                                <option value="4">Cancel</option>

                                                                                </select>
                                                                                </div>
                                               </div>
                                                                 
                                                                    
                                                                   
                       <div class="form-group" style="margin-top: 50px">
                                                <label class="col-sm-2 control-label">Payment Status</label>
                                                <div class="col-sm-10">
                                            <select class="form-control" name="payment_status" id="payment_status" required>
                                                <option value="">Select Status</option>
                                                <option value="Unpaid">Unpaid</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Partial Paid">Partial Paid</option>

                                                </select>
                                                </div>
                                            </div>
          
                                                                </div>

                                                                <input type="hidden" name="order_id" value="" id="order_id">
                                                                
                                                                <div class="modal-footer" style="margin-top: 30px">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light save-status">Save changes</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
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

<!-- Datatables-->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

     $(".update-status").click(function(){

        var id = $(this).attr("data-id");

        $("#order_id").val(id);

     });

     $(".save-status").click(function(){

        var order_id = $("#order_id").val();
        var payment_status = $("#payment_status").val();
        var order_status = $("#order_status").val();

        $.ajax({
            url: "ajax/order_status_update.php",
            type: "post",
            data: { order_id: order_id, payment_status : payment_status, order_status: order_status},
            success: function (response){

                var data = JSON.parse(response);
                if(data.code==200)
                      {
                        location.reload();
                      }
                      else{

                        $("#message").html(data.message);
                        $("#message").show('slow')
                      }

            }
        });

     });
     
    });
</script>

</body>
<?php unset($_SESSION['message']); ?>
</html>