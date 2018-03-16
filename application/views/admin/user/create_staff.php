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
                                if (form_error('name') || form_error('email') || form_error('password') || form_error('role')) {
                                    echo '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Oops, Seems your form is not complete </span></div>';
                                }
                                ?>
                                <div class="form-group">
                                <?php echo form_error('name'); ?>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Full Name" value="<?php echo set_value('name'); ?>"
                                           aria-describedby="basic-addon1"
                                           <?php
                                           if (form_error('name')) {
                                               echo 'style="border-color: red;"';
                                           }
                                           ?>>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control"
                                           placeholder="Email" value="<?php echo set_value('email'); ?>"
                                           aria-describedby="basic-addon1"
                                <?php
                                if (form_error('email') || $this->session->flashdata('msg2')) {
                                    echo 'style="border-color: red;"';
                                }
                                ?>>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="Password" value="<?php echo set_value('password'); ?>"
                                <?php
                                if (form_error('password')) {
                                    echo 'style="border-color: red;"';
                                }
                                ?>>
                                </div>
                                <div class="form-group">
                                <select aria-describedby="basic-addon1" class="form-control" name="role">
                                <?php 
                                if ($role) :
                                        foreach ($role as $role):
                                ?>
                                <option value="<?php echo $role->name; ?>">
                                <?php echo $role->name; ?></option>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                                </select>
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