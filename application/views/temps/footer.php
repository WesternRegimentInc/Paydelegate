                        <!-- Copyright section Start Here -->
            <div class="copy-right-area  navbar-fixed-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="copy-right">
                                <p>© Copyrights PayDelegate 2016. All rights reserved. Designed by <a href="http://tiertoppers.com/">Tiertoppers</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright section End Here -->
        </div>
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <!-- jquery-->  
        <script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>" type="text/javascript"></script>
        <!-- Plugins js -->
        <script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>
        <!-- Bootstrap js -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- Meanmenu Js -->
        <script src="<?php echo base_url('assets/js/jquery.meanmenu.min.js'); ?>" type="text/javascript"></script>
        <!-- Counter Js -->
        <script src="<?php echo base_url('assets/js/jquery.counterup.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/waypoints.min.js'); ?>" type="text/javascript"></script>
        <!-- WOW JS -->     
        <script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
        <!-- Nivo slider js -->     
        <script src="<?php echo base_url('assets/vendor/slider/js/jquery.nivo.slider.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/vendor/slider/home.js'); ?>" type="text/javascript"></script>
        <!-- Owl Caruosel JS -->
        <script src="<?php echo base_url('assets/vendor/OwlCarousel/owl.carousel.min.js'); ?>" type="text/javascript"></script>
        <!-- Srollup js -->
        <script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js'); ?>" type="text/javascript"></script>
        <!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgREM8KO8hjfbOC0R_btBhQsEQsnpzFGQ"></script>
        <!-- Validator js -->
        <script src="<?php echo base_url('assets/js/validator.min.js'); ?>" type="text/javascript"></script>
        <!-- Custom Js -->
        <script src="<?php echo base_url('assets/js/main.js'); ?>" type="text/javascript"></script>
        <!-- datepicker JS -->
        <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('datepicker/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/inc.js'); ?>"></script>
        <!-- bootstrap datatable -->
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
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
            $('#sandbox-container input').datepicker({
            });
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
            
            $("input").keyup(function(){
                $("#rdpayamount").css("background-color", "white");
                
                var amount = $('#rdpayamount').val();
                var rate = $('#rate').val();
                var nairaVal = (amount * rate);
                $("#rdamountVal").attr({value: nairaVal});
                
                var commission = nairaVal * 0.05;
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
    </body>
</html>