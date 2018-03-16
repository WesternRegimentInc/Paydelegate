<!doctype html>
<html class="no-js" lang="">
    
<!--  -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pay Delegate | The Pay Help Service People</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

        <!-- Main Menu CSS css /theme-default.css-->      
        <link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu.min.css'); ?>">

        <!-- Normalize CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">

        <!-- Main CSS -->         
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

        <!-- Animate CSS --> 
        <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">

        <!-- Font-flat CSS-->
        <link rel="stylesheet" href="<?php echo base_url('assets/fonts/flaticon.css'); ?>">

        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/OwlCarousel/owl.carousel.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/OwlCarousel/owl.theme.default.min.css'); ?>">

        <!-- nivo slider CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/slider/css/nivo-slider.css'); ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/slider/css/preview.css'); ?>" type="text/css" media="screen" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
        
        <!-- datepicker CSS -->
        <link id="bsdp-css" href="<?php echo base_url('datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet">
        
        <!-- bootstrap datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
        
        <!-- My custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/mystyle.css'); ?>">


        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <div class="wraper">
            <header>
                <div class="header-top-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="header-phone">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i>( +1 ) 872 308 2757</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>support@paydelegate.com</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="header-address">
                                    <ul>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>2415 Farwell Ave Chicago IL 60645</li>
                                        <!--<li><i class="fa fa-globe" aria-hidden="true"></i>English</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
                <div class="header1-area header-two">
                    <div class="header-top-area" id="sticker">
                        <div class="container">
                            <div class="row">                         
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="logo-area">
                                        <a href="index.html"><img class="img-responsive" src="<?php echo base_url('assets/img/logo2.png'); ?>" alt="logo"></a>
                                    </div>
                                </div>  
                                <div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
                                    <div class="main-menu">
                                        <nav>
                                            <ul>
                                                <li class=""><a href="<?php echo site_url();?>site/home">Home</a></li>
                                                <li><a href="#">How To</a></li>
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Faq</a></li>
                                                <li><a href="<?= base_url() ?>site/contact">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>   
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    
                                    <div class="header-top-right">
                                        <?php if(isset($_SESSION['logged_in'])){ ?>
                                        
                                        <ul>
                                            
                                            <li>
                                                <div class="dropdown" style="">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                      My Account
                                                      <span class="caret"></span>
                                                    </button>
                                                      <ul class="dropdown-menu regiterbtn" aria-labelledby="dropdownMenu4">
                                                          <li style="line-height:30px"><a style="color:black;" href="<?= base_url(); ?>accounts/profile">Profile</a></li>
                                                          <li style="line-height:30px"><a style="color:black;" href="<?= base_url(); ?>accounts/signout">Sign out</a></li>
                                                          
                                                      </ul>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                        
                                        <?php } else { ?>
                                        
                                        <ul>
                                            <li>
                                                
                                                <div class="dropdown <?php if(form_error('fname') || form_error('email') || form_error('password') || form_error('phone')){ echo 'open'; } elseif($this->session->flashdata('msg2')){ echo 'open'; } ?>">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                      Register
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu regiterbtn" aria-labelledby="dropdownMenu2">
                                                        <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                        <?php echo $this->session->flashdata('msg2'); ?>
                                                        <?php if(form_error('fname') || form_error('email') || form_error('password') || form_error('phone')){ echo '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div></li>'; } ?>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                <?php echo form_error('username'); ?>
                                                                <input type="text" name="fname" class="form-control" placeholder="Full Name" value="<?php echo set_value('fname'); ?>" aria-describedby="basic-addon1" <?php if(form_error('fname')){ echo 'style="border-color: red;"'; } ?>>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                
                                                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" aria-describedby="basic-addon1" <?php if(form_error('email') || $this->session->flashdata('msg2')){ echo 'style="border-color: red;"'; } ?>>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">

                                                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" aria-describedby="basic-addon1" <?php if(form_error('password')){ echo 'style="border-color: red;"'; } ?>>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">

                                                                <input type="number" name="phone" class="form-control" placeholder="Phone" value="<?php echo set_value('phone'); ?>" aria-describedby="basic-addon1" <?php if(form_error('phone')){ echo 'style="border-color: red;"'; } ?>>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                <input type="submit" name="regUser" value="Register" class="btn btn-success" />
                                                            </div>
                                                        </li>
                                                        <?php echo form_close(); ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                
                                                <div class="login dropdown <?php if(form_error('uName') || form_error('pWord')){ echo 'open'; } elseif($this->session->flashdata('msg')){ echo 'open'; } ?>">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                      Login
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                        <?php echo $this->session->flashdata('msg'); ?>
                                                        <?php if(form_error('uName') || form_error('pWord')){ echo '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div></li>'; } ?>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                <input type="text" name="uName" class="form-control" value="<?php echo set_value('uName'); ?>" placeholder="Username" aria-describedby="basic-addon1" <?php if(form_error('uName') || $this->session->flashdata('msg')){ echo 'style="border-color: red;"'; } ?>>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                <input type="password" name="pWord" class="form-control" placeholder="Password" aria-describedby="basic-addon1" <?php if(form_error('pWord') || $this->session->flashdata('msg')){ echo 'style="border-color: red;"'; } ?>>
                                                              </div>
                                                        </li>
                                                        <li  style="line-height: 5px;"><a href="<?php echo site_url();?>/accounts/forgot" style="margin:10px;">forgot password</a></li>
                                                        <li>
                                                            <div class="input-group" style="margin: 10px 10px;">
                                                                <input type="submit" name="userLogin" value="Login" class="btn btn-success" />
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            
                                            
                                            <li>
                                                
                                            </li>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>                          
                        </div> 
                    </div>
                </div>
                <!-- mobile-menu-area start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="#">How To</a></li>
                                            <!--<li><a href="index2.html">Home 2</a></li>
                                            <li><a href="index3.html">Home 3</a></li>
                                            <li><a href="index4.html">Home 4</a></li>
                                            <li><a href="#">How To</a>
                                                <ul class="mega-menu-area">
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">Our Services</a></li>
                                                    <li><a href="single-service.html">Single Service</a></li>
                                                    <li><a href="case-studies.html">Our Case Studies</a></li>
                                                    <li><a href="single-studies.html">Single Case Studies</a></li>
                                                    <li><a href="blog-default.html">Blog Default Layout</a></li>
                                                    <li><a href="blog-standard.html">Blog Standard Layout</a></li>
                                                    <li><a href="single-blog.html">Single Blog Layout</a></li>
                                                    <li><a href="portfolio.html">Portfolio Page</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
                                                </ul>
                                            </li>-->
                                            <li><a href="case-studies.html">Case Studies</a></li>
                                            <li><a href="blog-default.html">Blog</a></li>
                                            <li><a href="#">Shop</a>
                                                <ul class="mega-menu-area">
                                                    <li><a href="shop.html">Category Grid</a></li>
                                                    <li><a href="shop-list.html">Category List</a></li>
                                                    <li><a href="single-product.html">Single Product</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>                              
                                        </ul>
                                    </nav>
                                </div>                  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile-menu-area end -->
            </header>
            <!-- Header Area End Here -->