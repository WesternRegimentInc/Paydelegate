<div class=" ">
        <!-- content start -->
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 ">

                        <div class="body-content" style="padding: 100px 0;">
                            <?php echo form_open('', 'class="form-horizontal"'); ?>
                            <?php echo $this->session->flashdata('msg2'); ?>
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                            <div class="form-group">
                                <?php echo form_error('username'); ?>
                                <input type="text" name="fname" class="form-control"
                                       placeholder="Full Name" value="<?php echo set_value('fname'); ?>"
                                       aria-describedby="basic-addon1"
                                       <?php if (form_error('fname')) {
                                           echo 'style="border-color: red;"';
                                       } ?>>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control"
                                       placeholder="Email" value="<?php echo set_value('email'); ?>"
                                       aria-describedby="basic-addon1"
<?php if (form_error('email') || $this->session->flashdata('msg2')) {
    echo 'style="border-color: red;"';
} ?>>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                       placeholder="Password" value="<?php echo set_value('password'); ?>"
                                       aria-describedby="basic-addon1"
<?php if (form_error('password')) {
    echo 'style="border-color: red;"';
} ?>>
                            </div>
                            <div class="form-group">

                                <input type="number" name="phone" class="form-control"
                                       placeholder="Phone" value="<?php echo set_value('phone'); ?>"
                                       aria-describedby="basic-addon1"
                            <?php if (form_error('phone')) {
                                echo 'style="border-color: red;"';
                            } ?>>
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
    </div>
    <!-- /.content end -->