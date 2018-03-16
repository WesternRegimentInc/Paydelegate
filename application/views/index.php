
<div id="appendtb">
    <div class="slider-table">
        <table class="table table-hover" id="dev-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = '';
                foreach ($reguser as $r):
                    $i++;
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $r->fullName . '</td>';
                    echo '<td>' . $r->email . '</td>';
                    echo '<td>' . $r->phone . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="slider" id="slider">
        <!-- slider -->
        <div class="slider-img"><img src="<?php echo base_url('asset/images/slider-1.jpg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                            <h1 class="slider-title">Make dollar payments from Nigeria. </h1>
                            <p class="slider-text hidden-xs">Small payments, shop, pay to bank, giftcards</p>
                        </div>
                        <!-- /.slider-captions -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="slider-captions illustrate">
                            <!-- slider-captions -->
                            <!--<img style="width: 600px; height: 100%; top: 35px;" src="<?php echo base_url('asset/images/slider-1-mod.png'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">-->
                            <!--<table class="table table-hover" id="dev-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kilgore</td>
                                        <td>Trout</td>
                                        <td>kilgore</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bob</td>
                                        <td>Loblaw</td>
                                        <td>boblahblah</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Holden</td>
                                        <td>Caulfield</td>
                                        <td>penceyreject</td>
                                    </tr>
                                </tbody>
                            </table>-->
                        </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img"><img src="<?php echo base_url('asset/images/slider-2.jpg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-captions">
                                <!-- slider-captions -->
                                <h1 class="slider-title">Shop without limit with VISA</h1>
                                <p class="slider-text hidden-xs">No daily limit. No bank domiciliary account required</p>
                            </div>
                            <!-- /.slider-captions -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-captions illustrate">
                                <!-- slider-captions -->
                                <!--<img src="<?php echo base_url('asset/images/slider-icon-3.png'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">-->
                            </div>
                            <!-- /.slider-captions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="slider-img"><img src="<?php echo base_url('asset/images/slider-3.jpg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-captions">
                                <!-- slider-captions -->
                                <h1 class="slider-title">A Friends of Nigeria Initiative</h1>
                                <p class="slider-text hidden-xs">Nigerians and Friends in the diaspora teaming to build Nigerians"</p>
                            </div>
                            <!-- /.slider-captions -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-captions illustrate">
                                <!-- slider-captions -->
                                <!--<img src="<?php echo base_url('asset/images/slider-icon.png'); ?>" alt="Pay Delegate | The Pay Help Service People" class="">-->
                            </div>
                            <!-- /.slider-captions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
    <div class="rate-table">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <img src="<?php echo base_url('asset/images/credit-card.svg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="icon-svg-1x"></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">946</h1>
                            <small class="rate-title">Dollar Request</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <img src="<?php echo base_url('asset/images/credit-card.svg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="icon-svg-1x"></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">643</h1>
                            <small class="rate-title">Giftcards</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <img src="<?php echo base_url('asset/images/credit-card.svg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="icon-svg-1x"></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">445</h1>
                            <small class="rate-title">Bills Payment</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <img src="<?php echo base_url('asset/images/credit-card.svg'); ?>" alt="Pay Delegate | The Pay Help Service People" class="icon-svg-1x"></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">438</h1>
                            <small class="rate-title">Naira Requests</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="mb60 text-center section-title">
                        <!-- section title start-->
                        <h1>Monthly Dollar Limit? No Problem</h1>
                        <p>
                            <strong>paydelegate.com</strong> and partners offers an easy payment option for individuals, sme's who require dollar denominated payments abroad and on foreign websites
                        </p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="service" id="service">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="bg-white pinside40 service-block outline mb30">
                            <h2><a href="<?php echo site_url();?>/site/about" class="title">What we are</a></h2>
                            <p>
                                We are a small payments settlement for Nigerians in Nigeria who need services paid for
                                abroad in US Dollars and for Nigerians abroad who need services paid for at 
                                home in Nigerian Naira(NGN)
                            </p>
                            <a href="<?php echo site_url();?>/site/about" class="btn-link">Read More</a>
                            <br /><br />
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="bg-white pinside40 service-block outline mb30">
                            <h2><a href="<?php echo site_url();?>/site/about" class="title">What We Do</a></h2>
                            <p>We created a network that brings together Nigerians and friends of Nigeria abroad who want to meet your foreign 
                                currency need and at the same time meet their naira needs for their investments here </p>
                            <a href="<?php echo site_url();?>/site/about" class="btn-link">Read More</a>
                            <br /><br />
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="bg-white pinside40 service-block outline mb30">
                            <h2><a href="<?php echo site_url();?>/site/about" class="title">Why we Exist</a></h2>
                            <p>
                                - To remove the middle man (Banks, Western Union, Moneygram etc) <br />
                                - To reduce dependence on black market patronage <br />
                                - Remove Daily /Monthly Limit <br />
                                - NO Wire fees  <br />
                                - No Dorm Account and charges <br />
                            </p>
                            <a href="<?php echo site_url();?>/site/about" class="btn-link">Read More</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white section-space80">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-xs-12">
                    <div class="mb100 text-center section-title">
                        <!-- section title start-->
                        <h1>Fast and Easy Payment Process.</h1>
                        <p>
                            Whether you need dollars for online shopping/bill settlement or 
                            naira into bank accounts/acquire properties, we got you covered in 3 easy steps.
                        </p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                        <div class="circle"><span class="number">1</span></div>
                        <h3 class="number-title">Create an account</h3>
                        <p>
                            It takes about 30 seconds to create an account on paydelegate.com
                            <br /><br />
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                        <div class="circle"><span class="number">2</span></div>
                        <h3 class="number-title">Make a request</h3>
                        <p>Tell us what amount and currency you need from your accounts page on paydelegate.com</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                        <div class="circle"><span class="number">3</span></div>
                        <h3 class="number-title">Make Payment of Request</h3>
                        <p>Pay request equivalent into our account and we process your request in 3 business days. EASY!!!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="mb60 text-center section-title">
                        <!-- section title start-->
                        <h1>Why People Choose Us</h1>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bg-white bg-boxshadow">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 nopadding col-xs-12">
                                <div class="bg-white pinside60 number-block outline">
                                    <div class="mb20"><i class="icon-command  icon-4x icon-primary"></i></div>
                                    <h3>Dedicated Partners</h3>
                                    <p>
                                        We have a network of partners working together to make payments in Nigeria and abroad easy and fast.
                                        <br /><br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 nopadding col-xs-12">
                                <div class="bg-white pinside60 number-block outline">
                                    <div class="mb20"><i class="icon-cup  icon-4x icon-primary"></i></div>
                                    <h3>Competitive Rates</h3>
                                    <p>
                                        <br />
                                        Reduced rates without the wire fees and bank stress.
                                        <br /><br /><br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 nopadding col-xs-12">
                                <div class="bg-white pinside60 number-block outline">
                                    <div class="mb20"><i class="icon-calculator  icon-4x icon-primary"></i></div>
                                    <h3>No Limits/Restrictions</h3>
                                    <p> We eliminate bank charges, foreign denominated card fees, daily/monthly limit and risk of carrying foreign currency<br><br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-default section-space80">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                    <div class="mb60 text-center section-title">
                        <!-- section title start-->
                        <h1 class="title-white">Some of our Awesome Testimonials</h1>
                        <p> Read below the stories of clients and partners around the world.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 clearfix col-xs-12">
                    <div class="testimonial-block mb30">
                        <div class="bg-white pinside30 mb20">
                            <p class="testimonial-text"> “I loved the customer service you guys provided
                                in getting my foreign exams payment sorted I would really recommend paydelegate.com”</p>
                        </div>
                        <div class="testimonial-autor-box">
                            <div class="testimonial-img pull-left"></div>
                            <div class="testimonial-autor pull-left">
                                <h4 class="testimonial-name">Dare 0.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 clearfix col-xs-12">
                    <div class="testimonial-block mb30">
                        <div class="bg-white pinside30 mb20">
                            <p class="testimonial-text"> “I had a good experience with paydelegate.com. 
                                I am thankful to for the help you guys gave me. My payment was easy and fast. thank you paydelegate”</p>
                        </div>
                        <div class="testimonial-autor-box">
                            <div class="testimonial-img pull-left"></div>
                            <div class="testimonial-autor pull-left">
                                <h4 class="testimonial-name">Sola D.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 clearfix col-xs-12">
                    <div class="testimonial-block mb30">
                        <div class="bg-white pinside30 mb20">
                            <p class="testimonial-text"> “Paying contractors in Nigeria from the USA was first and efficient 
                                with paydelegate.com and we will continue to be partners for a long time”</p>
                        </div>
                        <div class="testimonial-autor-box">
                            <div class="testimonial-img pull-left"> </div>
                            <div class="testimonial-autor pull-center">
                                <h4 class="testimonial-name">Olson E.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="section-space40 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-1.jpg" alt="Borrow - Loan Company Website Template"> </div>
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-2.jpg" alt="Borrow - Loan Company Website Template"> </div>
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-3.jpg" alt="Borrow - Loan Company Website Template"> </div>
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-4.jpg" alt="Borrow - Loan Company Website Template"> </div>
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-5.jpg" alt="Borrow - Loan Company Website Template"> </div>
                <div class="col-md-2 col-sm-4 col-xs-6"> <img src="<?php echo base_url(); ?>asset/images/logo-1.jpg" alt="Borrow - Loan Company Website Template"> </div>
            </div>
        </div>
    </div>
    -->
    <div class="section-space80 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                    <div class="mb60 text-center section-title">
                        <!-- section title-->
                        <h1>We are Here to Help You</h1>
                    </div>
                    <!-- /.section title-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                        <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div>
                        <h2 class="capital-title">Drop us a Line</h2>
                        <p>Our support are ready to attend to your request.</p>
                        <a href="<?php echo site_url();?>/site/contact" class="btn-link">Contact Us</a> </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                        <div class="mb40"><i class="icon-phone-call icon-2x icon-default"></i></div>
                        <h2 class="capital-title">Call us at </h2>
                        <h1 class="text-big">872-308-2757 </h1>
                        <br />
                        <p>support@paydelegate.com<br /><br /></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                        <div class="mb40"> <i class="icon-users icon-2x icon-default"></i></div>
                        <h2 class="capital-title">Join us on Social Media</h2>
                        <p> join the conversation on social media and let the paydelgate help pay for you. <br />
                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>