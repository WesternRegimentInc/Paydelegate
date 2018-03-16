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
        <title>Metronic | Admin Dashboard Template</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('adasset/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('adasset/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>" type="text/css"/>
        <link href="<?php echo base_url('adasset/plugins/uniform/css/uniform.default.css" rel="stylesheet'); ?>" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url('adasset/assets/admin/pages/css/login.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo base_url('adasset/css/components.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('adasset/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('admin/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="<?php echo base_url('adasset/css/themes/default.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('adasset/css/custom.css" rel="stylesheet" type="text/css'); ?>"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index-2.html">
                <img src="<?php echo base_url('adasset/img/logo-big.png'); ?>" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="" method="post">
                <h3 class="form-title">Login to your account</h3>
                <?php echo $this->session->flashdata('msg'); ?>
		<span>
		<?php if($this->session->flashdata('fmsg')){?>
			<div class="alert alert-success">      
			<?php echo $this->session->flashdata('rmsg'); ?>
			</div>
		<?php } ?>
		</span>
        <?php 
        if(form_error('email') || form_error('passord')){
        	echo '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div></li>'; } 
        	?> 
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>
                        Enter any email and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input type="email" class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" required />
                        <?php echo form_error('email','<span class="bg-danger">','</span>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required />
                        <?php echo form_error('password','<span class="bg-danger">','</span>'); ?>
                    </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1"/> Remember me </label>
                    <button type="submit" value="login" name="login" class="btn green pull-right">
                        Login <i class="m-icon-swapright m-icon-white"></i>
                    </button>
                </div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p>
                        no worries, click <a href="javascript:;" id="forget-password">
                            here </a>
                        to reset your password.
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2014 &copy; Metronic. Admin Dashboard Template.
        </div>
</html>