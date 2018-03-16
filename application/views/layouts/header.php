<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Borrow - is the loan company, Business Website Template.">
        <meta name="keywords" content="Financial Website Template, Bootstrap Template, Loan Product, Personal Loan">
        <title>Pay Delegate | The Pay Help Service People</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/css/fontello.css" rel="stylesheet'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/css/animsition.min.css">
        <link href="<?php echo base_url('asset/css/style.css'); ?>" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Merriweather:300,300i,400,400i,700,700i" rel="stylesheet">
        <!-- owl Carousel Css -->
        <link href="<?php echo base_url('asset/css/owl.carousel.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('asset/css/owl.theme.css'); ?>" rel="stylesheet">
        <!-- bootstrap datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
        <![endif]-->
    </head>
<?php
$class_1 = $this->uri->segment(2);
//echo $class_2 = $this->router->fetch_class();
//var_dump($this->session->all_userdata());
//echo $this->session->userdata('fullname');
?>
<body class="<?php if(($class_1 != 'login') or ($class_1 != 'signin')){ echo 'animsition'; } ?>">
    <div class="collapse searchbar" id="searchbar">
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
            </span> </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
    <div class="top-bar">
        <!-- top-bar -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-xs hidden-sm">
                    <p class="mail-text">support@paydelegate.com</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.top-bar -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <!-- logo -->
                    <div class="logo">
                        <a href="<?php echo site_url();?>/site/home"><img src="<?php echo base_url('asset/images/logo.png') ?>" alt="Pay Delegate | The Pay Help Service People"></a>
                    </div>
                </div>
                <!-- logo -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div id="navigation">
                        <!-- navigation start-->
                        <ul>
                            <?php if(isset($_SESSION['logged_in'])){ ?>
                            <li class="active"><a href="<?php echo site_url();?>/accounts/requests" class="animsition-link">My Account</a>
                            <?php } else { ?>
                            <li class="active"><a href="<?php echo site_url();?>/site/home" class="animsition-link">Home</a>
                                <?php } ?>
                            </li>
                            <li><a href="<?php echo site_url();?>/site/about" class="animsition-link">About Us</a></li>
                            <li><a href="<?php echo site_url();?>/site/faq" class="animsition-link">FAQ</a></li>
                            <li><a href="<?php echo site_url();?>/site/contact" class="animsition-link">Contact</a></li>
                            <?php if(isset($_SESSION['logged_in'])){ ?>
                            <li><a href="#">Account</a>
                                <ul class="dropdown-menu regiterbtn" aria-labelledby="dropdownMenu4">
                                    <li style="line-height:30px"><a style="color:black;" href="<?php echo site_url();?>/accounts/profile">Profile</a></li>
                                    <li style="line-height:30px"><a style="color:black;" href="<?php echo site_url();?>/accounts/signout">Sign out</a></li>
                                </ul>
                            </li>
                            <?php } else { ?>
                            <li><a href="<?php echo site_url();?>/site/signup">Register</a></li>
                            <li><a href="<?php echo site_url();?>/site/login">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
            </div>
        </div>
    </div>