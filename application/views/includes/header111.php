<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cakes - Administrator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts =========================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/bootstrap.min.css">
    <!-- Bootstrap CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/font-awesome.min.css">
    <!-- adminpro icon CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/animate.css">
    <!-- data-table CSS ========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/data-table/bootstrap-editable.css">
    <!-- normalize CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/normalize.css">
    <!-- charts C3 CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/c3.min.css">
    <!-- forms CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/form/all-type-forms.css">
    <!-- style CSS ========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/style.css">
    <!-- responsive CSS =========================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/responsive.css">
    <!-- modernizr JS ========================================= -->
    <script src="<?php echo base_url();?>theme/js/vendor/modernizr-2.8.3.min.js"></script>
	    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/summernote.css">
    <script>
        function removeRow() {
            var r = confirm("Do You Want to Delete This Row????");
            if (r == true) {
                jQuery('#c' + removeNum).remove();
                calculateprice();
            } else { //user pressed cancel. Do nothing		}}
    </script>
</head>

<body class="materialdesign" onload="initialize()">
    <!--[if lt IE 8]><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <!--<a href="#">	<img src="<?php echo base_url();?>theme/img/logo/logo2-new.jpg" alt="" />	</a>-->
                    <h3>Cakes</h3>
                    <!--<p>Developer</p>--><strong>CAKES</strong></div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
						<li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php"> <i class="fa big-icon fa-dashboard"></i>&nbsp;&nbsp; <span class="mini-dn">Dashboard</span> </a>
                        </li>
						<?php
							if($this->session->userdata('loginType')=='1')
							{
						?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories"> <i class="fa big-icon fa-cog"></i>&nbsp;&nbsp; <span class="mini-dn">Categories</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories/subcategory"> <i class="fa big-icon fa-cogs"></i>&nbsp;&nbsp; <span class="mini-dn">Sub Categories</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories/product_category"> <i class="fa big-icon fa-cogs"></i>&nbsp;&nbsp; <span class="mini-dn">Product Categories</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories/product_list"> <i class="fa big-icon fa-dropbox"></i>&nbsp;&nbsp; <span class="mini-dn">Products</span> </a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>categories/user_list"> <i class="fa big-icon fa-users"></i>&nbsp;&nbsp; <span class="mini-dn">Users </span> </a>
						</li>
						<li class="nav-item"><!--orders_list-->
							<a href="<?php echo base_url(); ?>categories/vendor_orders"> <i class="fa big-icon fa-shopping-cart"></i>&nbsp;&nbsp; <span class="mini-dn">Orders </span> </a>
						</li>
						<li class="nav-item" style="display:none;">
                                            <a href="<?php echo base_url();?>categories/add_ons"> <i class="fa big-icon fa-plus"></i>&nbsp;&nbsp; <span class="mini-dn">Add ons </span> </a>
                                        </li>
                                        <li class="nav-item" style="display:none;">
                                            <a href="<?php echo base_url();?>categories/vendors"> <i class="fa big-icon fa-plus"></i>&nbsp;&nbsp; <span class="mini-dn">Vendors </span> </a>
                                        </li>
						<?php
							}
							else
							{
						?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>categories/vendor_orders"> <i class="fa big-icon fa-shopping-cart"></i>&nbsp;&nbsp; <span class="mini-dn">Orders </span> </a>
						</li>
						<?php
							}
						?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>categories/vendor_orders"> <i class="fa big-icon fa-shopping-cart"></i>&nbsp;&nbsp; <span class="mini-dn">Orders </span> </a>
						<ul class="nav navbar-nav left-sidebar-menu-pro">
						<li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php"> <i class="fa big-icon fa-dashboard"></i>&nbsp;&nbsp; <span class="mini-dn">Dashboard</span> </a>
                        </li>
						</ul>
						</li>
						
						
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn"> <i class="fa fa-bars"></i> </button>
                                <div class="admin-logo logo-wrap-pro"> <a href="#"><img src="<?php echo base_url();?>theme/img/logo/logo2-new.jpg" alt="" /></a> </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n"></div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span> <span class="admin-name">Administrator</span> <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span> </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li>
                                                    <a href="<?php echo base_url();?>Login/logout"> <span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu pull-left">
                                            <li> <a href="#">Home</a> <span class="bread-slash">/</span> </li>
                                            <li> <span class="bread-blod"><?php echo $breadcomeName;?></span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="nav navbar-nav left-sidebar-menu-pro">
									<?php
										if($this->session->userdata('loginType')=='1')
										{
									?>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>index.php/categories"> <i class="fa big-icon fa-cog"></i>&nbsp;&nbsp; <span class="mini-dn">Categories</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>index.php/categories/subcategory"> <i class="fa big-icon fa-cogs"></i>&nbsp;&nbsp; <span class="mini-dn">Sub Categories</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>index.php/categories/product_category"> <i class="fa big-icon fa-cogs"></i>&nbsp;&nbsp; <span class="mini-dn">Product Categories</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>index.php/categories/product_info"> <i class="fa big-icon fa-dropbox"></i>&nbsp;&nbsp; <span class="mini-dn">Products </span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>categories/user_list"> <i class="fa big-icon fa-users"></i>&nbsp;&nbsp; <span class="mini-dn">Users </span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>categories/orders_list"> <i class="fa big-icon fa-shopping-cart"></i>&nbsp;&nbsp; <span class="mini-dn">Orders </span> </a>
                                        </li>
                                        <li class="nav-item" style="display:none;">
                                            <a href="<?php echo base_url();?>categories/add_ons"> <i class="fa big-icon fa-plus"></i>&nbsp;&nbsp; <span class="mini-dn">Add ons </span> </a>
                                        </li>
                                        <li class="nav-item" style="display:none;">
                                            <a href="<?php echo base_url();?>categories/vendors"> <i class="fa big-icon fa-plus"></i>&nbsp;&nbsp; <span class="mini-dn">Vendors </span> </a>
                                        </li>
										<?php
										}
										else
										{
										?>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>categories/vendor_orders"> <i class="fa big-icon fa-shopping-cart"></i>&nbsp;&nbsp; <span class="mini-dn">Orders </span> </a>
                                        </li>
										<?php
										}
										?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <!-- Breadcome start-->
            <div class="breadcome-area des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu pull-left">
                                            <li> <a href="<?php echo base_url() ?>">Home</a> <span class="bread-slash">/</span> </li>
                                            <li> <span class="bread-blod"><?php echo $breadcomeName; ?>	</span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- welcome Project, sale area start-->