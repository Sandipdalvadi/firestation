<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from fox-admin-templates.multipurposethemes.com/foxadmin-minimal/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 06:05:11 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">
<title>TELANGANA STATE DISASTER RESPONSE AND FIRE SERVICES DEPARTMENT</title>
<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/bootstrap/dist/css/bootstrap.css">
<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
<!-- font awesome -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/font-awesome/css/font-awesome.css">
<!-- ionicons -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/Ionicons/css/ionicons.css">
<!-- theme style -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/master_style.css">
<!-- fox_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/skins/_all-skins.css">
<!-- weather weather -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/weather-icons/weather-icons.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/jvectormap/jquery-jvectormap.css">
<!-- Morris charts -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/morris.js/morris.css">
<!-- date picker -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="index-2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>F</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>T.S. Fire</b> Logistics</span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
		  <li>  <small style="font-size: 12px;color:#fff; height: 50px;
  line-height: 50px;
  text-align: center;">
		  <?php

///print_r($_SESSION);die;
		  echo $_SESSION['name']; ?><!--(<?php //echo $_SESSION['login_name']; ?>)-->
		  </small></li>
          <li class="dropdown user user-menu">  
		
		  
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">   <img src="<?php echo base_url()?>assets/img/user2-160x160.jpg" class="user-image rounded-circle" alt="User Image"> </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header"> <img src="<?php echo base_url()?>assets/img/login_role.png" class="rounded float-left" alt="User Image">
                <p> <?php echo $_SESSION['name']; ?> <small>(<?php echo $_SESSION['login_name']; ?>)</small> </p>
              </li>
              
               <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo user_role_masters_id($_SESSION['login_role']); ?></b></h4>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="<?php echo base_url()?>Myprofile" class="btn btn-block btn-primary">Profile</a> </div>
                <div class="pull-right"> <a href="<?php echo base_url()?>Login/logout" class="btn btn-block btn-danger">Sign out</a> </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>