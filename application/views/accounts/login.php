<div class=" ">
        <!-- content start -->
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4" style="margin-top: 30px;">
                        <h2>Please login</h2>
                            <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <span>
                            <?php if ($this->session->flashdata('fmsg')) { ?>
                                <div class="alert alert-success">      
                                    <?php echo $this->session->flashdata('rmsg'); ?>
                                </div>
                            <?php } ?>
                        </span>
                        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                        <div class="form-group" style="margin: 10px 10px;">
                            <input type="text" name="uName" class="form-control"
                                   value="<?php echo set_value('uName'); ?>" placeholder="Email/Username"
                                   aria-describedby="basic-addon1"
                                   <?php if (form_error('uName') || $this->session->flashdata('msg')) {
                                       echo 'style="border-color: red;"';
                                   } ?>>
                        </div>
                        <div class="form-group" style="margin: 10px 10px;">
                            <input type="password" name="pWord" class="form-control"
                                   placeholder="Password" aria-describedby="basic-addon1"
                            <?php if (form_error('pWord') || $this->session->flashdata('msg')) {
                                echo 'style="border-color: red;"';
                            } ?>>
                            <?php //echo form_error('pWord')  ?>
                        </div><a
                            href="<?php echo site_url(); ?>/accounts/forgot"
                            style="margin: 10px;">forgot password</a>
                        <div class="input-group" style="margin: 10px 10px;">
                            <input type="submit" name="userLogin" value="Login"
                                   class="btn btn-success" />
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content end -->