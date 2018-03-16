<div class="footer section-space80">
    <!-- footer -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="footer-logo">
                    <!-- Footer Logo -->
                    <img src="<?php echo base_url('asset/images/logo.png'); ?>" alt="Pay Delegate | The Pay Help Service People"> </div>
                <!-- /.Footer Logo -->
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="col-md-5">
                    <h3 class="newsletter-title">Signup For Our Newsletter</h3>
                </div>
                <div class="col-md-7">
                    <div class="newsletter-form">
                        <!-- Newsletter Form -->
                        <form id="submitNewsletterForm" method="post">
                            <div class="input-group newsl">
                                <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Write E-Mail Address" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="submitNewsletter" type="submit">Go!</button>
                                </span> 
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                    <!-- /.Newsletter Form -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
        </div>
        <hr class="dark-line">
        <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="widget-text mt40">
                        <!-- widget text -->
                        <p>Our goal at Paydelegate is provide limitless foreign payment
                            settlement solutions, to be the largest forex settlement 
                            support for organizations in sub-saharan Africa.
                        </p>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="address-text"><span><i class="icon-placeholder-3 icon-1x"></i> </span>2832 W Devon Ave, Chicago, IL 60659 </p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="call-text"><span><i class="icon-phone-call icon-1x"></i></span>872-308-2757</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget text -->
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li class="active"><a href="<?php echo site_url();?>/site/home" class="animsition-link">Home</a>
                            <li><a href="<?php echo site_url();?>/site/about" class="animsition-link">About Us</a></li>
                            <li><a href="<?php echo site_url();?>/site/faq" class="animsition-link">FAQ</a></li>
                            <!--<li><a href="<?php echo site_url(); ?>/site/terms">Terms of Use</a></li>-->
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="<?php echo site_url();?>/site/contact" class="animsition-link">Contact</a></li>
                            <?php if (isset($_SESSION['logged_in'])) { ?>
                                <li><a href="#">Account</a>
                                    <ul class="dropdown-menu regiterbtn" aria-labelledby="dropdownMenu4">
                                        <li style="line-height:30px"><a style="color:black;" href="<?php echo site_url(); ?>/accounts/profile">Profile</a></li>
                                        <li style="line-height:30px"><a style="color:black;" href="<?php echo site_url(); ?>/accounts/signout">Sign out</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo site_url(); ?>/site/signup">Register</a></li>
                                <li><a href="<?php echo site_url(); ?>/site/login">Login</a></li>
                            <?php } ?>
                            <li><a href="<?php echo site_url(); ?>/site/policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="widget-social mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
            </div>
    </div>
