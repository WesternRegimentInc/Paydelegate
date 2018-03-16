<!-- START PAGE SIDEBAR -->    <?php require_once APPPATH.'views/temps/sidebar.php'; 
// APPPATH.'views/'.$view_name.'.php';

?>    <!-- END PAGE SIDEBAR -->
                        <!-- Main body Start Here -->
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="body-content">
                                <div class="single-product">
                                    <div class="product-overview-area col-lg-12 col-md-12 col-sm-12">
                                        <div class="overview-content">
                                            <ul class="product-view-tab">
                                                <li <?php if($active === 2){ echo 'class="active"';} ?> ><a href="#details" data-toggle="tab" aria-expanded="true">Request Naira</a></li>
                                                <li <?php if($active === 3){ echo 'class="active"';} ?> ><a href="#review" data-toggle="tab" aria-expanded="false">Request Dollars</a></li>
                                                <li <?php if($active === 4){ echo 'class="active"';} ?>><a href="#information" data-toggle="tab" aria-expanded="false">Request Giftcards</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane <?php if($active == 2){ echo 'active';} ?>" id="details">
                                                    <legend>Naira Request Form </legend>
                                                    <div class="row">
                                                        <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <?php if(form_error('country') || form_error('amount') || form_error('des') || form_error('amountVal') || form_error('amountComm')){ echo '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div>'; } ?>
                                                                <?php echo $this->session->flashdata('msgRequest'); ?>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <select class="form-control" id="currency" class="form-control" name="currency" <?php if(form_error('currency')){ echo 'style="border-color: red;"'; } ?>>
                                                                        <option value="" selected="selected">Currency.....</option>
                                                                        <option value="1">USD</option>
                                                                        <option value="2">GBP</option>
                                                                        <option value="3">CAD</option>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="payamount" name="amount" placeholder="Amount" class="form-control" type="number" <?php if(form_error('amount')){ echo 'style="border-color: red;"'; } ?>>
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
                                                                    <select class="form-control" id="country" name="country" <?php if(form_error('country')){ echo 'style="border-color: red;"'; } ?>>
                                                                        <option value="1" selected="selected">Country of Payment.....</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <textarea id="form-name" rows="8" name="des" placeholder="Payment Description(Bank details/receiver details)" class="form-control" type="text" <?php if(form_error('des')){ echo 'style="border-color: red;"'; } ?>></textarea>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rate" name="rate" hidden="hidden" value="0" />
                                                                    <!--<input type="submit" name="create_pfm" value="Submit Request" class="btn btn-success" />-->
                                                                    <button type="submit" name="makeRequest" value="create_pfm">Submit Request</button>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane <?php if($active == 3){ echo 'active';} ?>" id="review">
                                                    <legend>Dollars Request Form </legend>
                                                    <div class="row">
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
                                                                    <input id="rdamountVal" name="rdamountVal" disabled="disabled" placeholder="Amount in Naira" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <!-- Text input-->
                                                                <div class="form-group">
                                                                    <input id="rdamountComm" name="rdamountComm" disabled="disabled" placeholder="Commission" class="form-control" type="number">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <!-- Text input-->
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
                                                            </div>
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
                                                                    <input id="rate" name="rate" hidden="hidden" value="0" />
                                                                    <!--<input type="submit" name="create_dr" value="Submit Request" class="btn btn-success" />-->
                                                                    <button type="submit" name="makeRequest" value="create_dr">Submit Request</button>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>                                                            
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane <?php if($active == 4){ echo 'active';} ?>" id="information">
                                                    <legend>Giftcard Request Form </legend>
                                                    <div class="row">
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
                                                                    <button type="submit" name="makeRequest" value="create_gc">Submit Request</button>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- Main body End Here -->
                        
                    </div>
                </div>
            </div>
            <!-- Shop page End Here -->