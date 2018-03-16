<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php require_once APPPATH . 'views/admin/temps/sidebar.php'; ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">Status</h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="<?php echo site_url('admin'); ?>"> Dashboard </a>
                            <i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php echo site_url('admin/request'); ?>"> Request </a> <i class="fa fa-angle-right"></i></li>
                        <li>
                            <a href="<?php echo site_url('admin/request/status'); ?>"> Status </a> 
                            <i class="fa fa-angle-right"></i>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Create Administrative User</strong></h3><br />
                        </div>
                        <div class="panel-body">
                            <div class="col-md-8">
                                <?php echo form_open('', 'class="form-horizontal"'); ?>
                                <?php echo $this->session->flashdata('msg2'); ?>
                                <?php
                                if (form_error('buy_rate') || form_error('sell_rate') || form_error('currency')) {
                                    echo '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Oops, Seems your form is not complete </span></div>';
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Buy Rate" value="<?php echo set_value('buy_rate'); ?>"
                                           aria-describedby="basic-addon1"
                                           <?php
                                           if (form_error('buy_rate')) {
                                               echo 'style="border-color: red;"';
                                           }
                                           ?>>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="sell_rate" class="form-control"
                                           placeholder="Sell Rate" value="<?php echo set_value('sell_rate'); ?>"
                                           aria-describedby="basic-addon1"
                                <?php
                                if (form_error('sell_rate')) {
                                    echo 'style="border-color: red;"';
                                }
                                ?>>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="currency" class="form-control"
                                           placeholder="Currency" value="<?php echo set_value('currency'); ?>"
                                <?php
                                if (form_error('currency')) {
                                    echo 'style="border-color: red;"';
                                }
                                ?>>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="signUpUser" value="Register"
                                           class="btn btn-success" />
                                </div>
                            <?php echo form_close(); ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->