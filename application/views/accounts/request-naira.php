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
                            <h2 class="page-title">Naira Request</h2>
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
                                    <h1>Naira Request Form </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <?php if ($msg): ?>
                                    <span class="help-block"><?php echo $msg; ?></span>
                                    <?php endif; ?>
                                    <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <?php if (form_error('country') || form_error('amount') || form_error('des') || form_error('amountVal') || form_error('amountComm')) {
                                            echo '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div>';
                                        } ?>
<?php echo $this->session->flashdata('msgRequest'); ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <select class="form-control" id="currency" class="form-control" name="currency" <?php if (form_error('currency')) {
    echo 'style="border-color: red;"';
} ?>>
                                                <option value="" selected="selected">Currency.....</option>
                                                <?php 
                                                foreach($rate as $rate):
                                                    echo '<option value="'. $rate->id .'">'. $rate->short_name .'</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label for="payamount">USD to be transferred</label>
                                            <input id="payamount" name="amount" placeholder="Amount" class="form-control" type="number" <?php if (form_error('amount')) {
    echo 'style="border-color: red;"';
} ?>>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <input id="amountVal" name="amountVal" disabled="disabled" placeholder="Amount in Naira" class="form-control" type="number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <input id="amountComm" name="amountComm" disabled="disabled" placeholder="Commission" class="form-control" type="number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <select class="form-control" id="country" name="country" <?php if (form_error('country')) {
    echo 'style="border-color: red;"';
} ?>>
                                                <option value="1" selected="selected">Country of Payment.....</option>
                                                <option value="Nigeria">Nigeria</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <textarea id="form-name" rows="8" name="des" placeholder="Payment Description(Bank details/receiver details)" class="form-control" type="text" <?php if (form_error('des')) {
    echo 'style="border-color: red;"';
} ?>></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <input id="rate" name="rate" hidden="hidden" value="0" />
                                            <!--<input type="submit" name="create_pfm" value="Submit Request" class="btn btn-success" />-->
                                            <button type="submit" class="btn btn-default" name="makeRequest" value="create_pfm">Submit Request</button>
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

