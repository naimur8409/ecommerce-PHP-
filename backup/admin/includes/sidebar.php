            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="text-center">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['name']; ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"> Profile</a></li>
                                    <li><a href="javascript:void(0)"> Settings</a></li>
                                    <li><a href="javascript:void(0)"> Lock screen</a></li>
                                    <li class="divider"></li>
                                    <li>
                                    <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()"> Logout</a>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                            </li>

                           <?php if($_SESSION['user_type']=='admin'){ ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Manage User </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="users_list.php">Users</a></li>
                                    <li><a href="add_user.php">Add User</a></li>
                                    
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i> <span> Manage Category </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="category_list.php">Categories</a></li>
                                    <li><a href="add_category.php">Add Category</a></li>
                                    
                                </ul>
                            </li>


							
                      <?php } ?>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i> <span> Manage Brand </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="brand_list.php">Brands</a></li>
                                    <li><a href="add_brand.php">Add Brand</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i> <span> Manage Product </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="product_list.php">Products</a></li>
                                    <li><a href="add_product.php">Add Product</a></li>
                                    
                                </ul>
                            </li>
							
							<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Manage Orders </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="order_list.php">Order List</a></li>
                                    
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i> <span> Manage Slider </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="slider_list.php">Sliders</a></li>
                                    <li><a href="add_slider.php">Add Slider</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>