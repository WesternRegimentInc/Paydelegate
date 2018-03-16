</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Paydelegate.com
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9] --> 
<!--[endif]-->
<script src="<?php echo base_url('adasset/plugins/jquery-1.11.0.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url('adasset/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript'); ?>"></script>
<script src="<?php echo base_url('adasset/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/jquery.cokie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url('adasset/plugins/jquery.pulsate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/bootstrap-daterangepicker/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url('adasset/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('adasset/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('adasset/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?php echo base_url('adasset/plugins/fullcalendar/fullcalendar/fullcalendar.min.js'); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('adasset/js/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/js/layout.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('adasset/js/table-editable.js'); ?>"></script>
<script src="<?php echo base_url('adasset/js/site.js'); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   //Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   TableEditable.init();
   //Index.init();   
   //Index.initDashboardDaterange();
   //Index.initJQVMAP(); // init index page's custom scripts
   //Index.initCalendar(); // init index page's custom scripts
   //Index.initCharts(); // init index page's custom scripts
   //Index.initChat();
   //Index.initIntro();
   //Tasks.initDashboardWidget();
   //Site.init();
   
});
</script>
<script>
    function oh(){
        var conf = comfirm('Are you sure you want to delete this?');
        if (conf == 'yes'){
            alert('deleted');
        }else{
            alert("Data is safe");
        }
    }
</scritp>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>