</div>
<!-- /.footer -->
    <div class="tiny-footer"> <!--// navbar-fixed-bottom -->
        <!-- tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p>&copy; Copyright 2017 | PayDelegate</p>
                </div>
                <div class="col-md-6 col-sm-6 text-right col-xs-6">
                    <p>Terms of use | Privacy Policy</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.tiny footer -->
    <!-- back to top icon -->
    <a href="#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/menumaker.js'); ?>"></script>
    <!-- animsition -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/animsition.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/animsition-script.js'); ?>"></script>
    <!-- sticky header -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.sticky.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/sticky-header.js'); ?>"></script>
    <!-- slider script -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/owl.carousel.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/slider-carousel.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/service-carousel.js'); ?>"></script>
    <!-- Back to top script -->
    <script src="<?php echo base_url('asset/js/back-to-top.js" type="text/javascript'); ?>"></script>
    <!-- bootstrap datatable -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#submitNewsletterForm')[0].reset();
            $('.input-group').removeClass("has-error").removeClass("has-success");
            $('.text-danger').remove();
            
            //$('#submitNewsletter').on('click',function (e) {
                
                $('#submitNewsletterForm').unbind('submit').bind('submit', function(e){
                    e.preventDefault();
                    //$('#submitNewsletterForm')[0].reset();
                    $('.input-group').removeClass("has-error").removeClass("has-success");
                    $('.text-danger').remove();
                    var email = $('#newsletter').val();
                    if(email == ""){
                        $('#newsletter').closest(".input-group").addClass("has-error");
                        $('.newsl').after('<p class="text-danger">This field is required</p>');
                    }else{
                        $('#newsletter').closest(".input-group").removeClass("has-error");
                        $('#newsletter').addClass("has-success");
                    }
                    if(email){
                        $.post(
                        '<?=site_url("Site/newsletter")?>',
                        {email:email},
                        function(result) {
                            alert(result);
                        });
                    }
                });
               <?php //echo site_url("Site/newsletter"); ?>
            //});
        } );
    </script>
    <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                $('#example3').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                $('.cominz').click(function(e){
                    e.preventDefault();
                    alert("Coming Soon!");
                });
            } );
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#payoption").change(function(){
                $(this).find("option:selected").each(function(){
                    if($(this).attr("value")=="website"){
                        $(".payreq").not(".website").hide();
                        $(".website").show();
                    }
                    else if($(this).attr("value")=="bank"){
                        $(".payreq").not(".bank").hide();
                        $(".bank").show();
                    }
                    else{
                        $(".payreq").hide();
                    }
                });
            }).change();
            
            $("input").keyup(function(){
                $("#payamount").css("background-color", "white");
                var amount = $('#payamount').val();
                var rate = $('#rate').val();
                var nairaVal = amount * rate;
                $("#amountVal").attr({value: nairaVal});
                
                var commission = amount * 0.05;
                $("#amountComm").attr({value: commission});
            });
            
            $("#rdpayamount").keyup(function(){
                $("#rdpayamount").css("background-color", "#fff");
                
                var amount = $('#rdpayamount').val();
                var rate = $('#rate').val();
                var comm = $('#commission').val();
                var dollarVal = (amount * rate);
                //alert(comm);
                $("#rdamountVal").attr({value: dollarVal});
                var commission = dollarVal * (comm/100);
                $("#rdamountComm").attr({value: commission});
            });
            
            $("input").keyup(function(){
                $("#gcpayamount").css("background-color", "white");
                
                var amount = $('#gcpayamount').val();
                var rate = $('#rate').val();
                var nairaVal = (amount * rate);
                $("#gcamountVal").attr({value: nairaVal});
                var commission = nairaVal * 0.05;
                $("#gcamountComm").attr({value: commission});
            });
            
            $('#currency').change(function(){
                var amount = $('#payamount').val();
                var currency = $('#currency').val();
                var rate = $('#rate').val();
                //alert(currency);
                //make an ajax request posting it to your controller
                $.post('<?=site_url("Accounts/getCurrency")?>', {data:currency},function(result) {
                    amount = $('#payamount').trigger('change');
                //change the input price with the returned value
                $('#rate').attr({value: result});
                });
            })
        });
        </script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-93928674-2', 'auto');
            ga('send', 'pageview');

        </script>
        
        <script>
            function initMap() {
                var myLatLng = {
                    lat: 41.9975406,
                    lng: -87.7032311
                };

                var map = new google.maps.Map(document.getElementById('googleMap'), {
                    zoom: 17,
                    center: myLatLng,
                    scrollwheel: false,
                });
                var image = '<?php echo base_url("asset/images/map-pin.png"); ?>';
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    icon: image,
                    title: 'Hello World!'

                });
            }
        </script>
        <script>
            $(document).on('ready', function() {
                var td = 1;

            //$('.owl-buttons').after(html);
            $('#appendtb').appendTo('.owl-controls');
            
            //var lp = <?php $reguser; ?>;
                //for(key in lp){
                    //alert(lp[value]);
                //}

        });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDka4_fzFV9tZv9mgqsptBnyxpx-33oXwQ&callback=initMap" async defer></script>
</body>

</html>