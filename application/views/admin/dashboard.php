<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
    <?php require_once('temps/sidebar.php'); ?>
    <!-- END SIDEBAR -->

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Dashboard <small>statistics and more</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<a href="<?php echo site_url('admin'); ?>">
							Dashboard </a>
						</li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="pull-right dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $nR; ?>
							</div>
							<div class="desc">
								 Naira Request
							</div>
						</div>
						<a class="more" href="<?php echo site_url('admin/request/naira'); ?>">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $dR; ?>
							</div>
							<div class="desc">
								 Dollar Request
							</div>
						</div>
						<a class="more" href="<?php echo site_url('admin/request/dollar'); ?>">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $gR; ?>
							</div>
							<div class="desc">
								 Gift Card
							</div>
						</div>
						<a class="more" href="<?php echo site_url('admin/request/gift'); ?>">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->