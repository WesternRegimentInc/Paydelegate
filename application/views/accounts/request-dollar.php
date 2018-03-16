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
                            <h2 class="page-title">Dollar Request</h2>
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
                                    <h1>Dollar Request Form </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-offset-3">
                                    <?php if ($msg): ?>
                                    <span class="help-block"><?php echo $msg; ?></span>
                                    <?php endif; ?>
                                                        <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <?php if(form_error('rdpayamount') || form_error('rdcountry') || form_error('rddes') || form_error('rdpayreq') || form_error('rdurlz') || form_error('rdfullName') || form_error('rdbankName') || form_error('rdabaSwift') || form_error('accNumber') || form_error('rdaccNumber') || form_error('rdrecEmail')){ echo '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div>'; } ?>
                                                                <?php echo $this->session->flashdata('msgRequest2'); ?>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rdpayamount" name="rdpayamount" placeholder="Amount in USD" value="" class="form-control" type="number" <?php if(form_error('rdpayamount')){ echo 'style="border-color: red;"'; } ?>>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rdamountVal" name="rdamountVal" disabled="disabled" value="0" placeholder="Amount in Naira" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rdamountComm" name="rdamountComm" disabled="disabled" value="0" placeholder="Commission" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="col-lg-6 col-md-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="rdcountry" name="rdcountry" <?php if(form_error('rdcountry')){ echo 'style="border-color: red;"'; } ?>>
                                                                        <option value="1" selected="selected">Country of Payment.....</option>
                                                                        <option value="United States">United States</option>
                                                                        <option value="United Kindgom">United Kingdom</option>
                                                                        <option value="China ">China</option>
                                                                        <option value="Canada ">Canada</option>
                                                                        <option value="Europe ">EU Country</option>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>-->
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <textarea id="rddes" rows="8" name="rddes" placeholder="Payment Description(what payment is for)" class="form-control" type="text" <?php if(form_error('rddes')){ echo 'style="border-color: red;"'; } ?>><?php echo set_value('rddes'); ?></textarea>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-6">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <select class="form-control" id="payoption" name="rdpayreq" <?php if(form_error('rdpayreq') || form_error('rdurlz') || form_error('rdfullName') || form_error('rdbankName') || form_error('rdabaSwift') || form_error('accNumber') || form_error('rdaccNumber') || form_error('rdrecEmail')){ echo 'style="border-color: red;"'; } ?>>
                                                                        <option value="1">Pay on website or to Receiver.....</option>
                                                                        <option value="website" <?php if(form_error('rdurlz')){ echo 'selected="selected"'; } ?>>Website</option>
                                                                        <option value="bank" <?php if(form_error('rdfullName') || form_error('rdbankName') || form_error('rdabaSwift') || form_error('accNumber') || form_error('rdaccNumber') || form_error('rdrecEmail')){ echo 'selected="selected"'; } ?>>Receiver</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 website payreq" <?php if(form_error('rdurlz')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdurlz" placeholder="Payment URL" value="<?php echo set_value('rdurlz'); ?>" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdfullName')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdfullName" placeholder="Receiver's Fullname" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdbankName')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdbankName" placeholder="Receiver's Bank Name" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdabaSwift')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdabaSwift" placeholder="Routing Number" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdaccNumber')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdaccNumber" placeholder="Account Number" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdphoneNumber')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdphoneNumber" placeholder="Phone Number" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 bank payreq" <?php if(form_error('rdrecEmail')){ echo 'style="border-color: red;"'; } ?>>
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="" name="rdrecEmail" placeholder="Email" type="text" class="form-control">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rate" name="rate" hidden="hidden" value="<?php echo $rate['buy_rate']; ?>" />
                                                                    <input id="commission" name="commission" hidden="hidden" value="<?php echo $commission['commission']; ?>" />
                                                                    <!--<input type="submit" name="create_dr" value="Submit Request" class="btn btn-success" />-->
                                                                    <button type="submit" class="btn btn-default" name="makeRequest" value="create_dr">Submit Request</button>
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

