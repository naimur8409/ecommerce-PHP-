 <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><img src="assets/images/logo.png" width="40%"></a>
                        <a href="index.php" class="logo-sm"><img src="assets/images/logo.png" height="36"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> 
                                     
                                    </a>
                                    <ul class="dropdown-menu">
                                      
                                      <li><a href="javascript:void(0)"> <?=$_SESSION['name']?></a></li>
                                        <li><a href="profile.php"> Change Password</a></li>

                                        <li class="divider"></li>
                                        <li><a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()"> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>

                <form id="logout-form" action="controller/UsersController.php" method="post">

                  <input type="hidden" name="action" value="logout_process">

                </form>
            </div>