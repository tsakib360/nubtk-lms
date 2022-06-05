<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="<?= base_url('index.php') ?>" class="d-inline-block">
            <img src="<?= base_url('global_assets/images/logo1.png') ?>" alt="" style="display: inline; height: 45px; width: 45px; margin-right: 10px; margin-top: -10px;">
            <h5 style="display: inline; color: white; text-align: center;">Northern University Of Business & Technology, Khulna</h5>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>



        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">

                    <span><i class="icon-cog3 mr-2"></i>Settings</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">



                    <div class="dropdown-divider"></div>

                    <a href="<?= base_url('logout.php') ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="<?php echo base_url('global_assets/images/logo4.jpg') ?>" width="38" height="38" class="rounded-circle" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="media-title font-weight-semibold" style="margin-top: 12px;">Library Management</div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a href="<?= base_url('index.php') ?>" class="nav-link active">
                            <i class="icon-home4"></i>
                            <span>
									Dashboard
								</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('manage-admin.php') ?>" class="nav-link"><i class="
                                icon-user-tie"></i> <span>Manage Admin</span></a>


                    </li>
                    <li class="nav-item">
                        <a href="manage_user.php" class="nav-link"><i class="
                                icon-users"></i> <span>Manage User</span></a>

                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('manage-category.php') ?>" class="nav-link"><i class="
                                icon-stack2"></i> <span>Manage Category</span></a>


                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('manage-department.php') ?>" class="nav-link"><i class="
                                icon-table2"></i> <span>Manage Department</span></a>


                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('manage-book.php') ?>" class="nav-link"><i class="
                                        icon-book2"></i> <span>Manage Book</span></a>

                    </li>

                    <li class="nav-item ">
                        <a href="manage_request.php" class="nav-link"><i class="

                                      icon-eye8"></i> <span>Manage Request</span></a>

                    </li>

                    </li>

                    <!-- /main -->


                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->