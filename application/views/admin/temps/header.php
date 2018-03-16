<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8"/>
<title>Paydelegate | Admin Dashboard Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>" type="text/css"/>
<link href="<?php echo base_url('adasset/plugins/uniform/css/uniform.default.css" rel="stylesheet'); ?>" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url('adasset/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/plugins/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/plugins/select2/select2.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('adasset/plugins/data-tables/DT_bootstrap.css'); ?>"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo base_url('adasset/css/tasks.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url('adasset/css/components.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('adasset/css/themes/default.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url('adasset/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php site_url('admin'); ?>">
			<img src="<?php echo base_url('adasset/img/logo.png'); ?>" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</div>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo base_url('adasset/img/avatar3_small.jpg'); ?>"/>
					<span class="username">
					Bob </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="extra_profile.html">
							<i class="fa fa-user"></i> My Profile </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="fa fa-envelope"></i> My Inbox <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="login.html">
							<i class="fa fa-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
