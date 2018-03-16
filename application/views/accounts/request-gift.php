<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url();?>/accounts/requests">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bg-white pinside30">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <h2 class="page-title">GiftCard Request</h2>
                        </div>
                        <div class="col-md-8 col-sm-7">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="btn-action"> <a href="#" class="btn btn-default">How To Apply</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class=" ">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class=" ">
                            <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>GiftCard Request Form </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <?php if ($msg): ?>
                                    <span class="help-block"><?php echo $msg; ?></span>
                                    <?php endif; ?>
                                                        <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <?php echo $this->session->flashdata('msgRequest3'); ?>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12"<?php if(form_error('gcpayamount')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="gcpayamount" name="gcpayamount" placeholder="Amount in USD" value="" class="form-control" type="number" <?php if(form_error('gcpayamount')){ echo 'style="border-color: red;"'; } ?>>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="gcamountVal" name="gcamountVal" disabled="disabled" placeholder="Amount in Naira" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="gcamountComm" name="gcamountComm" disabled="disabled" placeholder="Commission" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rate" name="rate" hidden="hidden" value="0" />
                                                                    <!--<input type="submit" name="create_dr" value="Submit Request" class="btn btn-success" />-->
                                                                    <button type="submit" class="btn btn-default" name="makeRequest" value="create_gc">Submit Request</button>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                            </div>
                        </div>
                        <!-- /.section title start-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->

